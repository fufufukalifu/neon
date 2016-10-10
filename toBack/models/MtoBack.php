<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MTOBack extends CI_Model {

	var $table = 'tb_paket';
	var $column_order = array('id_paket','nm_paket','deskripsi');
	var $column_search = array('nm_paket','deskripsi');
	var $order = array('id_paket'=>'desc');

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
	public function insert_addPaket($dat_paket)
	{
		$this->db->insert_batch('tb_mm-tryoutpaket',$dat_paket);
	}

	//add siswa to paket
		//add paket Ke TO
	public function insert_addSiswa($dat_siswa)
	{
		$this->db->insert_batch('tb_hakakses-to',$dat_siswa);
	}

	#Function untuk tampil data list yg baru di add#

	function hitung_semuapaket() {
		$this->db->from( $this->table );
		return $this->db->count_all_results();
	}

	function hitung_filterpaket() {
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	private function _get_datatables_query() {

		$this->db->from( $this->table );

		$i = 0;

		foreach ( $this->column_search as $item ) // loop column
			{
			if ( $_POST['search']['value'] ) // if datatable send POST for search
				{

				if ( $i===0 ) // first loop
					{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like( $item, $_POST['search']['value'] );
				}
				else {
					$this->db->or_like( $item, $_POST['search']['value'] );
				}

				if ( count( $this->column_search ) - 1 == $i ) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if ( isset( $_POST['order'] ) ) // here order processing
			{
			$this->db->order_by( $this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir'] );
		}
		else if ( isset( $this->order ) ) {
				$order = $this->order;
				$this->db->order_by( key( $order ), $order[key( $order )] );
			}
	}
	##################################################


}
?>




