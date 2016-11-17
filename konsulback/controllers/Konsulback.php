<?php 
/**
* 
*/
class Komenback extends MX_Controller
{

  function __construct(){
   $this->load->library('parser');
   $this->load->model('mkomen');
   $this->load->model('video/mvideos');
   $this->load->model('guru/mguru');


 }

 public function index() {
  $data['judul_halaman'] = "Dashboard Admin";
  $data['files'] = array(
   APPPATH . 'modules/komenback/views/v-table-komen.php',
   );
  $hakAkses = $this->session->userdata['HAKAKSES'];

  if ($hakAkses == 'admin') {
            // jika admin
   $this->parser->parse('admin/v-index-admin', $data);
 } elseif ($hakAkses == 'guru') {
            // jika guru
   // redirect(site_url('guru/dashboard/'));
  $data['judul_halaman'] = "Dashboard Guru : Komen";
  $data['files'] = array(
   APPPATH . 'modules/komenback/views/v-table-komen.php',
   );
  $this->parser->parse('templating/index-b-guru', $data);

} elseif ($hakAkses == 'siswa') {
 redirect(site_url('welcome'));
} else {
            // jika siswa redirect ke homepage
 redirect(site_url('login'));
}
}

function ajax_data_komen(){
  $list = $this->mkomen->get_all_komen();
            // var_dump($list);


  $data = array();

  foreach ( $list as $komen_item ) {

    $row = array();
    $row[] = $komen_item->komenID;
      // $row[] = htmlspecialchars(substr($komen_item->isiKomen, 0, 100));
    $row[] = htmlspecialchars($komen_item->isiKomen);

    $row[] = $komen_item->date_created;
    $row[] = $komen_item->judulVideo;
    $row[] = "
    <a class='btn btn-primary' onclick='respon(".$komen_item->komenID.")'><i class='icon ico-pencil' title='Respon'></i></a> 
    <a class='btn btn-danger' onclick='spam(".$komen_item->komenID.")'><i class='icon ico-remove3' title='Hapus'></i></a>
    <a class='btn btn-success' onclick='check(".$komen_item->videoID.")'><i class='ico-bubble-video-chat' title='Check Video'></i></a>
    ";



    $data[] = $row;
  }

  $output = array(
    "data"=>$data,
    );

  echo json_encode( $output );
}


public function addkomen() {
      //select dulu data dari komen berdasarkan komen
  $idKomen = $this->input->post('idKomen');
  $komenpost = $this->input->post('isiKomen');

  $komen = $this->mkomen->get_komen_by_idkomen($idKomen);
  if ($komen!=array()) {
   $isikomen = "<blockquote>".$komen[0]['isiKomen']."</blockquote>".$komenpost;
   $datas = array('isikomen'=>$isikomen,
    'videoID'=>$komen[0]['videoID'],
    'userID'=>$this->session->userdata('id'),
    'status'=>1
    );
   $this->mvideos->insertComment($datas);

 }else{
  echo "gagal";
}

}

function seevideo($idvideo){
        //data untuk templating
  $data['videosingle'] = $this->load->mvideos->get_single_video($idvideo);
  if ($data['videosingle'] == array()) {
    $data['title'] = "Video yang anda pilih tidak ada, mohon kirimi kami laporan";

  } else {
            //ambil id bab.
    $idbab = $this->load->mvideos->get_nama_sub_by_id_video($idvideo)['id'];
    $video_by_bab = $this->mvideos->get_all_video_by_bab($idbab);

            //ambil satu video bedasarkan idnya
    $namasub = $this->load->mvideos->get_nama_sub_by_id_video($idvideo)['judulSubBab'];
    $data['videosingle'] = $this->load->mvideos->get_single_video($idvideo);
    $onevideo = $data['videosingle'];

    if($onevideo[0]->namaFile==NULL){
      // $judul = $onevideo[0]->link;
      $judul = "<iframe width='100%' height='430' src='".$onevideo[0]->link."''></iframe>";
    }else{
      $link = base_url()."assets/video/".$onevideo[0]->namaFile;
      $judul = "<video id='my-video' class='video-js' controls preload='auto'
      poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
      <source src='".$link."'  style='width: 90%;height: 400px'  type='video/mp4'>
        <source src='".$link."' type='video/webm'>
          <p class='vjs-no-js'>
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href='http://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
          </p>
        </video>";
      }

    // echo $judulxz;

      $guruID = $onevideo[0]->guruID;
      $penulis = $this->load->mguru->get_penulis($guruID)[0];
      $date = strtotime($onevideo[0]->date_created);
      $data = array(
        'judul_halaman' => 'Neon - Video : ' . $onevideo[0]->judulVideo,
        'judul_header' =>  $onevideo[0]->judulVideo,
        'judul_video' => $onevideo[0]->judulVideo,
        'deskripsi' => $onevideo[0]->deskripsi,
        'file' => $judul,
        'nama_penulis' => $penulis['namaDepan'] . " " . $penulis['namaBelakang'],
        'biografi' => $penulis['biografi'],
        'photo' => $penulis['photo'],
        'nama_sub' => $namasub,
        'jumlah_comment'=>count($this->mkomen->get_komen_byvideo($idvideo)),
        'tanggal'=>date("d", $date),
        'bulan'=>date("M", $date),
        'avatar'=>base_url('assets/image/photo/guru/').$penulis['photo'],
        );
      $subid = $onevideo[0]->subBabID;
            //ambil list semua video yang memiliki sub id yang sama
      $data['videobysub'] = $this->load->mvideos->get_video_by_sub($subid);
      $data['video_by_bab'] = $this->mvideos->get_all_video_by_bab($idbab);

      $data['comments'] = $this->mkomen->get_komen_byvideo($idvideo);

      $data['files'] = array(
        APPPATH . 'modules/komenback/views/v-single-video-komen.php',
        );

      if ($this->session->userdata('HAKAKSES')=='admin') {
        $this->parser->parse('admin/v-index-admin', $data);
        # code...
      } else {
        $this->parser->parse('templating/index-b-guru', $data);
        # code...
      }
      

    }
  }

}
?>