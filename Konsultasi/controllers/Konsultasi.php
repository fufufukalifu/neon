<?php 
class Konsultasi extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('vdaftarpertanyaan');
       $this->load->view('templating/t-footer');
    }

    public function daftarPertanyaan(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('vdaftarpertanyaan');
       $this->load->view('templating/t-footer');
    }

    public function bertanya(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
      
       $this->load->view('vbertanya');
       $this->load->view('templating/t-footer');
    }

     public function konsul(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       
       $this->load->view('vkonsultasi');
       $this->load->view('templating/t-footer');
    }


}
 ?>