<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MTingkat extends CI_Model {
	var $table = 'tb_tingkat';

	public function get_by_id($id){
		$this->db->from($this->table);
		$this->db->where('id_tingkat',$id);
		$query = $this->db->get();

		return $query->row();
	}

 
	public function gettingkat() {
		$this->db->select( '*' )->from( 'tb_tingkat' );
		$this->db->where( 'status', 1 );
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>
