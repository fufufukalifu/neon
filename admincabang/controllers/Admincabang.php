<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admincabang extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('admincabang_model');
		$this->load->model('cabang/mcabang');

	}

	public function index() {
		$data['judul_halaman'] = "Dashboard Admin Cabang";
		$data['files'] = array(
			APPPATH . 'modules/admin/views/v-container.php',
			);
		$hakAkses = $this->session->userdata['HAKAKSES'];
		if ($hakAkses == 'admin_cabang') {
			$this->parser->parse('v-index-admincabang', $data);
		} elseif ($hakAkses == 'guru') {
			redirect(site_url('guru/dashboard/'));
		} elseif ($hakAkses == 'siswa') {
			redirect(site_url('welcome'));
		} else {
			redirect(site_url('login'));
		}
	}

	public function laporanto($data="all"){
		// $data="all";
		// if ($this->input->post()){
		// 	$post = $this->input->post();
		// 	$data = $post['idcabang'];
		// }

		$all_report = $this->admincabang_model->get_report_paket($data);

		$data = array();

		foreach ( $all_report as $item ) {
			$row = array();
			$row[] = $item ['id_report'];
			$row[] = $item ['namaPengguna'];
			$row[] = $item ['nm_paket'];
			$row[] = $item ['namaCabang'];
			$row[] = $item ['namaDepan']." ".$item ['namaBelakang'];
			$row[] = $item ['jmlh_benar'];
			$row[] = $item ['jmlh_salah'];
			$row[] = $item ['jmlh_kosong'];
			$row[] = $item ['poin'];
			$row[] = $item ['total_nilai'];			
			$row[] = $item['tgl_pengerjaan'];	
			
			$data[] = $row;
		}

		$output = array(

			"data"=>$data,
			);

		echo json_encode( $output );
	}


	public function laporanpaket(){
		$data['judul_halaman'] = "Laporan Paket TO";
		$data['files'] = array(
			APPPATH . 'modules/admincabang/views/v-daftar-paket.php',
			);
		$data['cabang'] = $this->mcabang->get_all_cabang();
		$hakAkses = $this->session->userdata['HAKAKSES'];
		if ($hakAkses == 'admin_cabang') {
			$this->parser->parse('v-index-admincabang', $data);
		} elseif ($hakAkses == 'guru') {
			redirect(site_url('guru/dashboard/'));
		} elseif ($hakAkses == 'siswa') {
			redirect(site_url('welcome'));
		} else {
			redirect(site_url('login'));
		}
	}
}
?>