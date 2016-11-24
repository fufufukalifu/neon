<?php

/**
 *
 */
class Guru extends MX_Controller {
    private $idGuru;

    public function __construct() {
        $this->load->helper( 'session' );
        parent::__construct();
        $this->load->model( 'mguru' );
        $this->load->model( 'video/mvideos' );
        $this->load->model( 'komen/mkomen' );
        $this->load->model( 'register/mregister' );
        $this->load->model('templating/mtemplating');
        $this->load->model('siswa/msiswa');
        $this->load->library('parser');
        //cek kalo bukan guru lemparin.
        if ($this->session->userdata('loggedin')==true) {
            if ($this->session->userdata('HAKAKSES')=='siswa'){
             // redirect('welcome');
            }else if($this->session->userdata('HAKAKSES')=='guru'){
             // redirect('guru/dashboard');
            }else{
            // redirect('login');
            }
        }

    }

    //set get untuk session
    public function setGuruId() {
        $this->idGuru = $this->session->userdata['id_guru'];
    }

    public function getGuruId() {
        return $this->idGuru;
    }
    // function untuk menampikan halam pertama saat registrasi
    function index() {

    }

    public function checkJumlahPostingan() {

    }

    public function videobyteacher() {
        $this->setGuruId();
        $guru_id = $this->getGuruId();
        $data['videos_uploaded'] = $this->load->mvideos->get_video_by_teacher( $guru_id );
        //var_dump($data);
        //untuk mengambil data guru
        $data['data_guru'] = $this->load->mguru->get_single_guru( $guru_id )[0];
        //untuk menghitung berapa banyak video yang sudah diupload
        $data['jumlah_video'] = count( $this->load->mvideos->get_video_by_teacher( $guru_id ) );
       // var_dump($data);
        return $data;
    }

    public function dashboard() {

        $data = $this->videobyteacher();
        #Sesudah Tempalting#

        $data['judul_halaman'] = "Dashboard";
        $data['files'] = array(
            APPPATH . 'modules/guru/views/v-container-video.php',
            );
         #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses=='admin') {
         // jika admin
           $this->parser->parse('admin/v-index-admin', $data);
       } elseif($hakAkses=='guru'){
         // jika guru
         $this->parser->parse('templating/index-b-guru', $data);
     }else{
        // jika siswa redirect ke welcome
        redirect(site_url('login'));
    }
          #END Cek USer#
}

    //menampilkan video manager untuk user
public function videomanager() {
    redirect( '/videoback' );
}

    //halaman untuk mengupload  video
public function uploadvideo() {
    redirect( '/videoback' );
}


    //untuk merubah data guru.
public function setting() {
    $this->load->view( 'templating/t-header' );
    $this->load->view( 'vProfileGuru' );
    $this->load->view( 'templating/t-footer' );
}
    //untuk menampilkan form updt guru
public function pengaturanProfileguru() {
    $data['mataPelajaran'] = $this->mregister->get_matapelajaran();
    $data['guru'] = $this->mguru->get_datguru();
    $data['eMail']=$this->session->userdata['eMail'];
    $data['files'] = array(
        APPPATH . 'modules/guru/views/vPengaturanProfileGuru.php',
        );
    $data['judul_halaman'] = "Pengaturan Profile Guru";
    $this->parser->parse('templating/index-b-guru', $data);
}

