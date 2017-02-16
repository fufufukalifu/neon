<?php 
class Webservice_model extends CI_Model
{


	function get_siswa_on_tryout($data){
		$query = "SELECT `id`, `namaDepan`, `namaBelakang`, `alamat`, `noKontak`, `penggunaID`, `photo`, `biografi`, `status` FROM tb_siswa s WHERE s.`id` IN( 
			SELECT id_siswa FROM `tb_hakakses-to` WHERE id_tryout = $data )";
$result = $this->db->query($query);
return $result->result_array();
}

function get_pengguna_on_tryout($data){
	$query = "SELECT p.id,namaPengguna, kataSandi, eMail, regTime, aktivasi, avatar
	, `oauth_uid`, `oauth_uid`,hakAkses,p.status, last_akses
	FROM tb_pengguna p
	JOIN tb_siswa s ON s.`penggunaID` = p.`id`
	JOIN `tb_hakakses-to` ha ON ha.`id_siswa` = s.`id`
	WHERE id_tryout = $data ";
	$result = $this->db->query($query);
	return $result->result_array();	
}

function get_hak_akses_on_tryout($data){
	$this->db->select('*');
	$this->db->from('tb_hakakses-to ha');
	$this->db->where('id_tryout',$data);
	$query = $this->db->get();
	return $query->result_array();
}

function get_soal_on_tryout($data){
	$query = "SELECT p.id_soal,judul_soal, soal, jawaban, 
	kesulitan, sumber,
	b.`create_by`, b.random, b.publish, b.UUID, b.status, gambar_soal, 
	pembahasan, gambar_pembahasan, video_pembahasan, status_pembahasan, link        
	FROM `tb_banksoal` b
	JOIN `tb_mm-paketbank` p ON b.`id_soal` = p.`id_soal`
	JOIN tb_paket pk ON pk.`id_paket` = p.`id_paket`
	JOIN `tb_mm-tryoutpaket` mmp ON mmp.`id_paket` = pk.`id_paket`
	JOIN `tb_tryout` t ON t.`id_tryout` = mmp.`id_tryout`
	WHERE t.`id_tryout` = $data";
	$result = $this->db->query($query);
	return $result->result_array();	
}

function get_mm_paket($data){
	$query = "SELECT mm.id,mm.`id_paket`,mm.id_soal
	FROM `tb_mm-paketbank` mm
	JOIN `tb_banksoal` b ON mm.`id_soal` = b.`id_soal`
	JOIN tb_paket p ON p.`id_paket` = mm.`id_paket`
	JOIN `tb_mm-tryoutpaket` mmp ON mmp.`id_paket` = p.`id_paket`
	JOIN `tb_tryout` t ON t.`id_tryout` = mmp.`id_tryout`
	WHERE t.`id_tryout` = $data";
	$result = $this->db->query($query);
	return $result->result_array();	
}
}
?>