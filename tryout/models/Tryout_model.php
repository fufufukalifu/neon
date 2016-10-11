<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class Tryout_model extends MX_Controller
{
	public function __construct() {


	}


	public function get_id_siswa(){
		$this->db->select('siswa.penggunaID');
		$this->db->from('tb_siswa siswa');
		$this->db->join('tb_pengguna pengguna', 'siswa.penggunaID = pengguna.id');
		$this->db->where('pengguna.id', $this->session->userdata('id'));
		$query = $this->db->get();
    	return $query->result()[0]->penggunaID;
	}

	//# fungsi get data tryout yang hakaksesnya true
	public function get_tryout_akses($data){
		$id_siswa = $data['id_siswa'];
		$this->db->select('*');
		$this->db->from('tb_tryout to');
		$this->db->join('tb_hakakses-to hakAkses', 'to.id_tryout = hakAkses.id_tryout');
		$this->db->where( 'hakakses.id_siswa', $data['id_siswa'] );
    $query = $this->db->get();
    return $query->result_array();
	}
	//# fungsi get data tryout yang hakaksesnya true


}
?>
