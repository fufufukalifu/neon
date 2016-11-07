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
 	public function get_datguru($guruID)
 	{
 		$this->db->select('love,namaDepan,namaBelakang,photo');
 		$this->db->from('tb_guru');
 		$this->db->where('id',$guruID);
 		$query = $this->db->get();
		$result = $query->result_array();
 		return $result[0];
 	}
 	// get jumlah jawaban atau respone guru terhadap konsultasi
 	public function get_count_jawab($guruID)
 	{
 		$this->db->select('id');
		$this->db->from('tb_k_jawab');
		$this->db->where('guruID',$guruID);
		$query = $this->db->get();
		return $query->num_rows();
 	}
 	// get data guru untuk akumulasi poin, love, dan jumlah respone/jawaban
 	public function get_aq_konsul()
 	{
 		$this->db->select('*');
 		$this->db->from('tb_guru');
 		$query = $this->db->get();
        return $query->result_array();

 	}
 	public function get_respone_by_guru($guruID)
 	{
 		$this->db->select('jawab.id as jawabID,jawab.date_created as tgl, isiJawaban, isiPertanyaan, ');
 		$this->db->from('tb_k_jawab jawab');
 		$this->db->join('tb_k_pertanyaan ask','jawab.pertanyaanID=ask.id');
 		$this->db->where('jawab.guruID',$guruID);
 		$query = $this->db->get();
        return $query->result_array();
 	}


 } ?>