<?php 

/**
* 
*/
class Mvideoback extends CI_Model
{
	
	public function insertVideo($data_video)
	{	
		
		$this->db->insert('tb_video', $data_video);


	}
}
 ?>