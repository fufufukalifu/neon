<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admincabang extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
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
}
?>