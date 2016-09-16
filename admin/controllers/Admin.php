<?php

/**
 *
 */
class Admin extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('video/mvideos');
        $this->load->model('matapelajaran/mmatapelajaran');
        $this->load->library('parser');
    }

    public function index() {
        $this->load->view('templating/t-header');
        $this->load->view('v-left-bar-admin');
    }

    function daftarvideo() {
        $data['videos'] = $this->mvideos->get_all_videos_admin();
        $this->load->view('templating/t-header');

        $this->load->view('v-left-bar-admin');
        $this->load->view('v-daftar-video', $data);
    }

    function cobatemplating() {
        $data = array(
            'judul_halaman' => 'Dashboard Admin'
        );
        $data['file'] = 'v-container.php';

        $this->parser->parse('v-index-admin', $data);
    }

    function loadcontainer() {
        return $this->load->view('v-container');
    }

    function daftarmatapelajaran() {
        $data = array(
            'judul_halaman' => 'Mata Pelajaran'
        );

        $data['mapels'] = $this->mmatapelajaran->daftarMapel();
        $data['file'] = 'v-daftar-mapel.php';

        $this->parser->parse('v-index-admin', $data);
    }

    function showIcon() {
        $this->load->view('templating/t-header');
        $this->load->view('templating/t-icon');
    }

    function tambahMP() {
        $data['namaMataPelajaran'] = htmlspecialchars($this->input->post('namaMP'));
        $data['aliasMataPelajaran'] = htmlspecialchars($this->input->post('aliasMP'));
        $this->mmatapelajaran->tambahMP($data);
        redirect(base_url('index.php/admin/daftarmatapelajaran'));
    }

    function hapusMP() {
        $id = $this->input->post('idMP');
        $this->mmatapelajaran->hapusMP($id);
        redirect(base_url('index.php/admin/daftarmatapelajaran'));
    }

    function rubahMP() {
        $id = $this->input->post('idMP');
        $data['namaMataPelajaran'] = htmlspecialchars($this->input->post('namaMP'));
        $data['aliasMataPelajaran'] = htmlspecialchars($this->input->post('aliasMP'));
        $this->mmatapelajaran->rubahMP($id,$data);
        redirect(base_url('index.php/admin/daftarmatapelajaran'));
    }

}

?>
