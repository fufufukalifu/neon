<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admincabang_model extends CI_model {

	//get report all
	function get_report_paket($data="all"){
		if ($data=="all") {
			$query = "SELECT id_report,p.`namaPengguna`,
			c.`namaCabang`,
			s.`namaBelakang`,
			s.`namaDepan`,
			`jmlh_benar`,
			`jmlh_kosong`,
			`jmlh_salah`,
			`total_nilai`,
			`poin`,
			`nm_paket`,
			pk.`tgl_pengerjaan`
			FROM `tb_report-paket` pk
			JOIN `tb_siswa` s ON pk.`siswaID`=s.`id`
			JOIN `tb_pengguna` p ON p.`id` = pk.`id_pengguna`
			JOIN `tb_mm-tryoutpaket` mmto ON mmto.id = pk.`id_mm-tryout-paket`
			JOIN `tb_paket` pkt ON pkt.`id_paket` = mmto.`id_paket`
			JOIN `tb_cabang` c ON c.`id` = s.`cabangID`";
	}else{
		$query = "SELECT id_report,p.`namaPengguna`,
		c.`namaCabang`,
		s.`namaBelakang`,
		s.`namaDepan`,
		`jmlh_benar`,
		`jmlh_kosong`,
		`jmlh_salah`,
		`total_nilai`,
		`poin`,
		`nm_paket`,
		pk.`tgl_pengerjaan`


		FROM `tb_report-paket` pk

		JOIN `tb_siswa` s ON pk.`siswaID`=s.`id`
		JOIN `tb_pengguna` p ON p.`id` = pk.`id_pengguna`
		JOIN `tb_mm-tryoutpaket` mmto ON mmto.id = pk.`id_mm-tryout-paket`
		JOIN `tb_paket` pkt ON pkt.`id_paket` = mmto.`id_paket`
		JOIN `tb_cabang` c ON c.`id` = s.`cabangID` where c.id = $data";
	}
			$result = $this->db->query($query);
		return $result->result_array();
}
}