public function ubahprofileguru() {

        //load library n helper
    $this->load->helper( array( 'form', 'url' ) );
    $this->load->library( 'form_validation' );


        //syarat pengisian form perubahan profile
    $this->form_validation->set_rules( 'namadepan', 'Nama Depan', 'required' );
    $this->form_validation->set_rules( 'alamat', 'Alamat', 'required' );
    $this->form_validation->set_rules( 'nokontak', 'No Kontak', 'required' );
    ;

        //pesan error atau pesan kesalahan pengisian form
    $this->form_validation->set_message( 'is_unique', '*Nama Pengguna sudah terpakai' );
    $this->form_validation->set_message( 'max_length', '*Nama Pengguna maksimal 12 karakter!' );
    $this->form_validation->set_message( 'min_length', '*Nama Pengguna minimal 5 karakter!' );
    $this->form_validation->set_message( 'required', '*tidak boleh kosong!' );


        //pengecekan inputan / pengisian form
    if ( $this->form_validation->run() == FALSE ) {
        $this->pengaturanProfileguru();
    } else {
        $namaDepan = htmlspecialchars( $this->input->post( 'namadepan' ) );
        $namaBelakang = htmlspecialchars( $this->input->post( 'namabelakang' ) );
        $mataPelajaranID = htmlspecialchars($this->input->post('mataPelajaran'));
        $alamat = htmlspecialchars( $this->input->post( 'alamat' ) );
        $noKontak = htmlspecialchars( $this->input->post( 'nokontak' ) );
        $biografi = htmlspecialchars( $this->input->post( 'biografi' ) );


        $data_post = array(
            'namaDepan' => $namaDepan,
            'namaBelakang' => $namaBelakang,
            'mataPelajaranID' =>$mataPelajaranID,
            'alamat' => $alamat,
            'noKontak' => $noKontak,
            'biografi' => $biografi,
            );

        $this->mguru->update_guru( $data_post );
    }
}

public function ubahakunguru() {

        //load library n helper
    $this->load->helper( array( 'form', 'url' ) );
    $this->load->library( 'form_validation' );


        //load library n helper
    $this->load->helper( array( 'form', 'url' ) );
    $this->load->library( 'form_validation' );

        //syarat pengisian form perubahan nama pengguna dan email
    $this->form_validation->set_rules( 'namapengguna', 'Nama Pengguna', 'trim|required|min_length[5]|max_length[12]|is_unique[tb_pengguna.namaPengguna]' );
    $this->form_validation->set_rules( 'email', 'Email', 'required|is_unique[tb_pengguna.email]' );

        //pesan error atau pesan kesalahan pengisian form
    $this->form_validation->set_message( 'is_unique', 'email', '*Email sudah terpakai' );
    $this->form_validation->set_message( 'is_unique', '*Nama Pengguna sudah terpakai' );
    $this->form_validation->set_message( 'max_length', '*Nama Pengguna maksimal 12 karakter!' );
    $this->form_validation->set_message( 'min_length', '*Nama Pengguna minimal 5 karakter!' );
    $this->form_validation->set_message( 'required', '*tidak boleh kosong!' );


    if ( $this->form_validation->run() == FALSE ) {
        $data['mataPelajaran'] = $this->mregister->get_matapelajaran();
        $data['guru'] = $this->mguru->get_datguru();
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'vPengaturanProfileGuru',$data );
        $this->load->view( 'templating/t-footer' );
    } else {
        $namaPengguna = htmlspecialchars( $this->input->post( 'namapengguna' ) );
        $email = htmlspecialchars( $this->input->post( 'email' ) );
        $data_post = array(
            'namaPengguna' => $namaPengguna,
            'email' => $email,
            );
        $this->mguru->update_akun( $data_post );
    }
}

public function ubahkatasandi() {

        //load library n helper
    $this->load->helper( array( 'form', 'url' ) );
    $this->load->library( 'form_validation' );


        //syarat pengisian form perubahan pasword
    $this->form_validation->set_rules( 'sandilama', 'Kata Sandi Lama', 'required' );
    $this->form_validation->set_rules( 'newpass', 'Kata Sandi Baru', 'required|matches[verifypass]' );
    $this->form_validation->set_rules( 'verifypass', 'Password Confirmation', 'required' );

        //pesan error atau pesan kesalahan pengisian form
    $this->form_validation->set_message( 'required', '*tidak boleh kosong!' );
    $this->form_validation->set_message( 'matches', '*Kata Sandi tidak sama!' );


    if ( $this->form_validation->run() == FALSE ) {
     $data['mataPelajaran'] = $this->mregister->get_matapelajaran();
     $data['guru'] = $this->mguru->get_datguru();
     $this->load->view( 'templating/t-header' );
     $this->load->view( 'vPengaturanProfileGuru',$data );
     $this->load->view( 'templating/t-footer' );
 } else {
    $kataSandi = htmlspecialchars( md5( $this->input->post( 'newpass' ) ) );

    $data_post = array(
        'kataSandi' => $kataSandi,
        );
    $this->mguru->update_katasandi( $data_post );
}
}

