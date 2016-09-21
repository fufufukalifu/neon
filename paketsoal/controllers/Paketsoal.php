<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class Paketsoal extends MX_Controller
{

	public function __construct() {
		$this->load->library( 'parser' );
		$this->load->model( 'MPaketsoal' );
		parent::__construct();
	}

	function index() {

	}

	function tambahpaketsoal() {
		$data['paket_soal'] = $this->load->MPaketsoal->getpaketsoal();
		$data['judul_halaman'] = "Buat Paket Soal";
		$data['files'] = array(
			APPPATH.'modules/Paketsoal/views/v-create-bank-soal.php',
			);
		$this->load->view( 'templating/index-b-guru', $data );
	}

	function addpaketsoal() {
		echo "<script>alert('masuk');</script>";
		$data = array(
			'nm_paket' => $this->input->post( 'nama_paket' ) ,
			'jumlah_soal' => $this->input->post( 'jumlah_soal' ),
			'durasi' =>$this->input->post( 'durasi' )
			);
		$this->MPaketsoal->insertpaketsoal( $data );

	}
	function coba(){
		$this->load->view('coba');
	}
	function ambil_paket_soal(){
		$data = $this->output
		->set_content_type( "application/json" )
		->set_output( json_encode( $this->load->MPaketsoal->getpaketsoal() ) ) ;
	}
}
?>