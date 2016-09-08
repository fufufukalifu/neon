<?php

/**
 *
 */
class videoBack extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MvideoBack');
        $this->load->library('table');
        $this->load->model('video/mvideos');
        $this->load->model('guru/mguru');
    }

    function get_video_manager() {
        $guru_id = $this->session->userdata['id_guru'];
        $data['videos_uploaded'] = $this->load->mvideos->get_video_by_teacher($guru_id);
        //untuk mengambil data guru
        //untuk menghitung berapa banyak video yang sudah diupload
        $data['jumlah_video'] = count($this->load->mvideos->get_video_by_teacher($guru_id));
        return $data;
    }

    public function index() {
        $this->load->view('templating/t-header');
        $this->load->view('guru/v-left-bar');
        $this->load->view('v-upload-video-form');
        $this->load->view('templating/t-footer-back');
    }

    //menampilkan view form upload
    public function formupvideo() {
        $this->load->view('templating/t-header');
        $this->load->view('guru/v-left-bar');
        $this->load->view('v-upload-video-form');
        $this->load->view('templating/t-footer-back');
    }

    public function managervideo() {
        $this->load->view('templating/t-header');
        $this->load->view('guru/v-left-bar');
        $this->load->view('v-video-manager', $this->get_video_manager());
        $this->load->view('templating/t-footer-back' );
    }

    // fungsi untuk upload video
    public function upvideo() {
        echo "masuk upvideokkkkk"; //for testing
        $config['upload_path'] = './assets/video';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv|mp4';
        $config['max_size'] = 90000;
        $this->load->library('upload', $config);
        //do_opload(name input)
        var_dump($this->upload->do_upload('video'));
        if (!$this->upload->do_upload('video')) {
            echo "gagal";
            $error = array('error' => $this->upload->display_errors());
        } else {
            $file_data = $this->upload->data();
            $video = $file_data['file_name'];

            //data post dari form upload video
            $judulVideo = htmlspecialchars($this->input->post('judulvideo'));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            //data yg akan di masukan ke tabel video
            $data_video = array(
                'judulVideo' => $judulVideo,
                'namaFile' => $video,
                'deskripsi' => $deskripsi,
            );
            var_dump($data_video);
            $this->MvideoBack->insertVideo($data_video);
        }
    }

}

?>
