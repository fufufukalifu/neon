<?php

class Mmatapelajaran extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function daftarMapel() {
        $this->db->select('*');
        $this->db->from('tb_mata-pelajaran');
        $query = $this->db->get();
        return $query->result();
    }

}

?>