<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Mmatapelajaran');
    }

    public function index() {
        $data['pelajaran_sma'] = $this->load->Mmatapelajaran->get_pelajaran_sma();
        $data['pelajaran_smk'] = $this->load->Mmatapelajaran->get_pelajaran_smk();
        $data['pelajaran_smp'] = $this->load->Mmatapelajaran->get_pelajaran_smp();
        $data['pelajaran_sd'] = $this->load->Mmatapelajaran->get_pelajaran_sd();
var_dump($sess_array);

        $this->load->view('templating/t-sessionKonfirm');
        $this->load->view('templating/t-sessionSiswa');
        $this->load->view('templating/t-header');
        $this->load->view('templating/t-navbarUser');
        $this->load->view('v-welcome', $data);
        $this->load->view('templating/t-footer');
    }

}
