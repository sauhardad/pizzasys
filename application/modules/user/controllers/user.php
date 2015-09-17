<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   session_start(); 
   $this->load->library('email');
   $this->load->model('user_model');
   $this->load->helper(array('form'));
 }

 function index()
 {
     redirect('user/login','refresh');
 }
 
 function login()
 {
   if($this->session->userdata('logged_in'))
       redirect('home', 'refresh');
   else
       $this->load->view('login_view');
 }
 
 function signup()
 {
    $this->load->view('signup_view');
 }
 function add_user()
 {
    $this->form_validation->set_message('is_unique', 'Oops looks like you have already signed up!'); 
    $this->form_validation->set_message('required', 'Please Enter %s'); 
    $this->form_validation->set_message('min_length', 'The Password must be at least 6 characters long'); 
    $this->form_validation->set_message('numeric', 'Please enter a valid %s'); 
    $this->form_validation->set_message('exact_length', 'Please enter a valid %s'); 
    $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('address', 'Address', 'trim|xss_clean');
    $this->form_validation->set_rules('contact_no', 'Phone Number', 'trim|xss_clean|numeric|exact_length[10]');
    $this->form_validation->set_rules('security_question', 'Security Question', 'trim|required|xss_clean');
    $this->form_validation->set_rules('security_answer', 'Security Answer', 'trim|required|xss_clean');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[tbl_users.email]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|matches[confirm_password]|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
    

    if($this->form_validation->run() == FALSE)
    {
        //Field validation failed.  User redirected to login page
        $this->load->view('signup_view');
    }
    else
    {
        $data=array(); 
        $data['name']=$this->input->post('name');
        $data['address']=$this->input->post('address');
        $data['email']=$this->input->post('email'); 
        $data['security_question']=$this->input->post('security_question'); 
        $data['security_answer']=$this->input->post('security_answer'); 
        $data['contact_no']=$this->input->post('contact_no'); 
        $data['password']=$this->bcrypt->hash_password($this->input->post('password'));
        if ($this->user_model->add_user($data))
            redirect('landing','refresh');
    }    
 }
 
 function verifylogin()
 {
   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     $routed_login = $this->session->userdata('routed_login');
     if(isset($routed_login) && $routed_login != ""){
        $this->session->unset_userdata('routed_login');
        $this->load->view($routed_login);
     } else{
       //redirect to the home page
       redirect('home', 'refresh');
     }
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');
   //query the database
   $result = $this->user_model->verify($email, $password);

   if($result)
   {
     $sess_array = array();
     $sess_array = array(
        'id' => $result->id,
        'email' => $result->email,
      );       
      $this->session->set_userdata('logged_in', $sess_array);
      return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid email or password');
     return false;
   }
 }
 
 
 function change_password()
 {
    if($this->session->userdata('logged_in')) 
    {
        if ($this->input->post('current_password', TRUE) && $this->input->post('new_password', TRUE) && $this->input->post('confirm_password', TRUE))
         {
             //verify the old password 
             $result = $this->user_model->verify($this->session->userdata('logged_in')['email'], $this->input->post('current_password', TRUE));
             //change the password
             if($result)
             {
                 if($this->user_model->change_password($this->session->userdata('logged_in')['email'],$this->input->post('new_password', TRUE)))
                 {
                     $this->session->unset_userdata('logged_in');
                     session_destroy();
                     echo json_encode (array('message'=>'Password Changed Successfully! Please login to Continue','status'=>TRUE));
                 }   
                 else
                     echo json_encode (array('message'=>'Oops! Try again Later','status'=>FALSE));
             } else {
                 echo json_encode(array('message'=>'Invalid Password','status'=>FALSE));
             }
         }
    }
 }
 
 
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('landing', 'refresh');
 }
 
 /** function that deletes user from the current database
  * 
  */
    function delete_user()
    {
        //check if user is logged in and is the same user
        if($this->session->userdata('logged_in'))
        {
            $session=$this->session->userdata('logged_in');
            if ($this->user_model->delete($session['id']) === TRUE)
                $data=array('status'=>TRUE,'message'=>'You have been successfully removed from our system!');
            else
                $data=array('status'=>FALSE,'message'=>'Error removing account, please contact Administrator!');
            echo json_encode($data);
        }
    }

    function forgot_password()
    {
        if($recovery_email=$this->input->post('recovery_email'))
        {   
            $this->email->from('mamajane@pizzasys.com', 'PizzaSys');
            $this->email->to($recovery_email); 
            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');	
            if($this->email->send())
            {
                echo "Done!";   
            }
            else
            {
                echo $this->email->print_debugger();    
            }
        }
    }
    
    function getSecurityParams()
    {
        if(($email=$this->input->post('email')))
        {
            $details=$this->user_model->get_user_security($email);
            if(!empty($details))
                echo json_encode(array('status'=>TRUE,'security'=>$details));
            else
                echo json_encode(array('status'=>FALSE,'message'=>'Incorrect email address!'));
        }
        
    }
    
    function verifyAnswer()
    {
        if(($answer=$this->input->post('answer')) && ($email=$this->input->post('email')))
        {
            if(($result=$this->user_model->verifySecurityAnswer($email,$answer)))
            {
                  $sess_array = array();
                  $sess_array = array(
                     'id' => $result->id,
                     'email' => $result->email,
                   );       
                   $this->session->set_userdata('logged_in', $sess_array);
                   echo json_encode(array('status'=>TRUE));
            }        
            else
                echo json_encode(array('status'=>FALSE,'message'=>'Oops! wrong answer'));
        }
        
    }

}

?>