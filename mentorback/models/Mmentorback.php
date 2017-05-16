<?php 
/**
 * 
 */
 class Mmentorback extends CI_Model
 {
 	
 	function get_siswa($records_per_page='10',$page='0')
 	{

 		$this->db->select("s.id as id_siswa,s.namaDepan, s.namaBelakang,p.namaPengguna,c.namaCabang");
 		$this->db->join("tb_pengguna p","s.penggunaID=p.id");
 		$this->db->join("tb_cabang c","s.cabangID=c.id");
 		$this->db->where("p.status",1);
 		$this->db->order_by("namaDepan","asc");
 		$query=$this->db->get("tb_siswa s",$records_per_page,$page);
 		return $query->result();
 	}
 	// get data guru mentor
 	function get_mentor($records_per_page='10',$page='0')
 	{

 		$this->db->select("g.id as id_guru,g.namaDepan, g.namaBelakang,p.namaPengguna");
 		$this->db->join("tb_pengguna p","g.penggunaID=p.id");
 		$this->db->where("p.status",1);
 		$this->db->order_by("namaDepan","asc");
 		$query=$this->db->get("tb_guru g",$records_per_page,$page);
 		return $query->result();
 	}
 } ?>