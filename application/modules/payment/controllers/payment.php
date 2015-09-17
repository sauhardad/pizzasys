<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('payment_model');
    }
       
    function index(){
        $this->load->view('payment_view');
        echo "routed login";
        $this->session->unset_userdata('routed_login');
    }
    
    function payment_type(){
        $payment_amount = $this->input->post('payment_amount');
        $payment_method = $this->input->post('payment_method');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('payment_method', 'Payment Method', 'callback_method_validate');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('payment_view');
        }
        else{
            
            $this->session->set_userdata('payment_amount', $payment_amount);
            if($payment_method == "debit_card" || $payment_method == "credit_card"){
                $this->load->view('card_payment');
            }else {
                $this->load->view('bank_payment');
            }
    
        }
    }
    function method_validate($payment_method)
    {
        if($payment_method=="debit_card" || $payment_method=="credit_card" || $payment_method=="bank_account"){
            return true;
        } else{
            $this->form_validation->set_message('method_validate', 'Please Select Your Payment Method.');
            return false;
       }
    }
    
    function card_payment(){
        $card_type = $this->input->post('card_type');
        $card_number = $this->input->post('card_number');
        $card_pin = $this->input->post('card_pin');
        $expire_month = $this->input->post('expire_month');
        $expire_year = $this->input->post('expire_year');
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('card_type', 'Card Type', 'required|callback_type_validate');
        $this->form_validation->set_rules('card_number', 'Card Number', 'required|callback_number_validate');
        $this->form_validation->set_rules('card_pin', 'Card PIN', 'required|callback_pin_validate');
        $this->form_validation->set_rules('expire_month', 'Expire Month', 'required');
        $this->form_validation->set_rules('expire_year', 'Expire Year', 'required|callback_expire_on_validate['.$this->input->post('expire_month').']');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('card_payment');
        }
        else{
            
            /*Inserting order information to database*/
            $this->payment_model->insert_order($this->session->userdata('data_values'));
            $this->session->unset_userdata('data_values');
            $this->session->unset_userdata('payment_amount');
            $this->load->view('thank_you');
        }
    }
    function type_validate($card_type){
        if($card_type == "none"){
           $this->form_validation->set_message('type_validate', 'Please select card type.');
           return false;
       } else{
            return true;
       }
    }
    
    function number_validate($card_number){    
        if(strlen($card_number) == 16 && preg_match('/^[0-9,]+$/', $card_number)){
            return true;
       } else{
            $this->form_validation->set_message('number_validate', 'Please enter card number correctly.');
            return false;
       }
    }
    
    function pin_validate($card_pin){
        if(strlen($card_pin) == 3 && preg_match('/^[0-9,]+$/', $card_pin)){
            return true;
       } else{
            $this->form_validation->set_message('pin_validate', 'Please enter a correct PIN.');
            return false;
       }
    }
    
    function expire_on_validate($expire_year, $expire_month){
        $now = new \DateTime('now');
        $cur_month = $now->format('m');
        $cur_year = $now->format('Y');

        if($expire_year > $cur_year){
            return true;
       }else if($expire_year == $cur_year){
            if($expire_month >= $cur_month){
                return true;
            }else {
                $this->form_validation->set_message('expire_on_validate', 'Your card has expired!');
                return false;
            }
       } else{
            $this->form_validation->set_message('expire_on_validate', 'Your card has expired!');
            return false;
       }
    }
    
    
    function bank_payment(){
        $account_type = $this->input->post('account_type');
        $routing_number = $this->input->post('routing_number');
        $account_number = $this->input->post('account_number');
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('account_type', 'Account Type', 'required');
        $this->form_validation->set_rules('routing_number', 'Routing Number', 'required');
        $this->form_validation->set_rules('account_number', 'Account Number', 'required');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('bank_payment');
        }
        else{
            /*Inserting order information to database*/
            $this->payment_model->insert_order($this->session->userdata('data_values'));
            $this->session->unset_userdata('data_values');
            $this->session->unset_userdata('payment_amount');
            $this->load->view('thank_you');
        }
    }
}

?>