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
    $this->load->library('sessionchecker');
    $this->sessionchecker->cek_token();
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
    APPPATH.'modules/konsultasi/views/v-daftar-konsultasi.php',
    APPPATH.'modules/konsultasi/views/v-show-tingkat.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );
  $data['mapel'] = $this->mmatapelajaran->get_mapel_by_tingkatID($this->get_tingkat_siswa());
  $data['questions']=$this->mkonsultasi->get_all_questions();
  $data['my_questions']=$this->mkonsultasi->get_my_questions($this->get_id_siswa());
  $data['questions_bylevel']=$this->mkonsultasi->get_my_question_level($this->get_tingkat_siswa());


  $this->parser->parse( 'templating/index', $data );
  // var_dump($this->get_tingkat_siswa());
}

function get_tingkat_siswa(){
  $id_tingkat = $this->mtingkat->get_level_by_siswaID($this->get_id_siswa());
  if ($id_tingkat) {
    return $id_tingkat[0]['tingkatID'];
  } 

}
    //ajax add konsultasis
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


//bertanya berdasarkan idsub
public function bertanya($idsub){
  $data = array(
    'judul_halaman' => 'Neon - Konsultasi',
    'judul_header'=> 'Buat Pertanyaan',
    'idsub' => $idsub
    );

  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
    APPPATH.'modules/templating/views/t-f-pagetitle.php',
    APPPATH.'modules/konsultasi/views/v-create-konsultasi.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );
  $this->parser->parse( 'templating/index', $data );
}

public function singlekonsultasi($id_pertanyaan){
  $single_pertanyaan = $this->mkonsultasi->get_pertanyaan($id_pertanyaan)[0];
  $jumlah = $this->mkonsultasi->get_jumlah_postingan($id_pertanyaan);
  $date = $single_pertanyaan['date_created'];

  $timestamp = strtotime($date);

  $data = array(
    'judul_halaman' => 'Neon - Konsultasi',
    'judul_header'=> $single_pertanyaan['judulPertanyaan'],
    'isi'=> $single_pertanyaan['isiPertanyaan'],
    'author'=> $single_pertanyaan['namaDepan']." ".$single_pertanyaan['namaBelakang'],
    'jumlah'=>$jumlah,
    'sub'=>$single_pertanyaan['judulSubBab'],
    'akses'=>$single_pertanyaan['hakAkses'],
    'id_pertanyaan'=>$id_pertanyaan,
    'id_pengguna'=>$this->session->userdata('id'),
    'tanggal'=>date("d", $timestamp),
    'bulan'=>date("M", $timestamp),
    );
      // print_r($data);
  $data['isi'] = $single_pertanyaan['isiPertanyaan'];
  $data['data_postingan'] = $this->mkonsultasi->get_postingan($id_pertanyaan);
  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
      // APPPATH.'modules/templating/views/t-f-pagetitle.php',
    APPPATH.'modules/konsultasi/views/v-single-konsultasi.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );



  $this->parser->parse( 'templating/index', $data );
}

  # fungsi ajax get jumlah postingan
function ajax_get_jumlah_postingan($id_pertanyaan){
  $jumlah = $this->mkonsultasi->get_jumlah_postingan($id_pertanyaan);
  echo $jumlah;
}

//add jawaban.
function ajax_add_jawaban(){
  $data = array(
    'isiJawaban' => $this->input->post( 'isiJawaban' ),
    'penggunaID' => $this->input->post( 'penggunaID' ),
    'pertanyaanID' =>$this->input->post( 'pertanyaanID' ),
    );
  $this->mkonsultasi->insert_jawaban($data);
}

function check_point($id_jawaban){
  $id_siswa = $this->get_id_siswa();
  $id_pengguna = $this->get_id_pengguna($id_jawaban);
  $komentar = "Asd";
  $id_jawab = $this->input->post('idJawaban');
  // $id_jawab = "53";


  $data = array(
    'siswaID' => $id_siswa,
    'penggunaID' => $id_pengguna,
    'komentar' =>$komentar,
    'jawabID'=>$id_jawab
    );
  

  $check = $this->mkonsultasi->check_postingan($data);
  echo json_encode($check);
}

//add point.
function ajax_add_point($id_jawaban){
  //penggunaID
  //siswaID
  $id_siswa = $this->get_id_siswa();
  $id_pengguna = $this->get_id_pengguna($id_jawaban);
  $komentar = $this->input->post('isiKomentar');
  $id_jawab = $this->input->post('idJawaban');

  $data = array(
    'siswaID' => $id_siswa,
    'penggunaID' => $id_pengguna,
    'komentar' =>$komentar,
    'jawabID'=>$id_jawab
    );
  // var_dump($data);

  // $check = $this->mkonsultasi->check_postingan($data);
  $this->mkonsultasi->insert_point($data);
  // var_dump($check); 
  // "<script>alert('masuk')</script>";

}

function get_id_pengguna($id_jawaban){
  return $this->mkonsultasi->get_penggunaID($id_jawaban);
}

// check postingan 
// function check_point(){

// }

function searchpertanyaan(){
  $this->load->view('coba');
}

function search_all(){
  $namapertanyaan = $_GET['term'];
  // var_dump($namapertanyaan);
  $result = $data['questions']=$this->mkonsultasi->get_all_questions($namapertanyaan);

  $pertanyaan = array();
  foreach ($result as $key) {
    $pertanyaan[] = array(
      'value'=>$key['judulPertanyaan'],
      'url'=>base_url('konsultasi/singlekonsultasi')."/".$key['pertanyaanID'],
      );
    // $pertanyaan[] = $key->judulPertanyaan  
  }
  echo json_encode($pertanyaan);
}

function search_mine(){
  $namapertanyaan = $_GET['term'];
  // var_dump($namapertanyaan);
  $result = $data['questions']=$this->mkonsultasi->get_my_questions($this->get_id_siswa(),$namapertanyaan);

  $pertanyaan = array();
  foreach ($result as $key) {
    $pertanyaan[] = array(
      'value'=>$key['judulPertanyaan'],
      'url'=>base_url('konsultasi/singlekonsultasi')."/".$key['pertanyaanID'],
      );
    // $pertanyaan[] = $key->judulPertanyaan  
  }
  echo json_encode($pertanyaan);
}


function search_tingkat(){
  $namapertanyaan = $_GET['term'];
  // var_dump($namapertanyaan);
  $result = $data['questions']=$this->mkonsultasi->get_my_question_level($this->get_tingkat_siswa(),$namapertanyaan);

  $pertanyaan = array();
  foreach ($result as $key) {
    $pertanyaan[] = array(
      'value'=>$key['judulPertanyaan'],
      'url'=>base_url('konsultasi/singlekonsultasi')."/".$key['pertanyaanID'],
      );
    // $pertanyaan[] = $key->judulPertanyaan  
  }
  echo json_encode($pertanyaan);
}




}
?>