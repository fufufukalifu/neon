<?php 

class Konsultasi extends MX_Controller{

    //put your code here
  public function __construct() {
    $this->load->library( 'parser' );
    $this->load->model('mkonsultasi');
    $this->load->model('tryout/mtryout');
    $this->load->model('tingkat/mtingkat');
    $this->load->model('matapelajaran/mmatapelajaran');


    parent::__construct();
  }

  function get_id_siswa(){
   return $this->mtryout->get_id_siswa();

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
      APPPATH.'modules/Konsultasi/views/v-show-tingkat.php',
      APPPATH.'modules/homepage/views/v-footer.php'
      );
    $data['mapel'] = $this->mmatapelajaran->get_mapel_by_tingkatID($this->get_tingkat_siswa());
    $data['questions']=$this->mkonsultasi->get_all_questions();
    $data['my_questions']=$this->mkonsultasi->get_my_questions($this->get_id_siswa());
    $data['questions']=$this->mkonsultasi->get_all_questions();
    $data['questions_bylevel']=$this->mkonsultasi->get_my_question_level($this->get_tingkat_siswa());


    $this->parser->parse( 'templating/index', $data );
  }

  function get_tingkat_siswa(){
    $id_tingkat = $this->mtingkat->get_level_by_siswaID($this->get_id_siswa());
    if ($id_tingkat) {
    return $id_tingkat[0]['tingkatID'];
    } 
    
  }

    function ajax_add_konsultasi(){
        $isi = $this->input->post( 'isi' ) ;
        $judul = $this->input->post( 'namapertanyaan' );
        $sub = $this->input->post( 'idsub' );
    $data = array(
      'isiPertanyaan' => $isi,
      'judulPertanyaan' => $judul,
      'subBabID' =>$sub,
      'siswaID' =>$this->get_id_siswa()
    );
    $this->mkonsultasi->insert_konstulasi( $data );
      // echo "string";
    }

 public function bertanya($idsub){
    $data = array(
      'judul_halaman' => 'Neon - Konsultasi',
      'judul_header'=> 'Buat Pertanyaan',
      'idsub' => $idsub
      );

    $data['files'] = array(
      APPPATH.'modules/homepage/views/v-header-login.php',
      APPPATH.'modules/templating/views/t-f-pagetitle.php',
      APPPATH.'modules/Konsultasi/views/v-create-konsultasi.php',
      APPPATH.'modules/homepage/views/v-footer.php'
      );
    $this->parser->parse( 'templating/index', $data );
 }

  public function singlekonsultasi($id_pertanyaan){
      $single_pertanyaan = $this->mkonsultasi->get_pertanyaan($id_pertanyaan)[0];
      $jumlah = $this->mkonsultasi->get_jumlah_postingan($id_pertanyaan);
    $data = array(
      'judul_halaman' => 'Neon - Konsultasi',
      'judul_header'=> $single_pertanyaan['judulPertanyaan'],
      'isi'=> $single_pertanyaan['isiPertanyaan'],
      'author'=> $single_pertanyaan['namaDepan']." ".$single_pertanyaan['namaBelakang'],
      'jumlah'=>$jumlah,
      'sub'=>$single_pertanyaan['judulSubBab'],
      'akses'=>$single_pertanyaan['hakAkses']

      );
      // print_r($data);
    
    $data['data_postingan'] = $this->mkonsultasi->get_postingan($id_pertanyaan);
    $data['files'] = array(
      APPPATH.'modules/homepage/views/v-header-login.php',
      // APPPATH.'modules/templating/views/t-f-pagetitle.php',
      APPPATH.'modules/Konsultasi/views/v-single-konsultasi.php',
      APPPATH.'modules/homepage/views/v-footer.php'
      );



    $this->parser->parse( 'templating/index', $data );
 }

  # fungsi ajax get jumlah postingan
 function ajax_get_jumlah_postingan($id_pertanyaan){
  $jumlah = $this->mkonsultasi->get_jumlah_postingan($id_pertanyaan);
  echo $jumlah;
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