<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   session_start(); 
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
     //redirect to the home page
     redirect('home', 'refresh');
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
   redirect('home', 'refresh');
 }

}

?>