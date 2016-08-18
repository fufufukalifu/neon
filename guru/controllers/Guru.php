<?php 


/**
* 
*/
class Guru extends MX_Controller
{
	
	 public function __construct() {
        parent::__construct();
        $this->load->model('mguru');
        $this->load->model('video/mvideos');
    }

    // function untuk menampikan halam pertama saat registrasi
    function index(){

    }

    public function dashboard($guru_id=""){
       $data['videos_uploaded'] = $this->load->mvideos->get_video_by_teacher($guru_id);
       //untuk mengambil data guru
       $data['data_guru'] = $this->load->mguru->get_single_guru($guru_id)[0];
       //untuk menghitung berapa banyak video yang sudah diupload
       $data['jumlah_video'] = count($this->load->mvideos->get_video_by_teacher($guru_id));
          
       $this->load->view('templating/t-header');
       $this->load->view('v-banner-guru');
       $this->load->view('v-container-video', $data);
    }

    //untuk merubah data guru.
    public function setting() {
       $this->load->view('templating/t-header');
       $this->load->view('vProfileGuru');
       $this->load->view('templating/t-footer');
    }

    public function profileguru()
    {
    	
    	 $this->load->view('templating/t-header');
       $this->load->view('vProfileGuru');
       $this->load->view('templating/t-footer');
    }


    public function ubahprofileguru()
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
        $this->load->view('vProfileGuru');
        $this->load->view('templating/t-footer');
      } else {
        $namaDepan=htmlspecialchars($this->input->post('namadepan'));
        $namaBelakang=htmlspecialchars($this->input->post('namabelakang'));
        $mataPelajaran=htmlspecialchars($this->input->post('mtpelajaran'));
        $alamat=htmlspecialchars($this->input->post('alamat'));
        $noKontak=htmlspecialchars($this->input->post('nokontak'));
        $biografi=htmlspecialchars($this->input->post('biografi'));


        $data_post=array(
          'namaDepan'=>$namaDepan,
          'namaBelakang'=>$namaBelakang,
          'mataPelajaran'=>$mataPelajaran,
          'alamat'=>$alamat,
          'noKontak'=>$noKontak,
          'biografi'=>$biografi,
          );

        $this->mguru->update_guru($data_post);
      }
    }

    public function ubahakunguru()
    { 

      //load library n helper
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');


      //load library n helper
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      //syarat pengisian form perubahan nama pengguna dan email
      $this->form_validation->set_rules('namapengguna', 'Nama Pengguna',  'trim|required|min_length[5]|max_length[12]|is_unique[tb_pengguna.namaPengguna]');
      $this->form_validation->set_rules('email','Email','required|is_unique[tb_pengguna.email]');

      //pesan error atau pesan kesalahan pengisian form 
      $this->form_validation->set_message('is_unique','email','*Email sudah terpakai');
      $this->form_validation->set_message('is_unique','*Nama Pengguna sudah terpakai');
      $this->form_validation->set_message('max_length', '*Nama Pengguna maksimal 12 karakter!');
      $this->form_validation->set_message('min_length', '*Nama Pengguna minimal 5 karakter!');
      $this->form_validation->set_message('required','*tidak boleh kosong!');


      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templating/t-header');
        $this->load->view('vProfileGuru');
        $this->load->view('templating/t-footer');
      } else {
        $namaPengguna=htmlspecialchars($this->input->post('namapengguna'));
        $email=htmlspecialchars($this->input->post('email'));
          $data_post=array(
          'namaPengguna'=>$namaPengguna,
          'email'=>$email,
          );
        $this->mguru->update_akun($data_post);
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
        $this->load->view('vProfileGuru');
        $this->load->view('templating/t-footer');
      } else {
        $kataSandi=htmlspecialchars(md5($this->input->post('newpass')));
     
          $data_post=array(
          'kataSandi'=>$kataSandi,
          );
        $this->mguru->update_katasandi($data_post);
      } 

    }

    public function kirimemail()
    {
       $this->load->library('email'); // load email library
        $this->email->from('noreply@sibejooclass.com', 'sender name');
        $this->email->to('goichinime@gmail.com');
        $this->email->subject('test subjek');
        $this->email->message('test kirim');
        if ($this->email->send())
            echo "Mail Sent!";
        else
            echo "There is error in sending mail!";
    }

}

?>