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

	function tambahbanksoal() {
		$data = array(
			'asd' => 'Buat Paket Soal'
			);

		$data['judul_halaman'] = "Buat Bank Soal";

		$data['files'] = array(
			APPPATH.'modules/Paketsoal/views/v-create-bank-soal.php',
			);

		//print_r($data);
		$this->load->view( 'templating/index-b-guru', $data );
	}

	function addpaketsoal() {
		echo "<script>alert('masuk');</script>";
		$data = array(
			'nm_paket' => $this->input->post('nama_paket') ,
			'jumlah_soal' => $this->input->post('jumlah_soal'),
			'durasi' =>$this->input->post('durasi')
			);
		$this->MPaketsoal->insertpaketsoal( $data );


	}
}
?>
