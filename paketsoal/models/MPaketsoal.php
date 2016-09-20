<?php 
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MPaketsoal extends CI_Model {
	public function insertpaketsoal($data){
		$this->db->insert('tb_paket', $data);
	}

	public function getpaketsoal(){
		$this->db->select('*')->from('tb_paket');
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>