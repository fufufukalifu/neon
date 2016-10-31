<?php

class Video extends MX_Controller {
    private $pesan_error="Oops..maaf sepertinya halaman masih kosong<br><br><br><br>";

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model( 'Mvideos' );
        $this->load->model( 'guru/mguru' );
        $this->load->model( 'komen/mkomen' );
        $this->load->library( 'parser' );
    }

    //########## FRONT END  ####################



    public function index() {
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'templating/t-navbarUser' );
        $this->load->view( 'templating/t-title-site' );
        $this->load->view( 'templating/t-footer' );
    }

    //halaman tampilkan sub bab dan see
    public function videosub( $id_sub_bab, $id_video ) {
        //digunakan untuk semua video
        $data['subBab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab );
        //digunakan untuk judul subab
        $data['judul_sub_bab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab );
        if ( !isset( $id_video ) ) {
            //tidak ada id video
            
            if ( $data['judul_sub_bab']==array() ) {
                //kalo yang diklik belum punya video

                $data['title'] = "Maaf sub-bab yang anda pilih, belum memiliki video! :( ";
                $this->load->view( 'templating/t-header' );
                $this->load->view( 'templating/t-navbarUser' );
                $this->load->view( 'v-banner-videoBelajar', $data );
                $this->load->view( 'templating/t-footer' );
            }else {
                //kalo yang diklik sudah punya video

                //digunakan untuk mengambil array index0, jadi pada saat klik sub diambil video yang urutan pertama untuk ditampilkan
                $data['judul_sub_bab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab )[0];
                $data['title'] = $data['judul_sub_bab']->judulSubBab;
                $this->load->view( 'templating/t-header' );
                $this->load->view( 'templating/t-navbarUser' );
                $this->load->view( 'v-banner-videoBelajar', $data );
                $this->load->view( 'v-single-video', $data );
                $this->load->view( 'templating/t-footer' );
            }
            //$data['title'] = $data['judul_sub_bab']->judulSubBab;
        }else {
            //ada id video
            echo "string2";
        }
    }

    //halaman tampilkan semua video dalam 1 subab
    public function videobysub( $sub_bab_id ) {
        //tampilkan seluruh video yang diklik bab
        $data['judulbab'] = $this->load->Mvideos->get_video_by_sub( $sub_bab_id );

        if ( $data['judulbab']==array() ) {
            $data['title'] = "Maaf sub-bab yang anda pilih, belum memiliki video! :( ";
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser', $data );
            $this->load->view( 'v-banner-videoBelajar' );
            $this->load->view( 'templating/t-footer' );
        }else {
            $judul_halaman = $this->load->Mvideos->get_video_by_sub( $sub_bab_id )[0]->judulSubBab;
            $babId = $data['judulbab'][0]->babID;
            
            $data = array(
                'judul_halaman' => 'Neon - Sub : '.$judul_halaman,
                'judul_header' => $judul_halaman
            );

            //get subab bab
            //$data['materisubab'] = $this->load->Mvideos->get_sub_by_babid( $babId );
            $data['semuavideo'] = $this->load->Mvideos->get_video_by_sub($sub_bab_id);
            $data['files'] = array(
                APPPATH.'modules/homepage/views/v-header.php',
                APPPATH.'modules/templating/views/t-f-pagetitle.php',
                APPPATH.'modules/video/views/v-container-all-videos.php',
                APPPATH.'modules/templating/views/footer.php'
            );
            $this->parser->parse( 'templating/index', $data );
        }
    }

    //menampilkan materi dari suatu tingkat, IPA untuk SMA, IPS untuk SMA dst.
    public function daftarvideo( $alias_pelajaran = "", $alias_tingkat = "" ) {
        
        //tampilkan bab dan subab video
        $data['aliastingkat'] = $alias_tingkat;
        $data['aliaspelajaran'] = $alias_pelajaran;
        $data['title'] = "Pelajaran ".$data['aliaspelajaran']." untuk tingkat ".$data['aliastingkat'];
        //data untuk templating
        $data = array(
            'judul_halaman' => 'Neon - Video Pelajaran '. $data['aliaspelajaran'],
            'judul_header' => $data['title'],
            'mapel' => $alias_pelajaran
        );

        //
        $data['bab_video'] = $this->load->Mvideos->get_video_as_bab( $alias_tingkat, $alias_pelajaran );
        $data['files'] = array(
            APPPATH.'modules/homepage/views/v-header.php',
            APPPATH.'modules/templating/views/t-f-pagetitle.php',
            APPPATH.'modules/video/views/f-daftar-video.php',
            APPPATH.'modules/templating/views/footer.php'
        );

         $this->parser->parse( 'templating/index', $data );
      

    }

    public function seevideo( $idvideo ) {
        //data untuk templating
        $data['videosingle'] = $this->load->Mvideos->get_single_video( $idvideo );
        if ( $data['videosingle']==array() ) {
            $data['title'] = "Video yang anda pilih tidak ada, mohon kirimi kami laporan";
            // $this->load->view( 'templating/t-header' );
            // $this->load->view( 'templating/t-navbarUser' );
            // $this->load->view( 'v-banner-videoBelajar', $data );
            // $this->load->view( 'templating/t-footer' );
        }else {
            //ambil satu video bedasarkan idnya



            $data['videosingle'] = $this->load->Mvideos->get_single_video( $idvideo );
            $onevideo = $data['videosingle'];
            $guruID = $onevideo[0]->guruID;
            $penulis = $this->load->mguru->get_penulis( $guruID )[0];
            $data = array(
                'judul_halaman' => 'Neon - Video : '.$onevideo[0]->judulVideo,
                'judul_header' => 'Video berjudul '.$onevideo[0]->judulVideo,
                'judul_video' => $onevideo[0]->judulVideo,
                'deskripsi'=> $onevideo[0]->deskripsi,
                'file' => $onevideo[0]->namaFile,
                'nama_penulis'=> $penulis['namaDepan']." ".$penulis['namaBelakang'],
                'biografi'=> $penulis['biografi'],
                'photo'=>$penulis['photo']

            );
            $subid = $onevideo[0]->subBabID;
            //ambil list semua video yang memiliki sub id yang sama
            $data['videobysub'] = $this->load->Mvideos->get_video_by_sub( $subid );
            $data['files'] = array(
                APPPATH.'modules/homepage/views/v-header.php',
                APPPATH.'modules/templating/views/t-f-pagetitle.php',
                APPPATH.'modules/video/views/f-single-video.php',
                APPPATH.'modules/templating/views/footer.php'
            );

            //ambil index 0 yang akan dijadikan judul di title
            // $onevideo = $data['videosingle'];
            // $data['video'] = $onevideo[0];
            // $data['title'] = $onevideo[0]->judulVideo;
            // $data['idvideo']=$onevideo[0]->id;
            // $data['videoData'] = $this->load->Mvideos->get_matapelajaran( $idvideo )[0];

            // //get id guru
            // $guruID = $onevideo[0]->guruID;
            // //ambil data guru yang membuat video
            //

            // //ambil komen berdasarkan id video
            // $data['komen']=$this->load->mkomen->get_komen_byvideo( $idvideo );

            //$this->loadparse($data);
            $this->parser->parse( 'templating/index', $data );
            // $this->load->view( 'templating/t-header' );
            // $this->load->view( 'templating/t-navbarUser' );
            // $this->load->view( 'v-banner-videoBelajar', $data );
            // $this->load->view( 'v-single-video', $data );
            // $this->load->view( 'templating/t-footer' );
        }
    }

    function watchvideo( $id_video ) {

    }

    //########## FRONT END  ####################

    //----------# BACK END  #----------#

    public function uploadvideo() {
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'templating/t-navbar' );
        $this->load->view( 'v-b-form-upload-video' );
        $this->load->view( 'templating/t-footer' );
    }

    public function dropvideo( $idVideo ) {
        $idGuru = $this->session->userdata['id_guru'];
        $this->load->Mvideos->deleteVideo( $idVideo, $idGuru );
        $videoHapus=$this->load->Mvideos->get_single_video( $idVideo )[0]->namaFile;
        unlink( FCPATH . "assets\uploaded\\".$videoHapus );
        redirect( base_url( 'index.php/videoback/managervideo' ) );

    }

    public function comment() {
        $isiKomen=htmlspecialchars( $this->input->post( 'comment' ) );
        $idvideo=htmlspecialchars( $this->input->post( 'idvideo' ) );
        $userID=$this->session->userdata['id'];

        $dataKomen=array(

            'isiKomen'=>$isiKomen,
            'videoID'=>$idvideo,
            'userID'=> $userID,

        );
        $this->Mvideos->insertComment( $dataKomen );
    }

    //----------# BACK END  #----------#


}

?>
