<?php 
/**
 * 
 */
 class Mlinetopik extends CI_Model
 {
 	
 	public function get_line_topik()
 	{
 		$this->db->select('namaTopik,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi, bab.judulBab,tp.keterangan, tkt.aliasTingkat');
 		$this->db->from('tb_line_topik topik');
 		$this->db->join('tb_line_step step','step.topikID=topik.id');
 		$this->db->join('tb_bab bab','bab.id=topik.babID');
 		$this->db->join('tb_tingkat-pelajaran tp','tp.id=bab.tingkatPelajaranID');
 		$this->db->join('tb_tingkat tkt','tkt.id=tp.tingkatID');
 		$this->db->order_by('topik.namaTopik');
 		$this->db->order_by('step.urutan', 'asc');
 		$query=$this->db->get();
 		return  $query->result_array();

 	}

 	public function get_datVideo($UUID)
 	{
 		$this->db->select('namaStep,namaTopik,judulVideo,namaFile,video.deskripsi as deskripsiVideo, link, video.date_created,topik.UUID');
 		$this->db->from('tb_line_topik topik');
 		$this->db->join('tb_line_step step','step.topikID=topik.id');
 		$this->db->join('tb_video video','step.videoID = video.id');
 		$this->db->where('step.UUID',$UUID);
 		$query=$this->db->get();
 		return $query->result_array()[0];
 	}

 	public function get_datMateri($UUID)
 	{
 		$this->db->select('namaStep,namaTopik,judulMateri,isiMateri,materi.date_created,topik.UUID');
 		$this->db->from('tb_line_topik topik');
 		$this->db->join('tb_line_step step','step.topikID=topik.id');
 		$this->db->join('tb_line_materi materi','materi.id=step.materiID');
 		$this->db->where('step.UUID',$UUID);
 		$query=$this->db->get();
 		return $query->result_array()[0];
 	}
 	// get topik berdasarkan UUID step
 	public function get_topic_step($UUID)
 	{
 		 $this->db->select('namaTopik,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi');
 		$this->db->from('tb_line_topik topik');
 		$this->db->join('tb_line_step step','step.topikID=topik.id');
 		$this->db->where('topik.UUID','uuyyy');
 		$this->db->order_by('step.urutan', 'asc');
 		$query=$this->db->get();
 		return  $query->result_array();
 	}
 	public function get_topik()
 	{
 		$this->db->select('id,UUID,namaTopik');
 		$this->db->from('tb_line_topik');
 		$this->db->where('status',1);
 		$this->db->where('statusLearning',1);
 		$query=$this->db->get();
 		return $query->result_array();
 	}
 } ?>