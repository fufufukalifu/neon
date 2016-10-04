<?php

class Mmatapelajaran extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function daftarMapel() {
        $this->db->select('*');
        $this->db->from('tb_mata-pelajaran');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function daftarMapelSD() {
        $this->db->select('tp.id, tp.tingkatID, tp.matapelajaranID, tp.keterangan,mp.namaMataPelajaran');
        $this->db->from('tb_mata-pelajaran mp');
        $this->db->from('tb_tingkat-pelajaran tp');
        $this->db->where('mp.id = tp.mataPelajaranID');
        $this->db->where('tingkatID', '1');
        $this->db->where('mp.status', '1');
        $this->db->where('tp.status', '1');

        $query = $this->db->get();
        return $query->result();
    }

    public function daftarMapelSMP() {
        $this->db->select('tp.id, tp.tingkatID, tp.matapelajaranID, tp.keterangan,mp.namaMataPelajaran');
        $this->db->from('tb_mata-pelajaran mp');
        $this->db->from('tb_tingkat-pelajaran tp');
        $this->db->where('mp.id = tp.mataPelajaranID');
        $this->db->where('tingkatID', '2');
        $this->db->where('mp.status', '1');
        $this->db->where('tp.status', '1');

        $query = $this->db->get();
        return $query->result();
    }

    public function daftarMapelSMA() {
        $this->db->select('tp.id, tp.tingkatID, tp.matapelajaranID, tp.keterangan,mp.namaMataPelajaran');
        $this->db->from('tb_mata-pelajaran mp');
        $this->db->from('tb_tingkat-pelajaran tp');
        $this->db->where('mp.id = tp.mataPelajaranID');
        $this->db->where('tingkatID', '3');
        $this->db->where('mp.status', '1');
        $this->db->where('tp.status', '1');

        $query = $this->db->get();
        return $query->result();
    }

    public function daftarMapelSMK() {
        $this->db->select('tp.id, tp.tingkatID, tp.matapelajaranID, tp.keterangan,mp.namaMataPelajaran');
        $this->db->from('tb_mata-pelajaran mp');
        $this->db->from('tb_tingkat-pelajaran tp');
        $this->db->where('mp.id = tp.mataPelajaranID');
        $this->db->where('tingkatID', '4');
        $this->db->where('mp.status', '1');
        $this->db->where('tp.status', '1');

        $query = $this->db->get();
        return $query->result();
    }

    public function tambahMP($data) {
        $this->db->insert('tb_mata-pelajaran', $data);
    }

    function hapusMP($id) {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('tb_mata-pelajaran');
    }

    function rubahMP($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('tb_mata-pelajaran', $data);
    }

    public function tambahtingkatMP($data) {
        $this->db->insert('tb_tingkat-pelajaran', $data);
    }

    function hapustingkatMP($id) {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('tb_tingkat-pelajaran');
    }

    function rubahtingkatMP($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('tb_tingkat-pelajaran', $data);
    }

    public function daftarBab($id) {
        $this->session->set_userdata('id_mp', $id);
        $this->db->select('*');
        $this->db->from('tb_bab');
        $this->db->where('tingkatPelajaranID', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function tambahbabMP($data) {
        $this->db->insert('tb_bab', $data);
    }

    function rubahbabMP($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('tb_bab', $data);
    }

    function hapusbabMP($id, $data) {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('tb_bab');
    }

    public function daftarsubBab($id) {
        $this->db->select('*');
        $this->db->from('tb_subbab');
        $this->db->where('babID', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function tambahsubbabMP($data) {
        $this->db->insert('tb_subbab', $data);
    }

    function rubahsubbabMP($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('tb_subbab', $data);
    }

    function hapussubbabMP($id, $data) {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('tb_subbab');
    }

    public function sc_bab_by_tingpel_id($tingpelID)
    {
        $this->db->where('tingkatPelajaranID', $tingpelID);
        $this->db->select('id, keterangan, judulBab')->from('tb_bab');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function sc_sub_by_subid($subid){
        $this->db->where('id', $subid);
        $this->db->select('judulSubBab')->from('tb_subbab');
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>