<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class Tesonline_model extends CI_Model {

	//mengambil paket tingkat dan mapel tertentu
	//misalnya : IPA untuk Tingkat SD
	public function getpaketbytingkatmapel( $tingpelID ) {
	$this->db->select('tingpel.tingkatID as tingkatID,judulSubBab as JudulSub,tingpel.id AS tingpelID,paket.nm_paket, paket.id_paket AS paketID, jumlah_soal');
		$this->db->from('tb_mata-pelajaran mapel');
		$this->db->join('tb_tingkat-pelajaran tingpel','mapel.id = tingpel.mataPelajaranID');
		$this->db->join('tb_bab bab','bab.tingkatPelajaranID=tingpel.id');
		$this->db->join('tb_subbab subab','subab.babID = bab.id');
		$this->db->join('tb_paket paket','paket.subBabID = subab.id');

		$this->db->where( 'tingpel.id', $tingpelID );
		$query = $this->db->get();
		return $query->result();
	}

}
?>
