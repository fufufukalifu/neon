<?php

class Mlogin extends CI_Model {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    public function cekUser($username, $password) {
        $this->db->select('*');
        $this->db->from('tb_pengguna');
        $this->db->where('namaPengguna', $username);
        $this->db->where('kataSandi', $password);
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

}
?>

