<?php

class Register extends MX_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('mregister');
        $this->load->model('siswa/msiswa');

    }

    // function untuk menampikan halam pertama saat registrasi
    public function index() {
        $this->load->view('templating/t-header');
        $this->load->view('vRegisterSiswa');
        $this->load->view('templating/t-footer');
    }

    // function untuk menampilkan halaman untuk pendaftaran user siswa
    public function registersiswa() {
        $this->load->view('templating/t-header');
        $this->load->view('vRegisterSiswa');
        $this->load->view('templating/t-footer');
    }

    //function untuk menampilkan halaman pendaftaran Guru
    public function registerguru() {
       $data['mataPelajaran'] = $this->mregister->get_matapelajaran();
       $this->load->view('templating/t-header');
       $this->load->view('vRegisterGuru',$data);
         // var_dump( $data['mataPelajaran']); for testing
   }

   public function verifikasiemail() {
    $this->load->view('vVerifikasi');
}

    //function untuk menyimpan data pendaftaran user siswa ke database
public function savesiswa() {
        //load library n helper
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

        //syarat pengisian form regitrasi siswa
    $this->form_validation->set_rules('namapengguna', 'Nama Pengguna', 'trim|required|min_length[5]|max_length[12]|is_unique[tb_pengguna.namaPengguna]');
    $this->form_validation->set_rules('namadepan', 'Nama Depan', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('nokontak', 'No Kontak', 'required');
    $this->form_validation->set_rules('katasandi', 'Kata Sandi', 'required|matches[passconf]|min_length[5]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_pengguna.email]');


        //pesan error atau pesan kesalahan pengisian form registrasi siswa
    $this->form_validation->set_message('is_unique', '*Nama Pengguna atau email sudah terpakai');
    $this->form_validation->set_message('max_length', '*Nama Pengguna maksimal 12 karakter!');
    $this->form_validation->set_message('min_length', '*Inputan minimal 6 karakter!');
    $this->form_validation->set_message('required', '*tidak boleh kosong!');
    $this->form_validation->set_message('matches', '*Kata Sandi tidak sama!');
    $this->form_validation->set_message('valid_email', '*silahkan masukan alamat email anda dengan benar');

        //pengecekan pengisian form regitrasi siswa
    if ($this->form_validation->run() == FALSE) {
            //jika tidak memenuhi syarat akan menampilkan pesan error/kesalahan di halaman regitrasi siswa
     $data['mataPelajaran'] = $this->mregister->get_matapelajaran();
     $this->load->view('templating/t-header');
     $this->load->view('vRegisterGuru',$data);
 } else {

            //data siswa
    $namaDepan = htmlspecialchars($this->input->post('namadepan'));
    $namaBelakang = htmlspecialchars($this->input->post('namabelakang'));
    $alamat = htmlspecialchars($this->input->post('alamat'));
    $noKontak = htmlspecialchars($this->input->post('nokontak'));
    $namaSekolah = htmlspecialchars($this->input->post('namasekolah'));
    $alamatSekolah = htmlspecialchars($this->input->post('alamatsekolah'));

            //data akun
    $namaPengguna = htmlspecialchars($this->input->post('namapengguna'));
    $kataSandi = htmlspecialchars(md5($this->input->post('katasandi')));
    $email = htmlspecialchars($this->input->post('email'));
    $hakAkses = 'siswa';

            //data array akun
    $data_akun = array(
        'namaPengguna' => $namaPengguna,
        'kataSandi' => $kataSandi,
        'eMail' => $email,
        'hakAkses' => $hakAkses,
        );


            //melempar data guru ke function insert_pengguna di kelas model
    $data['mregister'] = $this->mregister->insert_pengguna($data_akun);
            //untuk mengambil nilai id pengguna untuk di jadikan FK pada tabel siswa
    $data['tb_pengguna'] = $this->mregister->get_idPengguna($namaPengguna)[0];

    $penggunaID = $data['tb_pengguna']['id'];

            //session buat id
    $id_arr=array('id'=>$penggunaID);
    $this->session->set_userdata($id_arr);

            //data array siswa
    $data_siswa = array(
        'namaDepan' => $namaDepan,
        'namaBelakang' => $namaBelakang,
        'alamat' => $alamat,
        'noKontak' => $noKontak,
        'namaSekolah' => $namaSekolah,
        'alamatSekolah' => $alamatSekolah,
        'penggunaID' => $penggunaID,
        );

            //melempar data guru ke function insert_guru di kelas model
    $data['mregister'] = $this->mregister->insert_siswa($data_siswa, $data_akun);
    redirect(site_url('register/verifikasi'));
}
}

    // function untuk menampung data dari form kemudian di lempar 
    // ke function insert_guru dan insert_pengguna di kelas model Mregister
public function saveguru() {
        //load library n helper
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

        //syarat pengisian form regitrasi guru
    $this->form_validation->set_rules('namapengguna', 'Nama Pengguna', 'trim|required|min_length[6]|max_length[12]|is_unique[tb_pengguna.namaPengguna]');
    $this->form_validation->set_rules('namadepan', 'Nama Depan', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('nokontak', 'No Kontak', 'required');
    $this->form_validation->set_rules('katasandi', 'Kata Sandi', 'required|min_length[6]|matches[passconf]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_pengguna.email]');


        //pesan error atau pesan kesalahan pengisian form registrasi guru
    $this->form_validation->set_message('namapengguna', 'is_unique', '*Nama Pengguna sudah terpakai');
    $this->form_validation->set_message('is_unique', 'email', '*Email sudah terpakai');
    $this->form_validation->set_message('is_unique', '*Nama Pengguna sudah terpakai');
    $this->form_validation->set_message('max_length', '*Nama Pengguna maksimal 12 karakter!');
    $this->form_validation->set_message('min_length', '*Inputan minimal 6 karakter!');
    $this->form_validation->set_message('required', '*tidak boleh kosong!');
    $this->form_validation->set_message('matches', '*Kata Sandi tidak sama!');



    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templating/t-header');
        $this->load->view('vRegisterGuru');
    } else {
            //data guru
        $namaDepan = htmlspecialchars($this->input->post('namadepan'));
        $namaBelakang = htmlspecialchars($this->input->post('namabelakang'));
        $mataPelajaranID = htmlspecialchars($this->input->post('mataPelajaran'));
        $alamat = htmlspecialchars($this->input->post('alamat'));
        $noKontak = htmlspecialchars($this->input->post('nokontak'));

            //data untuk akun
        $namaPengguna = htmlspecialchars($this->input->post('namapengguna'));
        $kataSandi = htmlspecialchars(md5($this->input->post('katasandi')));
        $email = htmlspecialchars($this->input->post('email'));
        $hakAkses = 'guru';

            //data array akun
        $data_akun = array(
            'namaPengguna' => $namaPengguna,
            'kataSandi' => $kataSandi,
            'eMail' => $email,
            'hakAkses' => $hakAkses,
            );



            //melempar data guru ke function insert_pengguna di kelas model
        $data['mregister'] = $this->mregister->insert_pengguna($data_akun);

            //untuk mengambil nilai id pengguna untuk di jadikan FK pada tabel siswa
        $data['tb_pengguna'] = $this->mregister->get_idPengguna($namaPengguna)[0];
        $penggunaID = $data['tb_pengguna']['id'];

            //data array guru
        $data_guru = array(
            'namaDepan' => $namaDepan,
            'namaBelakang' => $namaBelakang,
            'alamat' => $alamat,
            'noKontak' => $noKontak,
            'mataPelajaranID'=>$mataPelajaranID,
            'penggunaID' => $penggunaID,
            );

            //melempar data guru ke function insert_guru di kelas model
        $data['mregister'] = $this->mregister->insert_guru($data_guru, $data_akun);
        redirect(site_url('register/verifikasi'));
    }
}

public function verifikasi_email($address, $code) {
    $this->load->model('login/Mlogin');
    $code = trim($code);
    $this->mregister->verifikasi_email($address, $code);

    if ($result = $this->mregister->cekUser($address)) {
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


    //halam untulk memnberitahu link aktivassi ke email atau untuk meresen email
public function verifikasi() {
    $this->load->view('templating/t-header');
    $this->load->view('vVerifikasi.php');
    $this->load->view('templating/t-footer');
}


    //function untuk mengirim urang aktivasi ke email
public function resend_mail()
{   
        echo "masuk resen";//for testing
        $this->mregister->send_verifikasi_email();
        redirect(site_url('register/verifikasi'));

    }

    //function untuk mengganti email aktivasi akun
    public function ch_mail_aktivasi ()
    {   
          //load library n helper
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        echo "masuk function ch_mail_aktifasi";



        //set rule untuk inputan email agar email yg dinputkan uniq
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_pengguna.email]');
        //set pesan untuk inputan kesalahan email telah digunkan
        $this->form_validation->set_message('is_unique', '*Email sudah terpakai');
        

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templating/t-header');
            $this->load->view('vVerifikasi.php');
            $this->load->view('templating/t-footer');
        }else{
            $email = htmlspecialchars($this->input->post('email'));
            var_dump($email);
            $this->mregister->update_email_ak($email);
            $this->mregister->send_verifikasi_email();
        }

    }

}

?>