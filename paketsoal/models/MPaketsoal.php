<?php 
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MPaketsoal extends CI_Model {
	public function insertpaketsoal($data){
		$this->db->insert('tb_paket', $data);
	}

	public function getpaketsoal(){
		$this->db->select('*')->from('tb_paket');
		$this->db->where('status', 1);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function droppaket($id){
		$this->db->set('status', 0);
		$this->db->where('id_paket', $id);
		$this->db->update('tb_paket');
	}

	function rubahpaket($id, $data) {
		$this->db->where('id_paket', $id);
		$this->db->update('tb_paket', $data);
	}
}
?>