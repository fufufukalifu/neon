<?php
class Madmin extends CI_Model
{
	function get_avatar_admin(){
		$this->db->select('avatar');
		$this->db->from('tb_pengguna');
		$this->db->where('id', $this->session->userdata('id'));

		$query = $this->db->get();
        return $query->result_array()[0]['avatar'];
	}

}
?>