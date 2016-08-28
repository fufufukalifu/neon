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
    public function videosub($id_sub_bab, $id_video='1') {
        $data['subBab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab );
        $data['judul_sub_bab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab );

        if ( $data['judul_sub_bab']==array() ) {
            //kalo yang diklik belum punya video
            $data['title'] = "Maaf sub-bab yang anda pilih, belum memiliki video! :( ";
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'v-banner-videoBelajar', $data );
            $this->load->view( 'templating/t-footer' );
        }else {
            //kalo yang diklik sudah punya video
            $data['judul_sub_bab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab )[0];
            $data['title'] = $data['judul_sub_bab']->judulSubBab;
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'v-banner-videoBelajar', $data );
            $this->load->view( 'v-single-video', $data );
            $this->load->view( 'templating/t-footer' );
        }
        //$data['title'] = $data['judul_sub_bab']->judulSubBab;
    }

    //halaman tampilkan semua video dalam 1 subab
    public function videobysub( $bab_id ) {
        //tampilkan seluruh video yang diklik bab
        $data['judulbab'] = $this->load->Mvideos->get_sub_bab( $bab_id );
        $data['title'] = $this->load->Mvideos->get_sub_bab( $bab_id )[0]->judulSubBab;

        if ( isset( $data['title'] ) ) {
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser', $data );
            $this->load->view( 'v-banner-videoBelajar' );
            $this->load->view( 'v-container-all-videos' );
            $this->load->view( 'templating/t-footer' );
        }else {
            echo "masuk ke else";
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

    public function seevideo($subid, $idvideo){
        $data['subBab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab );
        $data['judul_sub_bab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab );

        if ( $data['judul_sub_bab']==array() ) {
            $data['title'] = $this->pesan_error;
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'v-banner-videoBelajar', $data );
            $this->load->view( 'templating/t-footer' );
        }else {
            $data['judul_sub_bab'] = $this->load->Mvideos->get_all_subab( $id_sub_bab )[0];
            $data['title'] = $data['judul_sub_bab']->judulSubBab;
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'v-banner-videoBelajar', $data );
            $this->load->view( 'v-single-video', $data );
            $this->load->view( 'templating/t-footer' );
        }
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
