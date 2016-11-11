<?php

/**

 *

 */

class Mbug extends CI_Model

{



# fungsi insert ke database bug
	function insert_bug($data){
		$this->db->insert('tb_laporan_bug', $data);
	}






}

?>

