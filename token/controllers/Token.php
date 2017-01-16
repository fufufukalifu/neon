<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Token extends MX_Controller {
	private $hakakses;

	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('token_model');
		$this->load->helper('string');
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

	public function index(){
		$jumlah_semua_stok = $this->token_model->get_jumlah_token_stok();
		$jumlah_30_stok = $this->token_model->get_jumlah_token_stok(30);
		$jumlah_100_stok = $this->token_model->get_jumlah_token_stok(100);
		$jumlah_365_stok = $this->token_model->get_jumlah_token_stok(365);


		$data = array(
			'judul_halaman' => 'Dashboard '.$this->hakakses." - Daftar Token",
			'jumlah_semua_stok' => $jumlah_semua_stok,
			'jumlah_30_stok'  => $jumlah_30_stok, 
			'jumlah_100_stok'  => $jumlah_100_stok,
			'jumlah_365_stok'  => $jumlah_365_stok,
			);

		$data['files'] = array(
			APPPATH . 'modules/token/views/v-daftar-token.php',
			);
		// var_dump($data['dataToken']);
		$this->loadparser($data);
	}


	function ajax_data_token($data="all", $status=""){
		$list = $this->token_model->get_token($data,$status);
		$data = array();

		foreach ( $list as $token_item ) {
			$row = array();
			$row[] = $token_item->tokenid;
			$row[] = $token_item->nomorToken;

			$row[] = $token_item->masaAktif." Hari";
			if ($token_item->siswaID == NULL) {
				$row[] = "Belum Digunakan";
			}else{
				$row[] = $token_item->namaDepan." ".$token_item->namaBelakang;
			}
			$row[] = "aksi";
			$data[] = $row;
		}

		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
	}

	function ajax_data_siswa(){
		$list = $this->token_model->get_siswa_unvoucher();
		$data = array();
		$n=1;
		//mengambil nilai list
		$baseurl = base_url();
		foreach ( $list as $list_siswa ) {
			$row = array();
			$row[] = "<span class='checkbox custom-checkbox custom-checkbox-inverse'>
			<input type='checkbox' name="."token".$n." id="."soal".$list_siswa['id']." value=".$list_siswa['id'].">
			<label for="."soal".$list_siswa['id'].">&nbsp;&nbsp;</label></span>";
			$row[] = $n;
			$row[] = $list_siswa['namaDepan']." ".$list_siswa['namaBelakang'];

			$data[] = $row;
			$n++;

		}

		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
		// var_dump($list);
	}
	function add_token(){
		// kalo ada yang post
		$jumlah_token = $this->input->post('jumlah_token');
		$masa_aktif = $this->input->post('masa_aktif');
		if ($jumlah_token) {
			if ($jumlah_token==1) {
				$kode_voucher = strtoupper(uniqid());
				$data = array("nomorToken"=>$kode_voucher,
					"masaAktif"=>$this->input->post('masa_aktif'));
				$this->token_model->insert_token($data);
			}else{
				for ($i=1; $i < $jumlah_token   ; $i++) { 
					$kode_voucher = strtoupper(uniqid());
					$data = array("nomorToken"=>$kode_voucher,
						"masaAktif"=>$masa_aktif);
					$this->token_model->insert_token($data);

				}
			}
		}
	}

	function set_token_to_mahasiswa(){
		if ($this->input->post()) {
			$post = $this->input->post();
			// select dulu token yang kosong
			$param_token = array("jenis_token"=>$post['masa_aktif'],
				"jumlah_token"=>$post['jumlah_mahasiswa']);
			$token_kosong = $this->token_model->token_kosong($param_token);
				$i = 0;
			foreach ($token_kosong as $value) {
			//masukan ke array, ambil id tokenya update sama id mahasiswa
				$token_update = array("id_token"=>$value->id,
					"siswaID"=>$post['id'][$i]);
				$i++;
			// update token
				$this->token_model->set_token_to_mahasiswa($token_update);
			}

		}
	}
	

	function tes(){
		
		var_dump($sekarang);

	}
}
