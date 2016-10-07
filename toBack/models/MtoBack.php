<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MTOBack extends CI_Model {


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
	public function insert_addPaket()
	{
		
	}
}
?>




