<?php 
/**
 * 
 */
 class Mgallery extends CI_Model
 {
 	
 	public function in_gallery($data)
 	{

 		$this->db->insert('tb_gallery', $data['dataGallery']);
 	}

 	public function get_datImg()
 	{
 		$this->db->select('id,file_name,date_created');
 		$this->db->from('tb_gallery');
 		 $query = $this->db->get();
        return $query->result_array();

 	}
 	
 } ?>