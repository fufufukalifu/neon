<?php 


/**
* 
*/
class Siswa extends MX_Controller
{
	
	 public function __construct() {
        parent::__construct();
        $this->load->model('msiswa');
        
    }

     // function untuk menampikan halam pertama saat registrasi
    public function index() {
    	 $data['tb_siswa']=$this->msiswa->get_siswa();
       $this->load->view('templating/t-header');
       $this->load->view('vPengaturanProfile');
       $this->load->view('templating/t-footer');


    }

    public function PengaturanProfile()
    {
    	 $data['tb_siswa']=$this->msiswa->get_siswa();
    	 $this->load->view('templating/t-header');
       $this->load->view('vPengaturanProfile');
       $this->load->view('templating/t-footer');


    }


    public function ubahprofilesiswa()
    { 

      //load library n helper
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');


      //syarat pengisian form perubahan profile
      $this->form_validation->set_rules('namadepan', 'Nama Depan',  'required');
      $this->form_validation->set_rules('alamat', 'Alamat',  'required');
      $this->form_validation->set_rules('nokontak', 'No Kontak',  'required');;

      //pesan error atau pesan kesalahan pengisian form 
      $this->form_validation->set_message('is_unique','*Nama Pengguna sudah terpakai');
      $this->form_validation->set_message('max_length', '*Nama Pengguna maksimal 12 karakter!');
      $this->form_validation->set_message('min_length', '*Nama Pengguna minimal 5 karakter!');
      $this->form_validation->set_message('required','*tidak boleh kosong!');



      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templating/t-header');
        $this->load->view('vPengaturanProfile');
        $this->load->view('templating/t-footer');
      } else {
        $namaDepan=htmlspecialchars($this->input->post('namadepan'));
        $namaBelakang=htmlspecialchars($this->input->post('namabelakang'));
        $alamat=htmlspecialchars($this->input->post('alamat'));
        $noKontak=htmlspecialchars($this->input->post('nokontak'));
        $biografi=htmlspecialchars($this->input->post('biografi'));
        $namaSekolah=htmlspecialchars($this->input->post('namasekolah'));
        $alamatSekolah=htmlspecialchars($this->input->post('alamatsekolah'));


        $data_post=array(
          'namaDepan'=>$namaDepan,
          'namaBelakang'=>$namaBelakang,
          'alamat'=>$alamat,
          'noKontak'=>$noKontak,
          'biografi'=>$biografi,
          'namaSekolah'=>$namaSekolah,
          'alamatSekolah'=>$alamatSekolah,
          );

        $this->msiswa->update_siswa($data_post);
      }
    }

    public function ubahemailsiswa()
    { 

      //load library n helper
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');


      //load library n helper
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      //syarat pengisian form perubahan nama pengguna dan email

      $this->form_validation->set_rules('email','Email','required|is_unique[tb_pengguna.email]');

      //pesan error atau pesan kesalahan pengisian form 
      $this->form_validation->set_message('is_unique','email','*Email sudah terpakai');
      $this->form_validation->set_message('required','*tidak boleh kosong!');


      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templating/t-header');
        $this->load->view('vPengaturanProfile');
        $this->load->view('templating/t-footer');
      } else {
        $email=htmlspecialchars($this->input->post('email'));

          $data_post=array(
          'eMail'=>$email,
          );
        $this->msiswa->update_email($data_post);
      }
      



    }


    public function ubahkatasandi()
    {

      //load library n helper
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');


      //syarat pengisian form perubahan pasword
      $this->form_validation->set_rules('sandilama', 'Kata Sandi Lama',   'required');
      $this->form_validation->set_rules('newpass', 'Kata Sandi Baru',   'required|matches[verifypass]');
      $this->form_validation->set_rules('verifypass', 'Password Confirmation', 'required');

       //pesan error atau pesan kesalahan pengisian form 
      $this->form_validation->set_message('required','*tidak boleh kosong!');
      $this->form_validation->set_message('matches','*Kata Sandi tidak sama!'); 


      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templating/t-header');
        $this->load->view('vPengaturanProfile');
        $this->load->view('templating/t-footer');
      } else {
        $kataSandi=htmlspecialchars(md5($this->input->post('newpass')));
   
          $data_post=array(
          'kataSandi'=>$kataSandi,
          );
        $this->msiswa->update_katasandi($data_post);
      }
      

    }
}

?>