<?php 
/**
* 
*/
class Mkonsultasi extends CI_Model
{
	
	function __construct(){
	}

	//ambil semua pertnyaan
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

	//ambil pertanyaan yang dimiliki oleh id tertentu.
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

	//ambil pertanyaan yang memiliki level sama
	function get_my_question_level($id_tingkat){
		$this->db->select('pertanyaan.id as pertanyaanID, photo, namaDepan, namaBelakang, judulPertanyaan, isiPertanyaan,pertanyaan.date_created, subbab.judulSubBab');
		$this->db->from('tb_k_pertanyaan pertanyaan');
		$this->db->join('tb_siswa siswa','pertanyaan.siswaID = siswa.id');
		$this->db->join('tb_subbab subbab','pertanyaan.subBabID = subbab.id');
		
		$this->db->join('tb_tingkat tingkat','siswa.tingkatID = tingkat.id');
		$this->db->order_by('pertanyaan.date_created','desc');
		$this->db->where('tingkat.id',$id_tingkat);

		$this->db->limit(5);

		$query = $this->db->get();   
		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array();
		}
	}

	// ambil meta data from konsultasi
	function get_pertanyaan($id_pertanyaan){
		$this->db->select('*');
		$this->db->from('tb_k_pertanyaan pertanyaan');
		$this->db->join('tb_siswa siswa','pertanyaan.siswaID = siswa.id');
		$this->db->join('tb_subbab subbab','pertanyaan.subBabID = subbab.id');
		
		$this->db->join('tb_tingkat tingkat','siswa.tingkatID = tingkat.id');
		$this->db->join('tb_pengguna pengguna','pengguna.id = siswa.penggunaID');

		$this->db->where('pertanyaan.id',$id_pertanyaan);

		$query = $this->db->get();   
		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array();
		}
	}





	// =========## cruud ##==============
		public function insert_konstulasi( $data ) {
		$this->db->insert( 'tb_k_pertanyaan', $data );

	}
}
?>