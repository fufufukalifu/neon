<?php

/**
 *
 */
class Admin extends MX_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('video/mvideos');
        
        }

    public function index() {
        echo "masuk admin";
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'v-left-bar-admin' );
    }

    function daftarvideo() {
        $data['videos'] = $this->mvideos->get_all_videos_admin();
       $this->load->view( 'templating/t-header' );

        $this->load->view( 'v-left-bar-admin' );
        $this->load->view('v-daftar-video',$data);
    }

    function semuavideo(){
      $data['views']=$this->loadcontainer();
        $this->load->view( 'v-index-admin',$data );
    }
    function loadcontainer(){
        return $this->load->view( 'v-container');
    }
}
?>
