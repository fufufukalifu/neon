<?php 

/**
* 
*/
class Mvideoback extends CI_Model
{
	
	public function insertVideo($data_video)
	{	
		
		$this->db->insert('tb_video', $data_video);
		redirect(site_url('videoBack/managervideo'));


	}

	// untuk mengambil get value tingkatan seperti sd, smo dll u/
	public function scTingkat()
	{
		$this->db->select('id,aliasTingkat')->from('tb_tingkat');
		$query = $this->db->get();
		return $query->result_array();
	}

	//mengambil value pelajaran berdasarkan id tingkatan
	public function scPelajaran($tingkatID)
	{
		$this->db->where('tingkatID', $tingkatID);
		$this->db->select('id, keterangan')->from('tb_tingkat-pelajaran');
		$query = $this->db->get();
		return $query->result_array();
	}

	//get value bab pelajaran berdasarkan id tingkat pelajaran
	public function scBab($tpelajaranID)
	{
		$this->db->where('tingkatPelajaranID', $tpelajaranID);
		$this->db->select('id, keterangan, judulBab')->from('tb_bab');
		$query = $this->db->get();
		return $query->result_array();
	}

	//get value subbab berdasarkan bab
	public function scSubbab($babID)
	{
		$this->db->where('babID', $babID);
		$this->db->select('id, judulSubBab')->from('tb_subbab');
		$query = $this->db->get();
		return $query->result_array();
	}

	//get ID Guru
	public function getIDguru($penggunaID)
	{
		$this->db->where('penggunaID',$penggunaID);
		$this->db->select('id')->from('tb_guru');
		$query = $this->db->get();
		return $query->result_array();
	}

	//query haspus video
	public function del_video($videoID)
	{
		$this->db->where('id',$videoID);
		$this->db->delete('tb_video');
	}


}
?>