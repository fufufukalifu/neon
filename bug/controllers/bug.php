<?php 	

class Bug extends MX_Controller {


	function __construct(){
		$this->load->model('mbug');
	}

	function ajax_add_bug(){
		$data = array(
			'isiError' => $this->input->post('isi'),
			'halaman' => $this->input->post('alamat'),
			'penggunaID' => $this->session->userdata('id')
			);
		$this->mbug->insert_bug($data);

	}

	function index(){
		
	}
}

?>