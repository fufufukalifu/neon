<?php

class Login extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model('mLogin');
    }

    public function index() {
        $this->load->view('templating/t-header');
        $this->load->view('templating/t-navbar');
        $this->load->view('vLogin.php');
        $this->load->view('templating/t-footer');
    }

    //Fungsi untuk login, mengecek username dan password
    public function validasiLogin() {
        $username = htmlspecialchars($this->input->post('username'));
        $password = md5($this->input->post('password'));
        
        echo 'cek login';
        $this->mLogin->checkUser();
    }

}

?>