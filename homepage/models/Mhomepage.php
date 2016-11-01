<?php

/**
 * 
 */
class Mhomepage extends CI_Model {
    # Start Function untuk form soal#	

    public function insert_pesan($data) {
        $this->db->insert('tb_pesan', $data);
    }
}

?>