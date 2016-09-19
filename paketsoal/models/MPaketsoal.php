<?php 
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MPaketsoal extends CI_Model {
	public function insertpaketsoal($data){
		$this->db->insert('tb_paket', $data);
	}
}
?>