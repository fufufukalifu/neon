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
}

 ?>