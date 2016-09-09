<?php

class Mregister extends CI_Model {

    private $verifikasiCode; //menampung code verifikasi email  

    //merupakan function untuk menyimpan data guru ke tabel guru di databse netjoo  

    public function insert_guru($data_guru, $data_akun) {
        $this->db->insert('tb_guru', $data_guru);

        if ($this->db->affected_rows() === 1) {
            $penggunaID = $data_guru['penggunaID'];
            $this->set_verifikasicode($penggunaID);
            $this->session->set_userdata($data_akun);
            $this->send_verifikasi_email();
        } else {
            echo"masuk else"; //for testign
        }
    }

    //merupakan function untuk menyimpan data guru ke tabel penggunas di databse netjoo  
    public function insert_pengguna($data) {

        $this->db->insert('tb_pengguna', $data);
    }

    //merupakan function untuk menyimpan data guru ke tabel siswa di databse netjoo  
    public function insert_siswa($data_siswa, $data_akun) {
        $this->db->insert('tb_siswa', $data_siswa);

        if ($this->db->affected_rows() === 1) {
            $penggunaID = $data_siswa['penggunaID'];
            $this->set_verifikasicode($penggunaID);
            $this->session->set_userdata($data_akun);
            $this->send_verifikasi_email();
            // redirect(base_url('index.php/register/verifikasiemail'));
        } else {
            echo"masuk else";
        }
    }

    //untuk mngambil nilai id penngguna untuk digunakan FK di tb_siswa
    public function get_idPengguna($data) {
        $this->db->where('namaPengguna', $data);
        $this->db->select('id')->from('tb_pengguna');
        $query = $this->db->get();
        return $query->result_array();
    }

    //set verifikasi code untuk memverifikasi email
    private function set_verifikasicode($penggunaID) {
        $sql = "SELECT regTime FROM tb_pengguna WHERE id= '" . $penggunaID . "'";
        $result = $this->db->query($sql);
        $row = $result->row();
        $this->verifikasiCode = md5((string) $row->regTime);
    }

    // function untuk mengirim code verifikasi email ke email user/siswa 
    public function send_verifikasi_email() {

        $this->load->library('email'); // load email library
        $verifikasiCode = $this->verifikasiCode;
        $address = $this->session->userdata['eMail'];
        $this->email->from('noreply@sibejooclass.com', 'Netjoo');
        $this->email->to($address);
        $this->email->subject('Verifikasi Email');
        $message = '<html><meta/><head/><body>';
        $message .='<p> Dear' . $this->session->userdata['namaPengguna'] . ',</p>';
        $message .='<p>Terimakasih telah mendaftar di netjoo. Silahkan <strong><a href="' . base_url() . 'index.php/register/verifikasi_email/' . $address . '/' . $verifikasiCode . '">klik disini</a></strong> untuk aktifasi akun anda. Setelah Aktifasi akun anda, anda akan bla2x</p>';
        $message .= '<p>Terimakasih</p>';
        $message .= '<p>Netjoo</p>';
        $message .= '</body></html>';
        $this->email->message($message);
        if ($this->email->send())
            echo "Mail Sent!"; //untuk testing
        else
            echo "There is error in sending mail!"; //untuk testing
    }

    public function verifikasi_email($address, $code) {
        $sql = "SELECT regTime FROM tb_pengguna WHERE eMail = '" . $address . "'";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() === 1) {
            if (md5((string) $row->regTime) === $code)
                $result = $this->aktifasi_akun($address);
            if ($result === true) {
                echo "akun telah di aktifasi"; // for testing
            } else {
                echo "gagal di aktifasi"; //for testing
            }
        } else {
            //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        }
    }

    //funtion updatae aktivasi email 
    public function aktifasi_akun($address) {
        if ($address == $this->session->userdata['eMail']) {
            $this->db->where('eMail', $address);
            $this->db->set('aktivasi', '1');
            $this->db->update('tb_pengguna');
            return true;
        } else {
            return false;
        }
    }

    //cek user dari validasi email
    public function cekUser($email) {
        $this->db->select('*');
        $this->db->from('tb_pengguna');
        $this->db->where('eMail', $email);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            echo "ada akun";
            return $query->result(); //if data is true
        } else {
            echo 'tidak ada akun';
            return false; //if data is wrong
        }
    }

    //function untuk merubah aktivasi email
    public function update_email_ak($email)
    {   
        $id=$this->session->userdata['id'];
        $this->db->where('id',$id);
        $this->db->set('eMail',$email);
        $this->db->update('tb_pengguna');
        $sess_array = array( 'eMail'    => $email);
        $this->session->set_userdata($sess_array);

    }
    //function unutk dropdown mata pelajran
    public function get_matapelajaran()
    {
        $this->db->select('id,aliasMataPelajaran')->from('tb_mata-pelajaran');
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>