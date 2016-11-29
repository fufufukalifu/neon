<?php 

class Learning_model extends CI_Model{

	//fungsi ambil semua topik
	public function get_semua_topik(){
		$this->db->select('t.id,t.statusLearning, tn.`namaTingkat`, b.`judulBab`, t.`namaTopik`, m.`namaMataPelajaran`,');
		
		$this->db->from('`tb_line_topik` t');
		$this->db->where('t.status',1);
		
		$this->db->join('`tb_bab` b',' t.`babID` = b.`id` ');
		$this->db->join('`tb_tingkat-pelajaran` tp ',' b.`tingkatPelajaranID` = tp.`id`');
		$this->db->join('`tb_tingkat` tn',' tn.`id` = tp.`tingkatID`');
		$this->db->join('tb_mata-pelajaran` m',' m.`id` = tp.`mataPelajaranID`');

		$query = $this->db->get();
		return $query->result_array();
	}

	// fungi ambil semua step berdasarkan id topik tertentu
	public function get_step_by_id_topik($data){
		$this->db->select('*');
		$this->db->from('`tb_line_topik` tp');
		$this->db->join('`tb_line_step` ls','tp.`id`=ls.`topikID`');
		$this->db->where('tp.id',$data);
		$query = $this->db->get();
		return $query->result_array();
	}

	function updateaktiv($data){
		$this->db->where('id', $data);
		$this->db->set('statusLearning', 1);
		$this->db->update('tb_line_topik');
	}

	function updatepasive($data){
		$this->db->where('id', $data);
		$this->db->set('statusLearning', 0);
		$this->db->update('tb_line_topik');
	}

	function insert_line_topik($data){
		$this->db->insert( 'tb_line_topik', $data );
	}

	function drop_topik($data){
		$this->db->where('id', $data['id']);
		$this->db->set('status', 0);
		$this->db->update('tb_line_topik');
	}
}
?>