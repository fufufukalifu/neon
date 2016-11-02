<?php 

class Konsultasi extends MX_Controller{

    //put your code here

  public function __construct() {
    $this->load->library( 'parser' );
    $this->load->model('mkonsultasi');
    $this->load->model('tryout/mtryout');
    parent::__construct();
  }



  public function index() {
    $data = array(
      'judul_halaman' => 'Neon - Konsultasi',
      'judul_header'=> 'Daftar Pertanyaan'
      );

    $data['files'] = array(
      APPPATH.'modules/homepage/views/v-header-login.php',
      APPPATH.'modules/templating/views/t-f-pagetitle.php',
      APPPATH.'modules/Konsultasi/views/v-daftar-konsultasi.php',
      APPPATH.'modules/templating/views/footer.php'
      );
    $id_siswa = $this->mtryout->get_id_siswa();
    $data['questions']=$this->mkonsultasi->get_all_questions();
    $data['my_questions']=$this->mkonsultasi->get_my_questions($id_siswa);
    // var_dump($data['my_questions']);

            $this->parser->parse( 'templating/index', $data );
  }




  public function daftarPertanyaan(){

   $this->load->view('templating/t-header');

   $this->load->view('templating/t-navbarLogin');

   $this->load->view('vdaftarpertanyaan');

   $this->load->view('vChating');

   $this->load->view('templating/t-footer');

 }



 public function bertanya(){

   $this->load->view('templating/t-header');

   $this->load->view('templating/t-navbarLogin');    

   $this->load->view('vbertanya');

   $this->load->view('vChating');

   $this->load->view('templating/t-footer');

 }



 public function konsul(){

   $this->load->view('templating/t-header');

   $this->load->view('templating/t-navbarLogin');

   $this->load->view('vkonsultasi');

   $this->load->view('vChating');

   $this->load->view('templating/t-footer');

 }





}

?>