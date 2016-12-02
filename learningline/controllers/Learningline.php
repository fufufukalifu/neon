<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Learningline extends MX_Controller {
	private $hakakses;

	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('learning_model');
		$this->load->model('matapelajaran/mmatapelajaran');
		$this->load->model('video/mvideos');


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
			APPPATH . 'modules/learningline/views/v-container-daftar-bab.php',
			APPPATH . 'modules/learningline/views/script_learning-daftar-bab.js',
			);

		$this->loadparser($data);
	}
	// FUNGSI INDEX


	//FUNGSI TAMBAHKAN LINE STEP
	public function formstep($data){
		$metadata = $this->learning_model->get_meta_data_step($data)[0];
		$data = array(
			'judul_halaman' => 'Dashboard '.$this->hakakses." - Add Learning Line Step untuk ".$metadata['namaTopik'],
			'namaTopik' => $metadata['namaTopik'],
			'id'=>$metadata['id'],
			'babID'=>$metadata['babID']
			);
		$data['files'] = array(
			APPPATH . 'modules/learningline/views/v-form-step.php',
			APPPATH . 'modules/learningline/views/script_learning-form-step.js',
			);

		$this->loadparser($data);
	}
	//FUNGSI TAMBAHKAN LINE STEP

	//FUNGSI MENAMBAHKAN TOPIK
	public function formtopik($data){
		$bab_meta = $this->mmatapelajaran->get_bab_by_id($data)[0];
		$data = array(
			'judul_halaman' => 'Dashboard '.ucfirst($this->hakakses)." - Add Learning Line Topik Untuk ".$bab_meta['judulBab'],
			'tingkat' =>$bab_meta['namaTingkat'],
			'mapel'=>$bab_meta['namaMataPelajaran'],
			'bab'=>$bab_meta['judulBab'],
			'id'=>$bab_meta['id']
			);

		$data['files'] = array(
			APPPATH . 'modules/learningline/views/v-form-topik.php',
			APPPATH . 'modules/learningline/views/script_learning-form-topik.js',
			);

		$this->loadparser($data);
	}
	//FUNGSI MENAMBAHKAN TOPIK

		//FUNGSI MENAMBAHKAN TOPIK
	public function edit_topik($data){
		$metatopik = $this->learning_model->get_topik_byid($data);
		if ($metatopik==false) {
			echo "Forbiden acces";
		} else {
			$data = array(
			'judul_halaman' => 'Dashboard '.ucfirst($this->hakakses)." - Update Learning Line Topik Berjudul ".$metatopik['namaTopik'],
			'judul'=>$metatopik['namaTopik'],
			'statusLearning'=>$metatopik['statusLearning'],
			'urutan'=>$metatopik['urutan'],
			'deskripsi'=>$metatopik['deskripsi'],
			);

		$data['files'] = array(
			APPPATH . 'modules/learningline/views/v-form-edit-topik.php',
			APPPATH . 'modules/learningline/views/script_learning-edit-topik.js',
			);

		$this->loadparser($data);
		}
		
		// 
	}
	//FUNGSI MENAMBAHKAN TOPIK



	## --------------------------AJAX PROCESSING-------------------------- ##
	// GET LIST TOPIK
	public function ajax_get_list_topik($babid){
		$list = $this->learning_model->get_topik_by_babid($babid);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['namaTopik'];
			$row[] = $list_item['urutan'];
			if ($list_item['statusLearning']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='updatestatus(".$list_item['id'].",".$list_item['statusLearning'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='updatestatus(".$list_item['id'].",".$list_item['statusLearning'].")'>";
			}			
			
			

			$row[] = '<a class="btn btn-sm btn-warning"  
			title="Edit" 
			href="'.base_url().'learningline/edit_topik/'.$list_item['id'].'"><i class="ico-edit"></i></a>
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
			$row[] = $list_item['urutan'];
			$row[] = $list_item['namaTopik'];
			$row[] = $list_item['jenisStep'];

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

		// GET LIST STEP BERDASARKAN ID TOPIK
	public function ajax_get_list_bab(){
		$list = $this->learning_model->get_bab_for_topik();
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['id'];			
			$row[] = $list_item['namaTingkat'];
			$row[] = $list_item['namaMataPelajaran'];
			$row[] = $list_item['judulBab'];
			if ($list_item['statusLearningLine']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='update_learning_bab(".$list_item['id'].",".$list_item['statusLearningLine'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='update_learning_bab(".$list_item['id'].",".$list_item['statusLearningLine'].")'>";
			}
			
			
			$row[] = '
			<a class="btn btn-sm btn-success"  title="Detail" onclick="detail_bab('."'".$list_item['id']."'".')"><i class="ico-file-plus2"></i></a>';

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );	
	}
	// GET LIST STEP BERDASARKAN ID TOPIK

	function ajax_get_video($babid){
		$list = $this->mvideos->get_all_video_by_bab($babid);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['videoID'];			
			$row[] = $list_item['judulSubBab'];
			$row[] = $list_item['judulVideo'];
			
			$row[] = "<input type='radio' name='video' value=".$list_item['videoID']." ' class='switchery' unchecked'>";

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );	

	}

	function ajax_get_materi($data){
		$list = $this->learning_model->get_materi_babID($data);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['id'];			
			$row[] = $list_item['judulMateri'];
			$row[] = '<a class="btn btn-sm btn-primary btn-outline detail-'.$list_item['id'].'"  title="Lihat"
			data-id='."'".json_encode($list_item)."'".'
			onclick="detail('."'".$list_item['id']."'".')"
			>
			<i class=" ico-eye "></i>
		</a> ';

		$row[] = "<input type='radio' name='materi' value=".$list_item['id']." ' class='switchery' unchecked'>";

		$data[] = $row;

	}

	$output = array(
		"data"=>$data,
		);

	echo json_encode( $output );	

}

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
		'status'=>1,
		'urutan'=>$this->input->post('urutan')
		);
	$this->learning_model->insert_line_topik ($data);
}
	// TB-TOPIK //

	// TB-STEP //
function ajax_insert_line_step(){
	$data = array(
		'namaStep'=>$this->input->post('namastep'),
		'jenisStep'=>$this->input->post('select_jenis'),
		'videoID'=>$this->input->post('videoID'),
		'MateriID'=>$this->input->post('materiID'),
		'latihanID'=>$this->input->post('namaTopik'),
		'status'=>1,
		'urutan'=>$this->input->post('urutan'),
		'topikID'=>$this->input->post('topikID'),
		);
	$this->learning_model->insert_line_step($data);
}
	// TB-STEP //

function drop_topik(){
	$data = array(
		'id'=>$this->input->post('id')
		);
	$this->learning_model->drop_topik($data);
}


	## --------------------------RUBAH STATUS LEARNING LINE AT BAB PROCESSING-------------------------- ##

function updateaktiv_bab($data){
	$this->learning_model->updateaktiv_bab($data);
}

function updatepasive_bab($data){
	$this->learning_model->updatepasive_bab($data);
}
	## --------------------------RUBAH STATUS LEARNING LINE AT BAB PROCESSING-------------------------- ##


	## --------------------------CRUD PROCESSING-------------------------- ##
}
