<?php

class Login extends MX_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
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

    public function user() {
        if ($this->session->userdata('HAKAKSES') == 'user') {
            $this->load->view('templating/t-header');
            $this->load->view('templating/t-navbarUser');
            $this->load->view('vUser.php');
            $this->load->view('templating/t-footer1');
        } else {
            redirect(base_url('index.php/login'));
        }
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
                    redirect(base_url('index.php/login/user'));
//                    echo 'admin';
//                    redirect(site_url('peserta-free'));
                } elseif ($hakAkses == 'guru') {
                    echo 'guru';
//                    redirect(site_url('peserta-berbayar'));
                } elseif ($hakAkses == 'murid') {
//                    redirect(site_url('peserta-bimbel'));
                } elseif ($hakAkses == 'user') {
		    echo 'murid';
                   	$this->user();
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
        redirect(base_url('index.php/login'));
    }

}

?>