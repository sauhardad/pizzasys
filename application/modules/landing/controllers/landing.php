<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Landing extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   if($this->session->userdata('logged_in'))
       redirect('home', 'refresh');
   $this->load->model('user/user_model');
 }

 function index()
 {
    $session_data = $this->session->userdata('logged_in');
    $data['session_data']=$session_data;


    $this->load->view('landing_view', $data);
   
 }
}

?>