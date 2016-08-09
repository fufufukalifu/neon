<?php 
class Register extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbarLogin');
       $this->load->view('vRegisterUser');
       $this->load->view('templating/t-footer');
    }

    public function registeruser(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbarLogin');
      $this->load->view('vRegisterUser');
       $this->load->view('templating/t-footer');
    }



}
 ?>