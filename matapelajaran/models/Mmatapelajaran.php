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
//        $idmp= "tp.mataPelajaranID";
        $this->db->select('mp.id, tp.keterangan,mp.namaMataPelajaran');
        $this->db->from('tb_mata-pelajaran mp');
        $this->db->from('tb_tingkat-pelajaran tp');
        $this->db->where('mp.id = tp.mataPelajaranID');
        $this->db->where('tingkatID','1');
        
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

}

?>