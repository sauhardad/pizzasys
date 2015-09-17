<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   //check login
   if(!$this->session->userdata('logged_in'))
       redirect('user/login', 'refresh');
   $this->load->model('user/user_model');
 }

 function index()
 {
    $session_data = $this->session->userdata('logged_in');
    $data['session_data']=$session_data;
    $data['title']="Home";

    $this->template->load('home_template', 'home_view', $data);
   
 }
}

?>