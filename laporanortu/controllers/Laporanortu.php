<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanortu extends MX_Controller {
	private $hakakses;

	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('Laporanortu_model');
		$this->load->model('cabang/mcabang');
		$this->load->model('admincabang/admincabang_model');
		$this->load->model('tingkat/Mtingkat');
		$this->load->library('sessionchecker');
        $this->sessionchecker->checkloggedin();

		$this->hakakses = $this->gethakakses();
	}

	//GET HAK AKSES
	function gethakakses(){
		return $this->session->userdata('HAKAKSES');
	}
	//GET HAK AKSES

	// LOAD PARSER SESUAI HAK AKSES
	public function loadparser($data){
		$this->hakakses = $this->gethakakses();
		if ($this->hakakses=='admin') {
			$this->parser->parse('admin/v-index-admin', $data);
		}else{
			echo "forbidden access";    		
		}
	}
	// LOAD PARSER SESUAI HAK AKSES

	public function index()
	{
		$data['judul_halaman'] = "Laporan Orang Tua";
		$data['files'] = array(
			APPPATH . 'modules/admincabang/views/v-daftar-paket.php',
			);
		# get cabang
		$data['cabang'] = $this->mcabang->get_all_cabang();
		# get tingkat
		$data['tingkat'] = $this->Laporanortu_model->get_all_tingkat();

		$hakAkses = $this->session->userdata['HAKAKSES'];
		if ($hakAkses == 'admin_cabang') {
			$this->parser->parse('v-index-admincabang', $data);
		} elseif ($hakAkses == 'admin') {
			$data['files'] = array(
				APPPATH . 'modules/laporanortu/views/v-daftar-laporan.php',
				);
			$this->loadparser($data);
		} elseif ($hakAkses == 'guru') {
			redirect(site_url('guru/dashboard/'));
		} elseif ($hakAkses == 'siswa') {
			redirect(site_url('welcome'));
		} else {
			redirect(site_url('login'));
		}
		
	}

	//laporan ortu ajax
	public function laporanortu_ajax($cabang="all",$tingkat="all",$kelas="all"){
		echo "";
		# get cabang
		$data['cabang'] = $this->mcabang->get_all_cabang();

		# get tingkat
		$data['tingkat'] = $this->Laporanortu_model->get_all_tingkat();

		$datas = ['cabang'=>$cabang,'tingkat'=>$tingkat,'kelas'=>$kelas];

		$all_report = $this->Laporanortu_model->get_report_ortu($datas);

		$data = array();
		$n=1;
		foreach ( $all_report as $item ) {
		
			$row = array();
			$row[] = $n;
			$row[] = $item ['namaOrangTua'];
			$row[] = $item ['namaDepan']." ".$item ['namaBelakang'];
			$row[] = $item ['namaPengguna'];
			$row[] = $item ['namaCabang'];
			$row[] = $item ['aliasTingkat'];
			$row[] = "Ini isi message";

			$row[] = "<span class='checkbox custom-checkbox custom-checkbox-inverse'>
			<input type='checkbox' name='' id="."soal".$n." value=''>
			<label for="."soal".$n.">&nbsp;&nbsp;</label></span>";
			
			$data[] = $row;
			$n++;
		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );
	}

	// function get kelas
	public function get_kelas( $tingkat ) {
		$data = $this->output
		->set_content_type( "application/json" )
		->set_output( json_encode( $this->Laporanortu_model->get_kelas( $tingkat ) ) );
	}

}

?>