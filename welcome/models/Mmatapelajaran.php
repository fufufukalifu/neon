<?php 
class Mmatapelajaran extends CI_Model
{
	
	function __construct(){
		$this->load->database();
	}

	public function get_pelajaran_sma(){
		$query = $this->db->get('view_pelajaran_sma');
		return $query->result();
	}

	public function get_pelajaran_smk(){
		$query = $this->db->get('view_pelajaran_smk');
		return $query->result();
	}

	public function get_pelajaran_smp(){
		$query = $this->db->get('view_pelajaran_smp');
		return $query->result();
	}

	public function get_pelajaran_sd(){
		$query = $this->db->get('view_pelajaran_sd');
		return $query->result();
	}

	


}
 ?>