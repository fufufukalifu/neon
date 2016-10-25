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
		$this->db->select('ht.id as idKey,siswa.id as siswaID,namaDepan,namaBelakang,aliasTingkat');
		$this->db->from('tb_tingkat tkt');
		$this->db->join('tb_siswa siswa','siswa.tingkatID=tkt.id');
		$this->db->join('tb_hakakses-to ht','ht.id_siswa=siswa.id');
		$this->db->where('ht.id_tryout',$id_to);
		$query = $this->db->get();
        return $query->result_array();

	}


	public function paket_by_toID($id_to)
	{
		$this->db->select('mto.id as idKey ,mto.id_paket as id_paket_fk,paket.id_paket as paketID,nm_paket,deskripsi');
		$this->db->from('tb_paket paket');
		$this->db->join('tb_mm-tryoutpaket mto','mto.id_paket = paket.id_paket');
		$this->db->where('mto.id_tryout',$id_to);
		$query = $this->db->get();
        return $query->result_array();

	}
	//get data paket yg belum di add ke TO
	public function paket_by_Nullto()
	{
		$this->db->select('mto.id as idKey ,mto.id_paket as id_paket_fk,paket.id_paket as paketID,nm_paket,deskripsi');
		$this->db->from('tb_paket paket');
		$this->db->join('tb_mm-tryoutpaket mto','mto.id_paket = paket.id_paket');
		$this->db->where('mto.id_tryout',$id_to);
		$query = $this->db->get();
        return $query->result_array();

	}

	//drop relasi paket to
	public function drop_paket_toTO($idKey)
	{
		$this->db->where('id',$idKey);
		$this->db->delete('tb_mm-tryoutpaket');
	}

	//drop relasi siswa to
	public function drop_siswa_toTO($idKey)
	{
		$this->db->where('id',$idKey);
		$this->db->delete('tb_hakakses-to');
	}

	//drop  to
	public function drop_TO($id_tryout)
	{
		$this->db->where('id_tryout',$id_tryout);
		$this->db->delete('tb_tryout');
	}

	public function get_TO_by_id($id_tryout){
		$this->db->select('*');
		$this->db->from('tb_tryout');
		$this->db->where('id_tryout',$id_tryout);
		$query = $this->db->get();

		return $query->row();
	}

	//edit data TO
	public function ch_To($data)
	{
		$this->db->set($data['tryout']);
        $this->db->where('id_tryout', $data['id_tryout']);
        $this->db->update('tb_tryout');
	}

	##opik##
	//ambil data to by uuid
	function get_to_byuuid($uuid){
		$this->db->select("id_tryout, nm_tryout");
		$this->db->from('tb_tryout');
		$this->db->where('UUID', $uuid);
		$query = $this->db->get();
        return $query->result_array();
	}

	//ambli data mahasiswa to by idto
	function get_perserta_by_idto2($id_to){
		$this->db->select("*");
		$this->db->from('tb_hakakses-to hakakses');
		$this->db->join('tb_siswa siswa','hakakses.id_siswa=siswa.id');
		$this->db->where('id_tryout', $id_to);
		$query = $this->db->get();
        return $query->result_array();
	}

	function get_all_report($id_tryout){
		$this->db->select("rtryout.id_report as idReport, namaDepan, namaBelakang, total_nilai, rtryout.id_tryout as id_to");
		$this->db->from('tb_report-tryout rtryout');
		$this->db->join('tb_pengguna pengguna','pengguna.id=rtryout.id_pengguna');
		$this->db->join('tb_siswa siswa', 'siswa.penggunaID = pengguna.id');
		$this->db->join('tb_hakakses-to hto','hto.id_siswa=siswa.id');
		$this->db->where('hto.id_tryout',$id_tryout);
		$query = $this->db->get();
        return $query->result_array();

	}
}
?>




