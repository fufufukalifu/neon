<?php 
class Mvideos extends CI_Model
{
	
	function __construct(){
        $this->load->database();
	}

	function get_video_as_bab($alias_tingkat, $alias_pelajaran){
	//select from 5 table di join semuanya
              $this->db->select('subbab.id as subid,aliasMataPelajaran,judulBab,judulSubBab,aliasTingkat');
              $this->db->from('tb_subbab subbab'); 
              $this->db->join('tb_bab bab', 'bab.id=subbab.babID');
              $this->db->join('tb_mata-pelajaran mapel','bab.mataPelajaranID = mapel.id');
              $this->db->join('tb_tingkat-pelajaran tipel','tipel.mataPelajaranID=mapel.id');
              $this->db->join('tb_tingkat tingkat','tipel.tingkatID = tingkat.id');
       //where 
             $this->db->where('aliasMataPelajaran',$alias_pelajaran);
              $this->db->where('aliasTingkat',$alias_tingkat);        
              $query = $this->db->get();
              return $query->result();
       
	}
  function get_all_subab($id_sub_bab){
      $this->db->select('*');
      $this->db->from('tb_subbab subbab'); 
      $this->db->join('tb_video video','subbab.id=video.subBabId');
      $this->db->where('subbab.id',$id_sub_bab);
      $query = $this->db->get();
      $this->db->last_query();
      return $query->result();
  }

  function get_video_by_teacher($guru_id){
      $this->db->select('*');
      $this->db->from('tb_video video'); 
      $this->db->join('tb_guru guru','video.guruID=guru.id');
      $this->db->where('guru.id',$guru_id);
      $query = $this->db->get();
      return $query->result();
  }
}
 ?>
