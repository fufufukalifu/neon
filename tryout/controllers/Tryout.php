<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class Tryout extends MX_Controller
{
	public function __construct() {
		$this->load->library( 'parser' );
		parent::__construct();
	}

	//# fungsi indeks
	public function index(){
        $data = array(
            'judul_halaman' => 'Neon - Tryout',
            'judul_header' => 'Daftar Tryout',
            'judul_tingkat' => '',
        );

        $konten = 'modules/tesonline/views/v-daftar-to.php';

        $data['files'] = array(
            APPPATH . 'modules/homepage/views/v-header-login.php',
            APPPATH . 'modules/templating/views/t-f-pagetitle.php',
            APPPATH . $konten,
            APPPATH . 'modules/homepage/views/v-footer.php',
        );


        $this->parser->parse('templating/index', $data);
	}
	//# fungsi indeks


}
?>
