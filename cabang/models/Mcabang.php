<?php 
	/**
	* 
	*/
	class Mcabang extends CI_Model
	{
		
		function __construct(){
		}
		/*Mengambil semua cabang*/
		function get_all_cabang(){
		$this->db->select( '*');
		$this->db->from( 'tb_cabang cabang' );

		$query = $this->db->get();
		return $query->result();
		}	
	}
 ?>