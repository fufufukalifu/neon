<?php

class Video extends MX_Controller {
    private $pesan_error="Oops..maaf sepertinya halaman masih kosong<br><br><br><br>";

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model( 'Mvideos' );
    }

    //########## FRONT END  ####################

    public function index() {
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'templating/t-navbarUser' );
        $this->load->view( 'templating/t-title-site' );
        $this->load->view( 'templating/t-footer' );
    }

    //halaman tampilkan sub bab dan video
    public function videosub( $id_sub_bab, $id_video=null ) {
        //digunakan untuk semua video
        $data['subBab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab );
        //digunakan untuk judul subab
        $data['judul_sub_bab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab );
        if ( !isset( $id_video ) ) {
            //tidak ada id video
            echo "string";
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
            $data['title'] = $this->load->Mvideos->get_video_by_sub( $sub_bab_id )[0]->judulSubBab;
            $babId = $data['judulbab'][0]->babID;
            $data['materisubab'] = $this->load->Mvideos->get_sub_by_babid( $babId );
            print_r( $data['materisubab'] );
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser', $data );
            $this->load->view( 'v-banner-videoBelajar' );
            $this->load->view( 'v-container-all-videos' );
            $this->load->view( 'templating/t-footer' );
        }
    }

    //menampilkan materi dari suatu tingkat, IPA untuk SMA, IPS untuk SMA dst.
    public function daftarvideo( $alias_pelajaran = "", $alias_tingkat = "" ) {
        //tampilkan bab dan subab video
        $data['bab_video'] = $this->load->Mvideos->get_video_as_bab( $alias_tingkat, $alias_pelajaran );
        $data['aliastingkat'] = $alias_tingkat;
        $data['aliaspelajaran'] = $alias_pelajaran;
        $data['title'] = "Pelajaran ".$data['aliaspelajaran']." untuk tingkat ".$data['aliastingkat'];

        $this->load->view( 'templating/t-header' );
        $this->load->view( 'templating/t-navbarUser' );
        $this->load->view( 'v-banner-videoBelajar', $data );
        $this->load->view( 'v-video-list' );

        $this->load->view( 'templating/t-footer' );
    }

    public function seevideo( $idvideo ) {
        $data['videosingle'] = $this->load->Mvideos->get_single_video( $idvideo );

        if ( $data['videosingle']==array() ) {
            $data['title'] = "Video yang anda pilih tidak ada, mohon kirimi kami laporan";
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'v-banner-videoBelajar', $data );
            $this->load->view( 'templating/t-footer' );
        }else {
            //ambil satu video bedasarkan idnya
            $data['videosingle'] = $this->load->Mvideos->get_single_video( $idvideo );

            //ambil index 0 yang akan dijadikan judul di title
            $onevideo = $data['videosingle'];
            $data['video'] = $onevideo[0];

            $data['title'] = $onevideo[0]->judulVideo;
            $subid = $onevideo[0]->subBabID;
            //ambil list semua video yang memiliki sub id yang sama
            $data['videobysub'] = $this->load->Mvideos->get_video_by_sub( $subid );

            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'v-banner-videoBelajar', $data );
            $this->load->view( 'v-single-video', $data );
            $this->load->view( 'templating/t-footer' );
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

    //----------# BACK END  #----------#
}

?>
