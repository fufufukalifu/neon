<?php
/**
 *
 */
class videoBack extends MX_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model( 'MvideoBack' );
        $this->load->library( 'table' );
    }

    public function index() {

    }

    //menampilkan view form upload
    public function formupvideo() {
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'guru/v-left-bar' );
        $this->load->view( 'v-upload-video-form' );
        $this->load->view( 'templating/t-footer-back' );
    }

    public function managervideo() {
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'guru/v-left-bar' );
        $this->load->view( 'v-video-manager');
        $this->load->view( 'templating/t-footer-back' );
    }

    // fungsi untuk upload video
    public function upvideo() {
        echo "masuk upvideokkkkk";//for testing
        $config['upload_path']          = './video/';
        $config['allowed_types']        = 'jpeg|gif|jpg|png|mkv|mp4';
        $config['max_size']             = 90000;
        $this->load->library( 'upload', $config );

        if ( !$this->upload->do_upload( 'userfile' ) ) {
            echo "gagal";
            $error = array( 'error'=>$this->upload->display_errors() );
            $this->load->view( 'beranda/main_view', $error );
        } else {
            $file_data = $this->upload->data();
            $data['img'] = base_url().'/images/'.$file_data['file_name'];
            $this->load->view( 'beranda/success_msg', $data );
        }
    }
}
?>
