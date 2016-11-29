<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Learningline extends MX_Controller {
	private $hakakses;

	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('learning_model');
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
			$this->parser->parse('v-index-admin', $data);
		} else if($this->hakakses=='guru'){
			$this->parser->parse('templating/index-b-guru', $data);
		}else{
			echo "forbidden access";    		
		}
	}
	// LOAD PARSER SESUAI HAK AKSES


	// FUNGSI INDEX
	public function index(){
		$data = array(
			'judul_halaman' => 'Dashboard '.$this->hakakses." - Learning Line"
			);

		$data['files'] = array(
			APPPATH . 'modules/learningline/views/v-container-daftar-topik.php',
			APPPATH . 'modules/learningline/views/script_learning-daftar-topik.js',
			);

		$this->loadparser($data);
	}
	// FUNGSI INDEX


	//FUNGSI TAMBAHKAN LINE STEP
	public function formstep($data){
		$data = array(
			'judul_halaman' => 'Dashboard '.$this->hakakses." - Add Learning Line Step"
			);

		$data['files'] = array(
			APPPATH . 'modules/learningline/views/v-form-step.php',
			APPPATH . 'modules/learningline/views/script_learning-form-topik.js',
			);

		$this->loadparser($data);
	}
	//FUNGSI TAMBAHKAN LINE STEP

	//FUNGSI MENAMBAHKAN LEARNING
	public function formlearning(){
		$data = array(
			'judul_halaman' => 'Dashboard '.$this->hakakses." - Add Learning Line"
			);

		$data['files'] = array(
			APPPATH . 'modules/learningline/views/v-form-topik.php',
			APPPATH . 'modules/learningline/views/script_learning-form-topik.js',
			);

		$this->loadparser($data);
	}
	//FUNGSI MENAMBAHKAN LEARNING


	## --------------------------AJAX PROCESSING-------------------------- ##
	// GET LIST TOPIK
	public function ajax_get_list_topik(){
		$list = $this->learning_model->get_semua_topik();
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['id'];
			$row[] = $list_item['namaTingkat'];
			$row[] = $list_item['namaMataPelajaran'];
			$row[] = $list_item['judulBab'];
			if ($list_item['statusLearning']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='updatestatus(".$list_item['id'].",".$list_item['statusLearning'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='updatestatus(".$list_item['id'].",".$list_item['statusLearning'].")'>";
			}
			

			$row[] = '<a class="btn btn-sm btn-warning"  title="Edit" onclick="edit_topik('."'".$list_item['id']."'".')"><i class="ico-edit"></i></a>
			<a class="btn btn-sm btn-success"  title="Detail" onclick="detail_topik('."'".$list_item['id']."'".')"><i class="ico-file-plus2"></i></a>
			<a class="btn btn-sm btn-danger"  title="Delete" onclick="drop_topik('."'".$list_item['id']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );
	}
	// GET LIST TOPIK

	// GET LIST STEP BERDASARKAN ID TOPIK
	public function ajax_list_ge_step($id_topik){
		$list = $this->learning_model->get_step_by_id_topik($id_topik);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['namaTopik'];
			if ($list_item['status']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='updatestatusstep(".$list_item['id'].",".$list_item['status'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='updatestatusstep(".$list_item['id'].",".$list_item['status'].")'>";
			}
			
			$row[] = $list_item['urutan'];
			$row[] = '<a class="btn btn-sm btn-warning"  title="Edit" onclick="edit_step('."'".$list_item['id']."'".')"><i class="ico-edit"></i></a>
			<a class="btn btn-sm btn-success"  title="Detail" onclick="detail_step('."'".$list_item['id']."'".')"><i class="ico-file-plus2"></i></a>
			<a class="btn btn-sm btn-danger"  title="Delete" onclick="drop_step('."'".$list_item['id']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );	
	}
	// GET LIST STEP BERDASARKAN ID TOPIK

	## --------------------------AJAX PROCESSING-------------------------- ##



	## --------------------------CRUD PROCESSING-------------------------- ##
	function updateaktiv($data){
		$this->learning_model->updateaktiv($data);
	}

	function updatepasive($data){
		$this->learning_model->updatepasive($data);
	}

	// TB-TOPIK //
	function ajax_insert_line_topik(){
			// $data = $this->input->post();
		$data = array(
			'babID'=>$this->input->post('babID'),
			'statusLearning'=>$this->input->post('statusLearning'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'namaTopik'=>$this->input->post('namaTopik'),
			'status'=>1
			);
		$this->learning_model->insert_line_topik ($data);
	}
	// TB-TOPIK //

	function drop_topik(){
		$data = array(
			'id'=>$this->input->post('id')
			);
		$this->learning_model->drop_topik($data);
	}
	## --------------------------CRUD PROCESSING-------------------------- ##
}
