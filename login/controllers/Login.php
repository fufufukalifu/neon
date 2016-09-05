<?php

class Login extends MX_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('facebook');
        $this->load->helper('url');
        $this->load->model('Mlogin');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('templating/t-header');
        $this->load->view('templating/t-navbar');
        $this->load->view('vLogin.php');
        $this->load->view('templating/t-footer');
    }

    //Fungsi untuk login, mengecek username dan password
    public function validasiLogin() {
        $username = htmlspecialchars($this->input->post('username'));
        $password = md5($this->input->post('password'));

        if ($result = $this->Mlogin->cekUser($username, $password)) {
            //variabelSession

            $sess_array = array();
            foreach ($result as $row) {

                $hakAkses = $row->hakAkses;
                //membuat session
                $sess_array = array(
                    'id' => $row->id,
                    'USERNAME' => $row->namaPengguna,
                    'HAKAKSES' => $row->hakAkses,
                );
                $this->session->set_userdata($sess_array);

                if ($hakAkses == 'admin') {
//                    redirect(base_url('index.php/login/user'));
//                    echo 'admin';
//                    redirect(site_url('peserta-free'));
                } elseif ($hakAkses == 'guru') {
                    echo 'guru';
                    redirect(site_url('guru/dashboard')); 
                } elseif ($hakAkses == 'siswa') {
                    redirect(site_url('welcome'));
                } elseif ($hakAkses == 'user') {
//                   	redirect(site_url('welcome'));
                } else {
                    echo 'tidak ada hak akses';
                }
            }
            return TRUE;
        } else {
            echo 'gagal login';
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata("id");
        $this->session->unset_userdata("USERNAME");
        $this->session->unset_userdata("HAKAKSES");
        $this->facebook->destroy_session();
        redirect(base_url());
    }

}

?>