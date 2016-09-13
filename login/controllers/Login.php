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
        $this->facebookIdentity();
//        $this->load->view('vLogin.php');
        $this->load->view('templating/t-sessionlogin');
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
                    'AKTIVASI' => $row->aktivasi,
                    'eMail'    => $row->eMail
                );
                $this->session->set_userdata($sess_array);

                if ($hakAkses == 'admin') {
//                    redirect(base_url('index.php/login/user'));
//                    echo 'admin';
//                    redirect(site_url('peserta-free'));
                } elseif ($hakAkses == 'guru') {
                    $guru = $this->Mlogin->cekGuru($this->session->userdata['id']);
                    foreach ($guru as $value) {
                        $this->session->set_userdata('id_guru', $value->id);
                    }
                    redirect(site_url('guru/dashboard/'));
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
            $this->session->set_flashdata('notif', ' Username atau password salah');
            redirect(site_url('login'));
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata("id");
        $this->session->unset_userdata("USERNAME");
        $this->session->unset_userdata("HAKAKSES");
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();

        $this->session->set_flashdata('notif', ' Terimakasih sudah belajar bersama kami');
        redirect(site_url('login'));
    }

    public function konfirmasi() {
        $this->load->view('templating/t-header');
//        $this->load->view('templating/t-sessionKonfirm');
        $this->load->view('vKonfirmasi.php');
        $this->load->view('templating/t-footer');
    }

    public function facebookIdentity() {
        // Include the facebook api php libraries
        include_once APPPATH . "libraries/facebook-api-php-codexworld/facebook.php";

        // Facebook API Configuration
        $appId = '303600290003894';
        $appSecret = 'ac2f5e4c92821409ccc160928a5a70a6';
        $redirectUrl = base_url() . 'index.php/login';
        $fbPermissions = 'email';

        //Call Facebook API
        $facebook = new Facebook(array(
            'appId' => $appId,
            'secret' => $appSecret
        ));

        $fbuser = $facebook->getUser();
        if ($fbuser) {
            $userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,picture');
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];

            $userData['email'] = $userProfile['email'];
            $userData['aktivasi'] = '1';
            $userData['hakAkses'] = 'siswa';

            $siswaData['namaDepan'] = $userProfile['first_name'];
            $siswaData['namaBelakang'] = $userProfile['last_name'];
            $siswaData['photo'] = $userProfile['picture']['data']['url'];
            // Insert or update user data
            $userID = $this->Mlogin->checkUserFb($userData, $siswaData);
            if (!empty($userID)) {
                $data['userData'] = $userData;
                $this->session->set_userdata('userData', $userData);
            } else {
                $data['userData'] = array();
            }
            $this->createSession($userData['email']);
        } else {
            $fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri' => $redirectUrl, 'scope' => $fbPermissions));
        }
        $this->load->view('vLogin.php', $data);
    }

    public function createSession($userID) {
        if ($result = $this->Mlogin->cekUser3($userID)) {
            //variabelSession
            $sess_array = array();
            foreach ($result as $row) {

                $hakAkses = $row->hakAkses;
                //membuat session
                $sess_array = array(
                    'id' => $row->id,
                    'USERNAME' => $row->namaPengguna,
                    'HAKAKSES' => $row->hakAkses,
                    'AKTIVASI' => $row->aktivasi
                );
                $this->session->set_userdata($sess_array);

                if ($hakAkses == 'admin') {
//                    redirect(base_url('index.php/login/user'));
//                    echo 'admin';
//                    redirect(site_url('peserta-free'));
                } elseif ($hakAkses == 'guru') {
                    $guru = $this->Mlogin->cekGuru($this->session->userdata['id']);
                    foreach ($guru as $value) {
                        $this->session->set_userdata('id_guru', $value->id);
                    }
                    redirect(site_url('guru/dashboard/'));
                } elseif ($hakAkses == 'siswa') {
                    redirect(site_url('welcome'));
                } elseif ($hakAkses == 'user') {
//                   	redirect(site_url('welcome'));
                } else {
                    echo 'tidak ada hak akses';
                }
            }
            return TRUE;
        }
    }
}

?>