<?php 
/**
* 
*/
class Mkonsultasi extends CI_Model
{
	
	function __construct(){
	}

	function get_all_questions(){
		$this->db->select('pertanyaan.id as pertanyaanID, photo, namaDepan, namaBelakang, judulPertanyaan, isiPertanyaan,pertanyaan.date_created, subbab.judulSubBab');
		$this->db->from('tb_k_pertanyaan pertanyaan');
		$this->db->join('tb_subbab subbab','pertanyaan.subBabID = subbab.id');
		$this->db->join('tb_siswa siswa','pertanyaan.siswaID = siswa.id');
		$this->db->order_by('pertanyaan.date_created','desc');
		$this->db->limit(5);
		$query = $this->db->get();

		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array();
		}		
	}


	function get_my_questions($id_siswa){
		$this->db->select('pertanyaan.id as pertanyaanID, photo, namaDepan, namaBelakang, judulPertanyaan, isiPertanyaan,pertanyaan.date_created, subbab.judulSubBab');
		$this->db->from('tb_k_pertanyaan pertanyaan');
		$this->db->join('tb_subbab subbab','pertanyaan.subBabID = subbab.id');
		$this->db->join('tb_siswa siswa','pertanyaan.siswaID = siswa.id');
		$this->db->order_by('pertanyaan.date_created','desc');
		$this->db->limit(5);
		$this->db->where('siswa.id',$id_siswa);
		$query = $this->db->get();   
		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array();
		}		
	}
}
?>