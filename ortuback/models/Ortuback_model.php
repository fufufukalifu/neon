<?php 

class Ortuback_model extends CI_Model{

	/*Mengambil report berdasarkan nilai*/
	function get_report_nilai($id_ortu){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->where("o.id", 4);
		$this->db->where("l.jenis = 'nilai'");

		$query = $this->db->get();
		return $query->result_array();
	}	

	/*Mengambil report berdasarkan absen*/
	function get_report_absen($id_ortu){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->where("o.id", 4);
		$this->db->where("l.jenis = 'absen'");

		$query = $this->db->get();
		return $query->result_array();
	}	

	/*Mengambil report berdasarkan umum*/
	function get_report_umum($id_ortu){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->where("o.id", 4);
		$this->db->where("l.jenis = 'umum'");

		$query = $this->db->get();
		return $query->result_array();
	}	

	/*Mengambil semua report*/
	function get_report_all($data){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->where("o.id", 4);

		if ($data['jenis']!="all") {
			$this->db->where('l.jenis', $data['jenis']);
		}

		$query = $this->db->get();
		return $query->result_array();
	}	

}

?>