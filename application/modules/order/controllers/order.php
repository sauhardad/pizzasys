<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('order_model');
    }
    
    function load_pizza_data(){
        $pizza_data = array(
            'crust' => $this->order_model->get_crust_data(),
            'sauce' => $this->order_model->get_sauce_data(),
            'cheese' => $this->order_model->get_cheese_data(),
            'toppings' => $this->order_model->get_toppings_data()
        );
        return $pizza_data;
    }
    
    function index(){
        //$crust_data = $this->order_model->get_crust_data();
        $data = $this->load_pizza_data();
        $this->load->view('order_view', $data);
    }
    
    /* This portion of code is solely for validation */
    function order_validation(){
        $size = $this->input->post('size');
        $crust = $this->input->post('crust');
        $sauce = $this->input->post('sauce');
        $cheese = $this->input->post('cheese');
        $toppings_arr = $this->input->post('toppings');
        
        $data_values = array(
            'size_val' => $size,
            'crust_val' => $crust,
            'sauce_val' => $sauce,
            'cheese_val' => $cheese,
            'toppings_arr_val' => $toppings_arr
        );
        
        $toppings_name = array();
        if($toppings_arr != NULL){
            foreach ($toppings_arr as $val){
                array_push($toppings_name, $this->order_model->get_toppings_name($val));
            }
        }
        
        $data = array(
            'size' => $this->get_name_by_size($size),
            'crust' => $this->order_model->get_crust_name($crust),
            'sauce' => $this->order_model->get_sauce_name($sauce),
            'cheese' => $this->order_model->get_cheese_name($cheese),
            'toppings' => $toppings_name,
            'data_values' => $data_values
        );
        
        $toppings = count($this->input->post('toppings'));
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('size', 'Size', 'required|callback_size_validate');
        $this->form_validation->set_rules('crust', 'Crust', 'required|callback_crust_validate');
        $this->form_validation->set_rules('sauce', 'Sauce', 'required|callback_sauce_validate');
        $this->form_validation->set_rules('cheese', 'Cheese', 'required|callback_cheese_validate');
        $this->form_validation->set_rules('toppings', 'Toppings', 'callback_toppings_validate');
        
        if($this->form_validation->run() == FALSE)
        {
            $data = $this->load_pizza_data();
            $this->load->view('order_view', $data);
        }
        else{
            $this->session->set_userdata('data_values', $data_values);
            $this->load->view('order_confirm_view', $data);
        }
        
    //    foreach ($order["toppings"] as $value)
      //      echo $value;
    }
    
    function size_validate($size)
    {
        if($size=="none"){
           $this->form_validation->set_message('size_validate', 'Please Select Your Size.');
           return false;
       } else{
            return true;
       }
    }
    
    function crust_validate($crust)
    {
        if($crust=="none"){
           $this->form_validation->set_message('crust_validate', 'Please Select Your Crust.');
           return false;
       } else{
            return true;
       }
    }
    function sauce_validate($sauce)
    {
        if($sauce=="none"){
           $this->form_validation->set_message('sauce_validate', 'Please Select Your Sauce.');
           return false;
       } else{
            return true;
       }
    }
    
    function cheese_validate($cheese)
    {
        if($cheese=="none"){
           $this->form_validation->set_message('cheese_validate', 'Please Select Your Cheese.');
           return false;
       } else{
            return true;
       }
    }
    
    function toppings_validate($toppings)
    {
        if($toppings <= 0){
           $this->form_validation->set_message('toppings_validate', 'Please Select Your Toppings.');
           return false;
       } else{
            return true;
       }
    }
    /* Validation ends here */
    
    /*Confirmation of order */
    function confirm_order(){
        $op_type =  $this->input->post('submit');
        if($op_type == "Confirm"){
            //$data_values = $this->session->userdata('data_values');
            $this->load->view('payment/payment_view');
        }else if($op_type == "Edit Order2"){
            $data = $this->load_pizza_data();
            $data_values = $this->session->userdata('data_values');
            $this->load->view('order_view', $data);
        }else {
            $this->session->unset_userdata('data_values');
            echo "cancelled!";
        }
    }
    /* End confirmation order here*/
    
    function get_name_by_size($size){
        if($size == 1){
            return "Small (4 inches)";
        }else if($size == 2){
            return "Medium (6 inches)";
        }else {
            return "Large (8 inches)";
        }
    }
}

?>