<?php 
class Register extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('mregister');
    }
    
    // function untuk menampikan halam pertama saat registrasi
    public function index() {
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('vRegisterUser');
       $this->load->view('templating/t-footer');
    }

    // function untuk menampilkan halaman untuk pendaftaran user siswa
    public function registeruser(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('vRegisterUser');
       $this->load->view('templating/t-footer');
    }

    //function untuk menampilkan halaman pendaftaran Guru
    public function registerguru(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('vRegisterGuru');
       $this->load->view('templating/t-footer');
    }

    //function untuk menyimpan data pendaftaran user siswa ke database
    public function saveuser()
    {
      $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
      
       $this->load->view('templating/t-footer');
    }

    //function untuk menyimpan data pendaftaran guru ke database
    public function saveguru()
    {
     
      $nama=$_POST['nama'];
     $mataPelajaran=$_POST['mtpelajaran'];
     $namaPengguna=$_POST['namapengguna'];
     // $data['mregister']=$this->mregister->insert_guru($nama,$namaPelajaran,$namapengguna);

    }

}
 ?>