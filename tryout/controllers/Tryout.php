<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Tryout extends MX_Controller {

    public function __construct() {
        $this->load->library('parser');
        $this->load->model('Tryout_model');
        parent::__construct();
    }

    public function ajax_get_paket($id_tryout) {
        $data = $this->Tryout_model->get_paket_by_id_to($id_tryout);

        $output = array('data' => $data);
        echo json_encode($output);
    }

    public function ajax_get_tryout() {
        $datas['id_siswa'] = $this->Tryout_model->get_id_siswa();
        $datas['tryout'] = $this->Tryout_model->get_tryout_akses($datas);
        $list = $datas['tryout'];
        $data = array();
        //mengamb
    }

    public function ajax_get_tryout_single($id_tryout) {
        $datas['id_tryout'] = $id_tryout;
        $datas['tryout'] = $this->Tryout_model->get_tryout_by_id($datas);
        $list = $datas['tryout'];
        $data = array();
        //mengambil nilai list
        $baseurl = base_url();
        foreach ($list as $tryout_item) {
            
        }

        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }

    //# fungsi indeks
    public function index() {

        $data = array(
            'judul_halaman' => 'Neon - Tryout',
            'judul_header' => 'Daftar Tryout',
            'judul_tingkat' => '',
        );
        $konten = 'modules/tryout/views/v-daftar-to.php';
        $data['files'] = array(
            APPPATH . 'modules/homepage/views/v-header-login.php',
            APPPATH . 'modules/templating/views/t-f-pagetitle.php',
            APPPATH . $konten,
            APPPATH . 'modules/homepage/views/v-footer.php',
        );

        $datas['id_siswa'] = $this->Tryout_model->get_id_siswa();
        $data['tryout'] = $this->Tryout_model->get_tryout_akses($datas);
        $this->parser->parse('templating/index', $data);
    }

    public function create_seassoin_idto($id_to) {
        $this->session->set_userdata('id_tryout', $id_to);
        redirect("tryout/daftarpaket");
    }

    public function create_session($id_paket) {
        //$this->session->userdata('id_paket',$id_paket);
    }

    public function daftarpaket() {
        $data['id_to'] = $this->session->userdata('id_tryout');
        $id_to = $data['id_to'];
        if (!isset($id_to['id_to'])) {
            $data = array(
                'judul_halaman' => 'Neon - Daftar Paket',
                'judul_header' => 'Daftar Paket',
                'judul_tingkat' => '',
            );
            $konten = 'modules/tryout/views/v-daftar-paket.php';
            $data['files'] = array(
                APPPATH . 'modules/homepage/views/v-header-login.php',
                APPPATH . 'modules/templating/views/t-f-pagetitle.php',
                APPPATH . $konten,
                APPPATH . 'modules/homepage/views/v-footer.php',
            );
            $data['paket'] = $this->Tryout_model->get_paket_by_id_to($id_to);
            $this->parser->parse('templating/index', $data);
        } else {
            //kalo gak ada session
            redirect('tryout');
        }
    }

    //# fungsi indeks
    function buatto() {
        $data = array("id_paket" => $this->input->post('id_paket'),
            "id_tryout" => $this->input->post('id_tryout'),
            "id_mm-tryoutpaket" => $this->input->post('id_mm_tryoutpaket'),
        );
        $this->session->set_userdata('id_paket', $data['id_paket']);
        $this->session->set_userdata('id_tryout', $data['id_tryout']);
        $this->session->set_userdata('id_mm-tryoutpaket', $data['id_mm-tryoutpaket']);
        $insert = array("id_pengguna" => $this->session->userdata('id'),
            "id_mm-tryout-paket" => $this->session->userdata('id_mm-tryoutpaket'),
            "status_pengerjaan" => '2'
        );

        $this->Tryout_model->insert_report_sementara($insert);
    }

    function test2() {
        var_dump($this->session->userdata());
    }

}

?>