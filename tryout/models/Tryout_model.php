<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Tryout_model extends MX_Controller {

    public function __construct() {
        
    }

    public function insert_report_sementara($data) {
        $this->db->insert('tb_report-paket', $data);
    }

    public function get_paket_undo($id_to) {
        $query = "SELECT *
				FROM `tb_tryout` `to` 
				JOIN `tb_mm-tryoutpaket` `topaket` 
				ON `to`.`id_tryout` = `topaket`.`id_tryout` 
				JOIN `tb_paket` `paket` 
				ON `topaket`.`id_paket` = `paket`.`id_paket` 
				LEFT OUTER JOIN `tb_report-paket` repa 
				ON `repa`.`id_mm-tryout-paket` = `topaket`.`id` 
				WHERE `repa`.`id_report` IS NULL
				AND topaket.id_tryout = $id_to";
        $result = $this->db->query($query);
        return $result->result_array();
    }

    public function get_paket_by_id_to($id_to) {
        $this->db->select('*');
        $this->db->from('tb_tryout to');
        $this->db->join('tb_mm-tryoutpaket topaket', 'to.id_tryout = topaket.id_tryout');
        $this->db->join('tb_paket paket', 'topaket.id_paket = paket.id_paket');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_paket_actioned_by_id_to($id_to) {
        $this->db->select('*');
        $this->db->from('tb_tryout to');
        $this->db->join('tb_mm-tryoutpaket topaket', 'to.id_tryout = topaket.id_tryout');
        $this->db->join('tb_paket paket', 'topaket.id_paket = paket.id_paket');
        $this->db->join('tb_report-paket repot_paket', 'repot_paket.id_mm-tryout-paket=topaket.id');
        $this->db->where('repot_paket.id_pengguna', $this->session->userdata('id'));
        $this->db->where('to.id_tryout', $id_to);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_id_siswa() {
        $this->db->select('siswa.id');
        $this->db->from('tb_siswa siswa');
        $this->db->join('tb_pengguna pengguna', 'siswa.penggunaID = pengguna.id');

        $this->db->where('pengguna.id', $this->session->userdata('id'));

        $query = $this->db->get();
        return $query->result()[0]->id;
    }

    //# fungsi get data tryout yang hakaksesnya true
    public function get_tryout_akses($data) {
        $id_siswa = $data['id_siswa'];
        $this->db->select('*');
        $this->db->from('tb_tryout to');
        $this->db->join('tb_hakakses-to hakAkses', 'to.id_tryout = hakAkses.id_tryout');
        //hakakses
        $this->db->where('hakakses.id_siswa', $data['id_siswa']);
        //published
        $this->db->where('to.publish', 1);
        //rentang waktu
        // $this->db->where("BETWEEN to.tgl_mulai AND to.stgl_berhenti");

        $query = $this->db->get();
        return $query->result_array();
    }

    //# fungsi get data tryout yang hakaksesnya true

    public function get_tryout_by_id($data) {
        $this->db->select('*');
        $this->db->from('tb_tryout to');
        $this->db->where('to.id_tryout', $data['id_tryout']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_paket($id_to) {
        $this->db->select('id_paket');
        $this->db->from('tb_tryout to');
        $this->db->join('tb_mm-tryoutpaket topaket', 'to.id_tryout = topaket.id_tryout');
        $this->db->join('tb_paket paket', 'topaket.id_paket = paket.id_paket');
        $this->db->intersect();
        $this->db->select('id_paket');
        $this->db->from('tb_tryout to');
        $this->db->join('tb_mm-tryoutpaket topaket', 'to.id_tryout = topaket.id_tryout');
        $this->db->join('tb_paket paket', 'topaket.id_paket = paket.id_paket');
        $this->db->join('tb_report-paket repot_paket', 'repot_paket.id_mm-tryout-paket=topaket.id');
    }

    public function dataPaket($id) {
        $this->db->select('id_paket');
        $this->db->from('tb_mm-tryoutpaket');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_soal($id_paket) {
        $this->db->order_by('rand()');
        $this->db->select('id_paket as idpak, soal as soal, soal.id_soal as soalid, soal.judul_soal as judul, soal.gambar_soal as gambar');
        $this->db->from('tb_mm-paketbank as paban');
        $this->db->join('tb_banksoal as soal', 'paban.id_soal = soal.id_soal');
        $this->db->where('paban.id_paket', $id_paket);
        $query = $this->db->get();
        $soal = $query->result_array();

        $this->db->order_by('rand()');
        $this->db->select('*,id_paket as idpak, soal as soal, pil.id_soal as pilid,soal.id_soal as soalid, pil.pilihan as pilpil, pil.jawaban as piljaw, pil.gambar as pilgam');
        $this->db->from('tb_mm-paketbank as paban');
        $this->db->join('tb_banksoal as soal', 'paban.id_soal = soal.id_soal');
        $this->db->join('tb_piljawaban as pil', 'soal.id_soal = pil.id_soal');
        $this->db->where('paban.id_paket', $id_paket);
        $query = $this->db->get();
        $pil = $query->result_array();

        return array(
            'soal' => $soal,
            'pil' => $pil,
        );
    }

    //get pilihan berdasarkan subbab MP
    public function get_pilihan($subbID) {
        $this->db->select('*,pil.id_soal as pilid, soal.id_soal as soalid, pil.jawaban as piljawaban');
        $this->db->from('tb_banksoal soal');
        $this->db->join('tb_piljawaban pil', ' pil.id_soal= soal.id_soal');
        $this->db->where('id_subbab', $subbID);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jawabansoal($id) {
        $this->db->select('soal.id_soal as soalid, soal.jawaban as jawaban');
        $this->db->from('tb_mm-paketbank as paban');
        $this->db->join('tb_banksoal as soal', 'soal.id_soal = paban.id_soal');
        $this->db->where('paban.id_paket', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function durasipaket($id_paket) {
        $this->db->select('durasi');
        $this->db->from('tb_paket');
        $this->db->where('id_paket', $id_paket);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function inputreport($data) {
        $this->db->insert('tb_report-paket', $data);
    }

}

?>
