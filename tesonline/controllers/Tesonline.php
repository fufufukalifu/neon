<?php 
class Tesonline extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       //$this->load->view('templating/t-container');
       $this->load->view('vindex.php');
       $this->load->view('templating/t-footer');
    }

    public function test() {
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('vTest.php');
       $this->load->view('templating/t-footer');
    }

    public function DetailTest() {
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('vDetailTest.php');
       $this->load->view('templating/t-footer');
    }

    public function mulaiTest() {
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('vHalamanTest.php');
       $this->load->view('templating/t-footer');
    }

}
 ?>