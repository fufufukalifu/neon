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

	public function get_piljawaban($data)
	{	
		$this->db->order_by('rand()');
		$n='1';
		foreach ($data as $row) {
			$id_soal=$row['id_soal'];
			if ($n=='1') {
				$this->db->where('id_soal',$id_soal);
			} else {
				$this->db->or_where('id_soal',$id_soal);
			}
			
		$n++;
		}		
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