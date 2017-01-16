<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Token_model extends CI_Model{

	function get_token($data,$status){
		$this->db->order_by('tb_token.id');
		if ($data!="all") {
			$this->db->where('masaAktif',$data);
		}
		if ($status==1) {
			$this->db->where('siswaID is not null');
			
		}
		$this->db->select( '*,tb_token.id as tokenid' )->from( 'tb_token' ); 
		$this->db->join('tb_siswa', 'tb_token.siswaID = tb_siswa.id', 'left outer');
		$query = $this->db->get(); 
		return $query->result(); 
	}

	function insert_token($data){
		$this->db->insert( 'tb_token', $data );		
	}

	function get_jumlah_token_stok($param=""){
		$this->db->select( 'id' )->from( 'tb_token' ); 
		$this->db->where('siswaID is NULL');
		if ($param==30 || $param==100 || $param==365) {
			$this->db->where('masaAktif',$param);
		}
		$query = $this->db->get(); 
		return $query->num_rows(); 
	}

	//get mahasiswa yang belum memiliki voucher
	function get_siswa_unvoucher(){
		$query = "SELECT s.`id`, s.`namaDepan`,s.`namaBelakang`,c.`namaCabang` FROM tb_siswa s 
		LEFT JOIN `tb_cabang` c
		ON s.`cabangID` = c.id
		WHERE s.id NOT IN
		(
		SELECT t.`siswaID` FROM `tb_token` t
		JOIN tb_siswa s ON s.`id` = t.`siswaID`
		) AND s.`status`=1";

		$result = $this->db->query($query);
		return $result->result_array();
	}

	// get token kosong yang mau di set ke mahasiswa
	function token_kosong($data){
		$this->db->select( 'id' )->from( 'tb_token' );
		$this->db->where('masaAktif',$data['jenis_token']);
		$this->db->where('siswaID',NULL);
		$this->db->limit($data['jumlah_token']);
		$this->db->order_by('id','desc');
		$query = $this->db->get(); 
		return $query->result();  	
	}
	// update token untuk mahasiswa
	function set_token_to_mahasiswa($param){
		$sekarang = date('Y-m-d h:m:s');
		$this->db->where('id', $param['id_token']);
		$this->db->set('siswaID', $param['siswaID']);
		$this->db->set('tanggal_diaktifkan', $sekarang);
		$this->db->update('tb_token');
	}
	
}
?>