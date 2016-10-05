<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MTOBack extends CI_Model {


	//insert to ke db
	public function insert_to($dat_to)
	{
		$this->db->insert('tb_tryout',$dat_to);
	}
}
?>




