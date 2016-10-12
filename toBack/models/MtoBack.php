<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MTOBack extends CI_Model {

	var $table = 'tb_paket';
	var $column_order = array('id_paket','nm_paket','deskripsi');
	var $column_search = array('nm_paket','deskripsi');
	var $order = array('id_paket'=>'desc');

	//insert to ke db
	public function insert_to($dat_to)
	{
		$this->db->insert('tb_tryout',$dat_to);
	}

	public function get_To()
	{
		$this->db->select('*');
		$this->db->from('tb_tryout');
		        $query = $this->db->get();
        return $query->result_array();
	}
	//add paket Ke TO
	public function insert_addPaket($dat_paket)
	{
		$this->db->insert_batch('tb_mm-tryoutpaket',$dat_paket);
	}

	//add siswa to paket
		//add paket Ke TO
	public function insert_addSiswa($dat_siswa)
	{
		$this->db->insert_batch('tb_hakakses-to',$dat_siswa);
	}

	
	public function siswa_by_totID ($id_to)
	{
		$this->db->select('siswa.id as siswaID,namaDepan,namaBelakang,aliasTingkat');
		$this->db->from('tb_tingkat tkt');
		$this->db->join('tb_siswa siswa','siswa.tingkatID=tkt.id');
		$this->db->join('tb_hakakses-to ht','ht.id_siswa=siswa.id');
		$this->db->where('ht.id_tryout',$id_to);
		$query = $this->db->get();
        return $query->result_array();

	}


	public function paket_by_toID($id_to)
	{
		$this->db->select('id,mto.id_paket as id_paket_fk,paket.id_paket as paketID,nm_paket,deskripsi');
		$this->db->from('tb_paket paket');
		$this->db->join('tb_mm-tryoutpaket mto','mto.id_paket = paket.id_paket');
		$this->db->where('mto.id_tryout',$id_to);
		$query = $this->db->get();
        return $query->result_array();

	}



}
?>




