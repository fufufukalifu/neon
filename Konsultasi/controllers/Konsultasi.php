<?php 
class Konsultasi extends MX_Controller{

    //put your code here
  private $upload_path = "./assets/image/konsultasi";

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
  $bab = $this->input->post( 'bab' );
  $data = array(
    'isiPertanyaan' => $isi,
    'judulPertanyaan' => $judul,
    'babID' =>$bab,
    'siswaID' =>$this->get_id_siswa()
    );
  $this->mkonsultasi->insert_konstulasi( $data );
      // echo "string";
}

function list_image_uploaded(){
  $list = $this->mkonsultasi->show_image();

  $data = array();
  $n=1;
  $baseurl = base_url();
  foreach ( $list as $item ) {
    $row = array();

    $row[] = $n;
    $row[] = $item['nama_file'];
    $row[] = $item['date_created'];
    $link = base_url("assets/image/konsultasi/").$item['nama_file'];
    $row[] = "<img src=".$link." width='100px'>";
    $row[] = $link;

    $row[] = "<a class='' >copy</a>";



    $data[] = $row;
    $n++;

  }

  $output = array(
    "data"=>$data,
    );
  echo json_encode( $output );


}

//bertanya berdasarkan idsub
public function bertanya($bab){

  $data = array(
    'judul_halaman' => 'Neon - Konsultasi',
    'judul_header'=> 'Buat Pertanyaan',
    'bab' => $bab
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
  $date = $single_pertanyaan['tgl_dibuat'];

  $timestamp = strtotime($date);

  // var_dump($single_pertanyaan['date_created']);  

  $data = array(
    'judul_halaman' => 'Neon - '.$single_pertanyaan['judulPertanyaan'],
    'judul_header'=> $single_pertanyaan['judulPertanyaan'],
    'isi'=> $single_pertanyaan['isiPertanyaan'],
    'author'=> $single_pertanyaan['namaDepan']." ".$single_pertanyaan['namaBelakang'],
    'jumlah'=>$jumlah,
    'bab'=>$single_pertanyaan['judulBab'],
    'akses'=>$single_pertanyaan['hakAkses'],
    'id_pertanyaan'=>$id_pertanyaan,
    'id_pengguna'=>$this->session->userdata('id'),
    'tanggal'=>date("d", $timestamp),
    'bulan'=>date("M", $timestamp),
    'photo'=>base_url("assets/image/photo/siswa/".$single_pertanyaan['photo'])
    );
      // print_r($data);
  $data['isi'] = $single_pertanyaan['isiPertanyaan'];
  $data['data_postingan'] = $this->mkonsultasi->get_postingan($id_pertanyaan);
  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
      APPPATH.'modules/templating/views/t-f-pagetitle.php',
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

function upload(){
  $data = array(
    'judul_halaman' => 'Neon - Konsultasi',
    'judul_header'=> "Upload untuk forum",
    );

  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
    APPPATH.'modules/templating/views/t-f-pagetitle.php',
    APPPATH.'modules/konsultasi/views/v-upload-image.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );


  $this->parser->parse( 'templating/index', $data );
}

function generate_name(){
  print_r($timestamp);
}

public function do_upload(){
  if ( ! empty($_FILES)) 
  {
    $config["upload_path"]   = $this->upload_path;
    $config["allowed_types"] = "gif|jpg|png";

    // get file name
    //random name
    $new_name = time()."-".$_FILES['file']['name'];
    $config['file_name'] = $new_name;
    // get
    $this->load->library('upload', $config);
  // echo "<a data-nama='".$new_name."' class='insert' onclick='insert()'>Sisipkan</a>";
    echo "<a data-nama='".$new_name."' class='insert' onclick='insert()' style='border: 2px solid #18bb7c; padding: 2px;display: inline' title='Sisipkan' disabled><i class='fa fa-cloud-upload'></i></a>";



    if ( ! $this->upload->do_upload("file")) {
      echo "failed to upload file(s)";
    }else{
      $file_data = $this->upload->data();
      $data['data_upload_konsultasi']=  array(
        'nama_file' => $new_name,
        'penggunaID' => $this->session->userdata('id')
        );
      $this->mkonsultasi->in_upload_konsultasi($data);
    }
  }
}

public function remove_img()
{
  $upload_path = "./assets/image/gallery";
  $file = $this->input->post('file');
  $UUID = $this->input->post('UUID');
  $this->Mgallery->del_gallery($UUID);
    // unlink(FCPATH . $upload_path . "/" .$file );
  if ($file && file_exists($upload_path . "/" . $file)) {
    unlink($upload_path . "/" . $file);
  } 
}

function show_image(){

}

}
?>