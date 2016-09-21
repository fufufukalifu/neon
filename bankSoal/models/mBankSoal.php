<?php 

/**
* 
*/
class MbankSoal extends CI_Model
{
	
	# Start Function untuk form soal#
	public function insert_soal($dataSoal)
	{
		 $this->db->insert('tb_banksoal', $dataSoal);
	}



	public function get_soalID($UUID)
	{
		$this->db->where('UUID',$UUID);
		$this->db->select('id_soal')->from('tb_banksoal');
		$query = $this->db->get();
        return $query->result_array();
	}
	//insert pilihan jawaban berupa text
	public function insert_jawaban($dataJawaban)
	{
		$this->db->insert_batch('tb_piljawaban', $dataJawaban);
	}
	//insert pilihan jawaban berupa gambar
	public function insert_gambar($datagambar)
	{
		$this->db->insert_batch('tb_piljawaban', $datagambar);
		echo "masuk insert gambar";
		var_dump($datagambar);
	}
	# END Function untuk form soal#

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

	public function get_soal($babID)
	{	
		$this->db->where('id_bab',$babID);
		$this->db->select('*')->from('tb_banksoal');
		// $this->db->select('*,soal.jawaban as soal_jawab');
		// $this->db->from('tb_banksoal soal');
		// $this->db->join('tb_piljawaban jawaban', ' jawaban.id_soal= soal.id_soal');
		// $this->db->where('id_bab',$babID);


		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_jawaban($id_soal)
	{
		# code...
	}




}
 ?>