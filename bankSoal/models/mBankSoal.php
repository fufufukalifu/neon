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
        $this->db->where('publish', 1);
        $this->db->where('status', 1);
        
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
        $this->db->select('id_soal,sumber,kesulitan,judul_soal,jawaban,UUID,publish,random,soal,tp.keterangan,soal.id_subbab');
        $this->db->from('tb_tingkat-pelajaran tp');
        $this->db->join('tb_bab bab','bab.tingkatPelajaranID=tp.id');
        $this->db->join('tb_subbab subbab','subbab.babID = bab.id');
        $this->db->join('tb_banksoal soal', 'subbab.id = soal.id_subbab');
        $this->db->where('id_subbab', $subbID);
        $this->db->where('soal.status','1');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    //get pilihan berdasarkan subbab MP
    public function get_pilihan($subbID) {
        $this->db->select('*,pil.id_soal as pilID, soal.id_soal as soalID, pil.jawaban as jawabanBenar');
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

    //get old gambar soal

    public function get_oldgambar_soal($UUID)
    {
        $this->db->where('UUID', $UUID);
        $this->db->select('id_soal,gambar_soal')->from('tb_banksoal');
        $query = $this->db->get();
        return $query->result_array();
    }

    //get old gambar pilihan jawaban
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

    //
    public function get_allsoal()
    {
        $this->db->select('id_soal,sumber,kesulitan,judul_soal,jawaban,UUID,publish,random,soal,tp.keterangan,soal.id_subbab');
        $this->db->from('tb_tingkat-pelajaran tp');
        $this->db->join('tb_bab bab','bab.tingkatPelajaranID=tp.id');
        $this->db->join('tb_subbab subbab','subbab.babID = bab.id');
        $this->db->join('tb_banksoal soal', 'subbab.id = soal.id_subbab');
        $this->db->where('soal.status','1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_allpilihan()
    {
        $this->db->select('*,pil.id_soal as pilID, soal.id_soal as soalID, pil.jawaban as jawabanBenar');
        $this->db->from('tb_banksoal soal');
        $this->db->join('tb_piljawaban pil', ' pil.id_soal= soal.id_soal');
        $query = $this->db->get();
        return $query->result_array();
    }

    #ambil soal yang belum terdaftar dalam paket soal.
    public function get_soal_terdaftar($data){
        $myquery = 
        "SELECT * FROM `tb_banksoal` bank
            WHERE bank.publish = 1
            AND bank.status = 1
            AND bank.id_soal NOT IN
            (
             SELECT pb.id_soal
             FROM `tb_banksoal` b
             JOIN `tb_mm-paketbank` pb 
             ON pb.`id_soal`= b.`id_soal`
             JOIN `tb_subbab` sub
             ON sub.`id` = pb.`id_subbab`
             JOIN `tb_paket` p ON
             p.`id_subbab` = sub.`id`
             WHERE pb.`id_subbab` = 32 
            AND p.`id_paket` = 7
            )
        ";

        $query = $this->db->get();
        return $query->result_array();
    }
}

?>