public function upload($oldphoto) {
    unlink( FCPATH . "./assets/image/photo/guru/".$oldphoto );
    $config['upload_path'] = './assets/image/photo/guru';
    $config['allowed_types'] = 'jpeg|gif|jpg|png';
    $config['max_size'] = 100;
    $config['max_width'] = 1024;
    $config['max_height'] = 768;
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('photo')) {


        $data['error'] = array('error' => $this->upload->display_errors());
        var_dump($data['error'])  ;
            // $data['mataPelajaran'] = $this->mregister->get_matapelajaran();
            // $data['guru'] = $this->mguru->get_datguru();
            // $data['files'] = array(
            // APPPATH . 'modules/guru/views/vPengaturanProfileGuru.php');
            // $data['judul_halaman'] = "Pengaturan Profile Guru";
            //  $this->parser->parse('templating/index-b-guru', $data);

    } else {
        $file_data = $this->upload->data();
        $photo = $file_data['file_name'];
        $this->mguru->update_photo($photo);
    }
}

    // ubah email guru
public function ubahemailGuru() {

        //load library n helper
  $this->load->helper( array( 'form', 'url' ) );
  $this->load->library( 'form_validation' );


        //load library n helper
  $this->load->helper( array( 'form', 'url' ) );
  $this->load->library( 'form_validation' );

        //syarat pengisian form perubahan nama pengguna dan email

  $this->form_validation->set_rules( 'email', 'email', 'required|is_unique[tb_pengguna.eMail]' );

        //pesan error atau pesan kesalahan pengisian form
  $this->form_validation->set_message( 'is_unique', '*Email sudah terpakai' );
  $this->form_validation->set_message( 'required', '*tidak boleh kosong!' );


  if ( $this->form_validation->run() == FALSE ) {
      $this->pengaturanProfileguru();
  } else {
    $email = htmlspecialchars( $this->input->post( 'email' ) );

    $data_post = array(
      'eMail' => $email,
      );
    $this->msiswa->update_email( $data_post );
    redirect(site_url('guru/dashboard'));
}

}


## Menampilkan daftar guru
public function daftar(){
    $data['mataPelajaran'] = $this->mregister->get_matapelajaran();
    $data['judul_halaman'] = "Daftar Guru";
    $data['files'] = array(
        APPPATH . 'modules/register/views/v-daftar-guru.php',
        );
            // jika admin
    $this->parser->parse('admin/v-index-admin', $data);
}

## ajax menampilkan data guru
function ajax_list_guru(){
    $list  = $this->mguru->get_teacher_user();


    $data = array();
    $no = 0;
    foreach ($list as $teacheritem) {
        $row = array();
        $no++;
        $kelas = "btn btn-sm btn-primary detail-".$teacheritem['guruID'];
        $row[] = $no;
        $row[] = $teacheritem['namaDepan']." ".$teacheritem['namaBelakang'];
        $row[] = $teacheritem['namaPengguna'];
        $row[] = $teacheritem['regTime'];
        $row[] = '<a href=""  title="Mail To" onclick="edit_teacher('."'".$teacheritem['guruID']."'".')">'.$teacheritem['eMail'].'<i class="ico-mail-send"></i></a>';

        $row[] = '<a class="btn btn-sm btn-warning"  title="Edit" onclick="edit_teacher('."'".$teacheritem['guruID']."'".')"><i class="ico-edit"></i></a>

        <a class='."'".$kelas."'".' data-todo='."'".json_encode($teacheritem)."'".' title="Detail" onclick="detail_teacher('."'".$teacheritem['guruID']."'".')"><i class="ico-file5"></i></a>

        <a class="btn btn-sm btn-danger"  title="Hapus" onclick="delete_teacher('."'".$teacheritem['guruID']."'".','."'".$teacheritem['penggunaID']."'".')"><i class="ico-remove"></i></a>';
        $data[] = $row;
    }
    $output = array("data"=>$data);
    echo json_encode($output);
}


function drop_teacher($id_guru,$id_pengguna){
    $this->mguru->drop_guru( $id_guru,$id_pengguna );
}

function get_avatar_guru(){
    $avatar = $this->mguru->get_avatar();
    $photo =  base_url()."assets/image/photo/guru/".$avatar;
    echo "<img src=".$photo." class='img-circle' alt='' />";
}

}
?>
