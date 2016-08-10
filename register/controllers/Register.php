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
       $this->load->view('vRegisterUser');
       $this->load->view('templating/t-footer');
    }

    // function untuk menampilkan halaman untuk pendaftaran user siswa
    public function registersiswa(){
       $this->load->view('templating/t-header');
       $this->load->view('vRegisterUser');
       $this->load->view('templating/t-footer');
    }

    //function untuk menampilkan halaman pendaftaran Guru
    public function registerguru(){
       $this->load->view('templating/t-header');
       $this->load->view('vRegisterGuru');
    }

    //function untuk menyimpan data pendaftaran user siswa ke database
    public function savesiswa()
    {
      //data siswa
      $namaDepan=htmlspecialchars($this->input->post('namadepan'));
      $namaBelakang=htmlspecialchars($this->input->post('namabelakang'));
      $alamat=htmlspecialchars($this->input->post('alamat'));
      $noKontak=htmlspecialchars($this->input->post('nokontak'));
      $namaSekolah=htmlspecialchars($this->input->post('namasekolah'));
      $alamatSekolah=htmlspecialchars($this->input->post('alamatsekolah'));

      //data akun
      $namaPengguna=htmlspecialchars($this->input->post('namapengguna'));
      $kataSandi=htmlspecialchars(md5($this->input->post('katasandi')));
      $hakAkses='murid';


      //melempar data guru ke function insert_guru di kelas model
      $data['mregister']=$this->mregister->insert_siswa($namaDepan,$namaBelakang,$alamat,$noKontak,$namaSekolah,$alamatSekolah);
      //melempar data guru ke function insert_pengguna di kelas model
      $data['mregister']=$this->mregister->insert_pengguna($namaPengguna,$kataSandi,$hakAkses);





    }

    // function untuk menampung data dari form kemudian di lempar 
    // ke function insert_guru dan insert_pengguna di kelas model Mregister
    public function saveguru()
    {     
      //data guru
      $namaDepan=htmlspecialchars($this->input->post('namadepan'));
      $namaBelakang=htmlspecialchars($this->input->post('namabelakang'));
      $mataPelajaran=htmlspecialchars($this->input->post('mtpelajaran'));
      $alamat=htmlspecialchars($this->input->post('alamat'));
      $noKontak=htmlspecialchars($this->input->post('nokontak'));

      //data untuk akun
      $namaPengguna=htmlspecialchars($this->input->post('namapengguna'));
      $kataSandi=htmlspecialchars(md5($this->input->post('katasandi')));
      $hakAkses='guru';

      //melempar data guru ke function insert_guru di kelas model
      $data['mregister']=$this->mregister->insert_guru($namaDepan,$namaBelakang,$mataPelajaran,$alamat,$noKontak,$namaPengguna);
      //melempar data guru ke function insert_pengguna di kelas model
      $data['mregister']=$this->mregister->insert_pengguna($namaPengguna,$kataSandi,$hakAkses);

    }

}
 ?>