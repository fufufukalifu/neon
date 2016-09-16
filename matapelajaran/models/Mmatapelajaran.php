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

    public function tambahMP($data) {
        $this->db->insert('tb_mata-pelajaran', $data);
    }

    function hapusMP($id) {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('tb_mata-pelajaran');
    }

}

?>