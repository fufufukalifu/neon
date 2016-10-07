<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('parser');
    }

    public function index() {
        $data = array(
        'judul_halaman' => 'Neon Homepage'
        );
        $data['file'] = 'v-container.php';

        $this->parser->parse('v-index-homepage', $data);
    }

}
