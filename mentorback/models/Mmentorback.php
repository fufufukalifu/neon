<?php 
/**
 * 
 */
 class Mmentorback extends CI_Model
 {
 	
 	function get_siswa($records_per_page='',$page='',$cabang)
 	{

 		$this->db->select("s.id as id_siswa,s.namaDepan, s.namaBelakang,p.namaPengguna,c.namaCabang");
 		$this->db->join("tb_pengguna p","s.penggunaID=p.id");
 		$this->db->join("tb_cabang c","s.cabangID=c.id");
 		if ($cabang!="all") {
			$this->db->where('c.id', $cabang);
		}
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
 	// insert mentoring
 	function in_mentoring($datMentoring='')
 	{
 		$this->db->insert_batch('tb_mm_mentor_siswa', $datMentoring);
 	}

 	public function del_mentor_siswa($id_siswa)
 	{
 		$this->db->where('siswaID', $id_siswa);
		$this->db->delete('tb_mm_mentor_siswa');
 	}

 	 	public function del_siswa_mentor($id_guru)
 	{
 		$this->db->where('guruID', $id_guru);
		$this->db->delete('tb_mm_mentor_siswa');
 	}

 	// get jumlah siswa
 	public function jumlah_siswa($cabang)
 	{
 	
 		$this->db->join("tb_pengguna p","s.penggunaID=p.id");
 		$this->db->join("tb_cabang c","s.cabangID=c.id");
 		if ($cabang!="all") {
			$this->db->where('c.id', $cabang);
		}
 		$this->db->where("p.status",1);
 		$this->db->order_by("namaDepan","asc");
 		$query=$this->db->get("tb_siswa s");
 		return $query->num_rows();
 	}

 	public function get_siswa_mentor_by_idguru($id_guru='')
 	{
 		$this->db->select("s.namaDepan,s.namaBelakang,c.namaCabang");
 		$this->db->from("tb_siswa s");
 		$this->db->join("tb_cabang c","c.id=s.cabangID");
 		$this->db->join("tb_mm_mentor_siswa mentor","mentor.siswaID=s.id");
 		$this->db->where("mentor.guruID",$id_guru);
 		$query = $this->db->get();
 		return $query->result();
 	}
 } ?>