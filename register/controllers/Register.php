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

    // function untuk menampung nilai dari form kemudian di lempar 
    // ke function insert_guru di kelas model Mregister
    public function saveguru()
    {     
      $namaDepan=htmlspecialchars($this->input->post('namadepan'));
      $namaBelakang=htmlspecialchars($this->input->post('namaBelakang'));
      $mataPelajaran=htmlspecialchars($this->input->post('mtpelajaran'));
      $alamat=htmlspecialchars($this->input->post('alamat'));
      $noKontak=htmlspecialchars($this->input->post('nokontak'));
      $namaPengguna=htmlspecialchars($this->input->post('namapengguna'));

      $data['mregister']=$this->mregister->insert_guru($namaDepan,$namaBelakang,$mataPelajaran,$alamat,$noKontak,$namaPengguna);

    }

}
 ?>