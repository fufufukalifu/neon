<?php 
/**
 * 
 */
 class Mkonsulback extends CI_Model
 {
 	 function __construct() {
        parent::__construct();
        $this->load->helper('session');
    }
 	// get hitung jumlah jawaban guru
 	// 
 	// get general data guru
 	public function get_datguru($penggunaID)
 	{
 		$this->db->select('namaDepan,namaBelakang,photo');
 		$this->db->from('tb_pengguna user');
 		$this->db->join('tb_guru guru','user.id=guru.penggunaID');
 		$this->db->where('guru.penggunaID',$penggunaID);
 		$query = $this->db->get();
		$result = $query->result_array();
 		return $result[0];
 	}
 	// get jumlah jawaban atau respone guru terhadap konsultasi
 	public function get_count_jawab($penggunaID)
 	{
 		$this->db->select('id');
		$this->db->from('tb_k_jawab');
		$this->db->where('penggunaID',$penggunaID);
		$query = $this->db->get();
		return $query->num_rows();
 	}
 	// get data guru untuk akumulasi poin, love, dan jumlah respone/jawaban
 	public function get_aq_konsul()
 	{
 		$this->db->select('penggunaID,namaDepan,namaBelakang,guru.id as id_guru,mp.aliasMataPelajaran as mapel');
 		$this->db->from('tb_pengguna user');
 		$this->db->join('tb_guru guru','user.id=guru.penggunaID');
 		$this->db->join('tb_mata-pelajaran mp','mp.id=guru.mataPelajaranID');
 		$query = $this->db->get();
        return $query->result_array();

 	}
 	public function get_respone_by_guru($penggunaID)
 	{
 		$this->db->select('jawab.id as jawabID,jawab.date_created as tgl, isiJawaban, isiPertanyaan,judulPertanyaan ');
 		$this->db->from('tb_k_jawab jawab');
 		$this->db->join('tb_k_pertanyaan ask','jawab.pertanyaanID=ask.id');
 		$this->db->where('jawab.penggunaID',$penggunaID);
 		$query = $this->db->get();
        return $query->result_array();
 	}
 	//get jumlah love untuk guru
 	public function get_count_love($penggunaID)
 	{
 		$this->db->select('id');
		$this->db->from('tb_k_love');
		$this->db->where('penggunaID',$penggunaID);
		$query = $this->db->get();
		return $query->num_rows();
 	}

 	// get data komen siswa ke guru
 	public function get_komen_love($penggunaID)
 	{
 		$this->db->select('namaDepan,namaBelakang,love.komentar, love.date_created as tgl');
 		$this->db->from('tb_siswa siswa');
 		$this->db->join('tb_k_love love','siswa.id=love.siswaID');
 		$this->db->join('tb_pengguna pengguna','pengguna.id=love.penggunaID');
 		$this->db->where('love.penggunaID',$penggunaID);
 		$query = $this->db->get();
        return $query->result_array();
 	}

 } ?>