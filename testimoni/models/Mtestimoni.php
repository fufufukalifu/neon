<?php

class Mtestimoni extends CI_Model {
    #Start function pengaturan profile siswa#

    public function tampil_testimoni() {
        $this->db->select('*');
        $this->db->from('tb_testimoni as testi');
        $this->db->join('tb_siswa as siswa','testi.id_user = siswa.penggunaID');
        $this->db->where('testi.status',1);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_pesan($idtestimoni) {
        $this->db->set('status', 0);
        $this->db->where('id_testimoni', $idtestimoni);
        $this->db->update('tb_testimoni');
    }
    
    function addtestimoni($data) {
        $this->db->insert('tb_testimoni', $data);
    }

}

?>