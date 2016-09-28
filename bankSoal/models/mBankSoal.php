<?php

/**
 * 
 */
class MbankSoal extends CI_Model {
    # Start Function untuk form soal#	

    public function insert_soal($dataSoal) {
        $this->db->insert('tb_banksoal', $dataSoal);
    }

    public function get_soalID($UUID) {
        $this->db->where('UUID', $UUID);
        $this->db->select('id_soal')->from('tb_banksoal');
        $query = $this->db->get();
        return $query->result_array();
    }

    //insert pilihan jawaban berupa text
    public function insert_jawaban($dataJawaban) {
        $this->db->insert_batch('tb_piljawaban', $dataJawaban);
    }

    //insert pilihan jawaban berupa gambar
    public function insert_gambar($datagambar) {
        $this->db->insert_batch('tb_piljawaban', $datagambar);
        echo "masuk insert gambar";
        var_dump($datagambar);
    }

    # END Function untuk form soal#

    public function get_pelajaran($tingkatID) {
        $this->db->where('tingkatID', $tingkatID);
        $this->db->select('*')->from('tb_tingkat-pelajaran');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_bab($tingkatPelajaranID) {
        $this->db->where('tingkatPelajaranID', $tingkatPelajaranID);
        $this->db->select('*')->from('tb_bab');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_subbab($babID) {
        $this->db->where('babID', $babID);
        $this->db->select('*')->from('tb_subbab');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_soal($subbID) {
        $this->db->select('*');
        $this->db->from('tb_banksoal soal');
        $this->db->where('id_subbab', $subbID);
        $query = $this->db->get();
        return $query->result_array();
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

    # Start Function untuk form update soal#

    public function ch_soal($data) {
        $this->db->set($data['dataSoal']);
        $this->db->where('UUID', $data['UUID']);
        $this->db->update('tb_banksoal');
    }

    public function get_onesoal($UUID) {
        $this->db->where('UUID', $UUID);
        $this->db->select('*')->from('tb_banksoal');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_piljawaban($id_soal) {
        $this->db->where('id_soal', $id_soal);
        $this->db->select('*')->from('tb_piljawaban');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_oldgambar($soalID) {
        $this->db->where('id_soal', $soalID);
        $this->db->select('id_pilihan,gambar')->from('tb_piljawaban');
        $query = $this->db->get();
        return $query->result_array();
    }

    //function untuk update pilihan jawaban text
    public function ch_jawaban($data) {
        $this->db->update_batch('tb_piljawaban', $data['dataJawaban'], 'id_pilihan');
    }

    public function ch_gambar($datagambar) {
        $this->db->update_batch('tb_piljawaban', $datagambar, 'id_pilihan');
        // var_dump($datagambar);
    }

    # END Function untuk form update soal#
    # Start Function untuk form delete bank soal#
    //dalam pengahapusan data bank soal tidak benar2 di hapus tetapi status di rubah dari 1 -> 0

    public function del_banksoal($data) {
        $this->db->where('id_soal', $data);
        $this->db->set('status', '0');
        $this->db->update('tb_banksoal');
    }

    # END Function untuk form delete bank soal#
}

?>