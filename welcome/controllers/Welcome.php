<?php

defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Welcome extends MX_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *   http://example.com/index.php/welcome
     *  - or -
     *   http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model( 'Mmatapelajaran' );
        $this->load->model( 'tingkat/MTingkat' );

        $this->load->library( 'parser' );
                if ($this->session->userdata('loggedin')==true) {
            if ($this->session->userdata('HAKAKSES')=='siswa'){
               // redirect('welcome');
            }else if($this->session->userdata('HAKAKSES')=='guru'){
               redirect('guru/dashboard');
            }else{

            }
    }

    }

    public function index() {
        $data = array(
            'judul_halaman' => 'Neon - Welcome',
            'judul_header' =>'Welcome'
        );

        $data['files'] = array( 
            APPPATH.'modules/homepage/views/v-header-login.php',
            APPPATH.'modules/templating/views/t-f-pagetitle.php',
            APPPATH.'modules/welcome/views/v-welcome.php',
            APPPATH.'modules/welcome/views/v-tampil-tes.php',
            APPPATH.'modules/homepage/views/v-footer.php',
        );
        $data['tingkat'] = $this->load->MTingkat->gettingkat();
        // print_r($data['tingkat']);
        $data['pelajaran_sma'] = $this->load->Mmatapelajaran->get_pelajaran_sma();
        $data['pelajaran_smk'] = $this->load->Mmatapelajaran->get_pelajaran_smk();
        $data['pelajaran_smp'] = $this->load->Mmatapelajaran->get_pelajaran_smp();
        $data['pelajaran_sd'] = $this->load->Mmatapelajaran->get_pelajaran_sd();

        $this->parser->parse( 'templating/index', $data );
    }

}
