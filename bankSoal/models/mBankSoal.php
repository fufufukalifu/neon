<?php 

/**
* 
*/
class MbankSoal extends CI_Model
{
	

	public function insert_soal($data)
	{
		# code...
	}

	public function get_pelajaran($tingkatID)
	{	
		$this->db->where('tingkatID',$tingkatID);
		$this->db->select('*')->from('tb_tingkat-pelajaran');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_bab($tingkatPelajaranID)
	{	
		$this->db->where('tingkatPelajaranID',$tingkatPelajaranID);
		$this->db->select('*')->from('tb_bab');
		$query = $this->db->get();
		return $query->result_array();
	}

}
 ?>