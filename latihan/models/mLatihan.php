<?php 
/**
* 
*/
class Mlatihan extends CI_Model
{
	
	public function get_banksoal()
	{	
		$this->db->order_by('rand()');
   		$this->db->limit(2);
		$this->db->select('*');
		$this->db->from('tb_banksoal');

		// $this->db->select('*,soal.jawaban as soal_jawab');
		// $this->db->from('tb_banksoal soal');
		// $this->db->join('tb_piljawaban jawaban', ' jawaban.id_soal= soal.id_soal');
		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_piljawaban()
	{
		$this->db->select('*');
		$this->db->from('tb_piljawaban');
		$query = $this->db->get();
		return $query->result_array();

			// $this->db->select('*,soal.jawaban as soal_jawab');
		// $this->db->from('tb_banksoal soal');
		// $this->db->join('tb_piljawaban jawaban', ' jawaban.id_soal= soal.id_soal');
		// $this->db->where('id_bab',$babID);
	}
}
 ?>