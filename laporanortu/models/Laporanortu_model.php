<?php 

class Laporanortu_model extends CI_Model{

	//get report all
	function get_report_ortu($data){
		$this->db->order_by('s.namaDepan','asc');
		$this->db->select('p.namaPengguna,
			c.namaCabang,
			s.namaBelakang,
			s.namaDepan,
			o.namaOrangTua,
			s.tingkatID,
			t.aliasTingkat
			');

		$this->db->from('tb_orang_tua o');

		$this->db->join('tb_pengguna p' , 'o.penggunaID = p.id');
		$this->db->join('tb_siswa s' , 'p.id=s.penggunaID');
		$this->db->join('tb_tingkat t' , 's.tingkatID=t.id');
		$this->db->join('tb_cabang c' , 'c.id = s.cabangID');

		if ($data['cabang']!="all") {
			$this->db->where('c.id', $data['cabang']);
		}

		$tingkat = $data['tingkat'];
		if ($data['tingkat']!="all") {
			$this->db->where("t.aliasTingkat LIKE '%$tingkat%' ");
		}

		$kelas = $data['kelas'];
		if ($data['kelas']!="all") {
			$this->db->where("t.aliasTingkat LIKE '%$kelas%' ");
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	/*Mengambil semua tingkat*/
	function get_all_tingkat(){
		$this->db->select('*');
		$this->db->from('tb_tingkat');
		$this->db->where('status', 0);

		$query = $this->db->get();
		return $query->result();
	}	

	/*Mengambil semua kelas*/
	function get_kelas($tingkat){
		$this->db->select('*');
		$this->db->from('tb_tingkat');
		$this->db->where('status', 0);
		$this->db->where("aliasTingkat LIKE '%$tingkat%' ");

		$query = $this->db->get();
		return $query->result_array();
	}	

}
?>