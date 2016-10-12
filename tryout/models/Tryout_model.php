<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class Tryout_model extends MX_Controller
{
	public function __construct() {


	}
	public function insert_report_sementara($data){
		$this->db->insert( 'tb_report-paket', $data );
	}

	public function get_paket_undo(){
		$query = "SELECT to.id_tryout,paket.id_paket,paket.nm_paket 
		FROM `tb_tryout` `to` 
		JOIN `tb_mm-tryoutpaket` `topaket` ON `to`.`id_tryout` = `topaket`.`id_tryout` 
		JOIN `tb_paket` `paket` ON `topaket`.`id_paket` = `paket`.`id_paket` 
		LEFT OUTER JOIN `tb_report-paket` repa ON `repa`.`id_mm-tryout-paket` = `topaket`.`id` 
		WHERE `repa`.`id_report` IS NULL";

		
	}

	public function get_paket_by_id_to($id_to){
		$this->db->select('*');
		$this->db->from('tb_tryout to');
		$this->db->join('tb_mm-tryoutpaket topaket', 'to.id_tryout = topaket.id_tryout');
		$this->db->join('tb_paket paket','topaket.id_paket = paket.id_paket');
		$query = $this->db->get();
		return $query->result_array();
	}

		public function get_paket_actioned_by_id_to($id_to){
		$this->db->select('*');
		$this->db->from('tb_tryout to');
		$this->db->join('tb_mm-tryoutpaket topaket', 'to.id_tryout = topaket.id_tryout');
		$this->db->join('tb_paket paket','topaket.id_paket = paket.id_paket');
		$this->db->join('tb_report-paket repot_paket','repot_paket.id_mm-tryout-paket=topaket.id');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_paket($id_to){
				$this->db->select('id_paket');
		$this->db->from('tb_tryout to');
		$this->db->join('tb_mm-tryoutpaket topaket', 'to.id_tryout = topaket.id_tryout');
		$this->db->join('tb_paket paket','topaket.id_paket = paket.id_paket');
		$this->db->intersect();
		$this->db->select('id_paket');
		$this->db->from('tb_tryout to');
		$this->db->join('tb_mm-tryoutpaket topaket', 'to.id_tryout = topaket.id_tryout');
		$this->db->join('tb_paket paket','topaket.id_paket = paket.id_paket');
		$this->db->join('tb_report-paket repot_paket','repot_paket.id_mm-tryout-paket=topaket.id');
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
		//hakakses
		$this->db->where( 'hakakses.id_siswa', $data['id_siswa'] );
		//published
		$this->db->where('to.publish', 1);
		//rentang waktu
		// $this->db->where("BETWEEN to.tgl_mulai AND to.stgl_berhenti");
		
		$query = $this->db->get();
		return $query->result_array();
	}
	//# fungsi get data tryout yang hakaksesnya true

	public function get_tryout_by_id($data){
		$this->db->select('*');
		$this->db->from('tb_tryout to');
		$this->db->where('to.id_tryout', $data['id_tryout']);
		$query = $this->db->get();
		return $query->result_array();
	}

	
}
?>
