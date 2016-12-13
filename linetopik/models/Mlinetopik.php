<?php 
/**
 * 
 */
 class Mlinetopik extends CI_Model
 {
 	
 	public function get_line_topik($UUID)
 	{
 		$this->db->select('namaTopik,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi');
 		$this->db->from('tb_line_topik topik');
 		$this->db->join('tb_line_step step','step.topikID=topik.id');
 		$this->db->where('topik.UUID',$UUID);
 		$this->db->order_by('step.urutan', 'asc');
 		$query=$this->db->get();
 		return  $query->result_array();

 	}

 	public function get_datVideo($UUID)
 	{
 		$this->db->select('namaStep,namaTopik,judulVideo,namaFile,video.deskripsi as deskripsiVideo, link');
 		$this->db->from('tb_line_topik topik');
 		$this->db->join('tb_line_step step','step.topikID=topik.id');
 		$this->db->join('tb_video video','step.videoID = video.id');
 		$this->db->where('step.UUID',$UUID);
 		$query=$this->db->get();
 		return $query->result_array();
 	}

 	public function get_datMateri($UUID)
 	{
 		$this->db->select('namaStep,namaTopik,judulMateri,isiMateri,materi.date_created');
 		$this->db->from('tb_line_topik topik');
 		$this->db->join('tb_line_step step','step.topikID=topik.id');
 		$this->db->join('tb_line_materi materi','materi.id=step.materiID');
 		$this->db->where('step.UUID',$UUID);
 		$query=$this->db->get();
 		return $query->result_array()[0];
 	}
 } ?>