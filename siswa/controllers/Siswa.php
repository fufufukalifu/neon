<?php

/**
 *
 */
class Siswa extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'msiswa' );
        $this->load->helper( 'session' );
        sessionkonfirm();
        get_session_siswa();
    }

    //

    public function profilesetting() {
        $data['siswa'] = $this->msiswa->get_datsiswa();
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'templating/t-navbarUser' );
        $this->load->view( 'vPengaturanProfile', $data );
        $this->load->view( 'templating/t-footer' );
        
    }

    public function index() {
        $data['siswa'] = $this->msiswa->get_datsiswa();
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'templating/t-navbarUser' );
        $this->load->view( 't-profile-siswa', $data );
        $this->load->view( 'templating/t-footer' );

    }

    //menampilkan halaman pengaturan profile
    public function PengaturanProfile() {
        $data['tb_siswa'] = $this->msiswa->get_datsiswa();
        $this->load->view( 'templating/t-header' );
        $this->load->view( 'templating/t-navbarUser' );
        $this->load->view( 'vPengaturanProfile', $data );
        $this->load->view( 'templating/t-footer' );
    }

    public function ubahprofilesiswa() {
        //load library n helper
        $this->load->helper( array( 'form', 'url' ) );
        $this->load->library( 'form_validation' );

        //syarat pengisian form perubahan profile
        $this->form_validation->set_rules( 'namadepan', 'Nama Depan', 'required' );
        $this->form_validation->set_rules( 'alamat', 'Alamat', 'required' );
        $this->form_validation->set_rules( 'nokontak', 'No Kontak', 'required' );
        ;

        //pesan error atau pesan kesalahan pengisian form
        $this->form_validation->set_message( 'is_unique', '*Nama Pengguna sudah terpakai' );
        $this->form_validation->set_message( 'max_length', '*Nama Pengguna maksimal 12 karakter!' );
        $this->form_validation->set_message( 'min_length', '*Nama Pengguna minimal 5 karakter!' );
        $this->form_validation->set_message( 'required', '*tidak boleh kosong!' );



        if ( $this->form_validation->run() == FALSE ) {
            $data['siswa'] = $this->msiswa->get_datsiswa();
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'vPengaturanProfile', $data );
            $this->load->view( 'templating/t-footer' );
        } else {
            $namaDepan = htmlspecialchars( $this->input->post( 'namadepan' ) );
            $namaBelakang = htmlspecialchars( $this->input->post( 'namabelakang' ) );
            $alamat = htmlspecialchars( $this->input->post( 'alamat' ) );
            $noKontak = htmlspecialchars( $this->input->post( 'nokontak' ) );
            $biografi = htmlspecialchars( $this->input->post( 'biografi' ) );
            $namaSekolah = htmlspecialchars( $this->input->post( 'namasekolah' ) );
            $alamatSekolah = htmlspecialchars( $this->input->post( 'alamatsekolah' ) );


            $data_post = array(
                'namaDepan' => $namaDepan,
                'namaBelakang' => $namaBelakang,
                'alamat' => $alamat,
                'noKontak' => $noKontak,
                'biografi' => $biografi,
                'namaSekolah' => $namaSekolah,
                'alamatSekolah' => $alamatSekolah,
            );

            $this->msiswa->update_siswa( $data_post );
        }
    }

    public function ubahemailsiswa() {

        //load library n helper
        $this->load->helper( array( 'form', 'url' ) );
        $this->load->library( 'form_validation' );


        //load library n helper
        $this->load->helper( array( 'form', 'url' ) );
        $this->load->library( 'form_validation' );

        //syarat pengisian form perubahan nama pengguna dan email

        $this->form_validation->set_rules( 'email', 'email', 'required|is_unique[tb_pengguna.eMail]' );

        //pesan error atau pesan kesalahan pengisian form
        $this->form_validation->set_message( 'is_unique', '*Email sudah terpakai' );
        $this->form_validation->set_message( 'required', '*tidak boleh kosong!' );


        if ( $this->form_validation->run() == FALSE ) {
            $data['siswa'] = $this->msiswa->get_datsiswa();
            sessionkonfirm();
            sessionsiswa();
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'vPengaturanProfile', $data );
            $this->load->view( 'templating/t-footer' );
        } else {
            $email = htmlspecialchars( $this->input->post( 'email' ) );

            $data_post = array(
                'eMail' => $email,
            );
            $this->msiswa->update_email( $data_post );
        }
    }

    public function ubahkatasandi() {

        //load library n helper
        $this->load->helper( array( 'form', 'url' ) );
        $this->load->library( 'form_validation' );


        //syarat pengisian form perubahan pasword
        $this->form_validation->set_rules( 'sandilama', 'Kata Sandi Lama', 'required' );
        $this->form_validation->set_rules( 'newpass', 'Kata Sandi Baru', 'required|matches[verifypass]' );
        $this->form_validation->set_rules( 'verifypass', 'Password Confirmation', 'required' );

        //pesan error atau pesan kesalahan pengisian form
        $this->form_validation->set_message( 'required', '*tidak boleh kosong!' );
        $this->form_validation->set_message( 'matches', '*Kata Sandi tidak sama!' );


        if ( $this->form_validation->run() == FALSE ) {
            $data['siswa'] = $this->msiswa->get_datsiswa();
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'vPengaturanProfile', $data );
            $this->load->view( 'templating/t-footer' );
        } else {
            $kataSandi = htmlspecialchars( md5( $this->input->post( 'newpass' ) ) );
            $inputSandi = htmlspecialchars( md5( $this->input->post( 'sandilama' ) ) );
            $data_post = array( 'kataSandi' => $kataSandi, );
            $data['pengguna'] = $this->msiswa->get_password()[0];
            $kataSandi = $data['pengguna']['kataSandi'];
            var_dump( $kataSandi );
            if ( $kataSandi == $inputSandi ) {
                $this->msiswa->update_katasandi( $data_post );
            } else {
                // code...
                echo "salah"; //for testing
            }
        }
    }

    public function upload($oldphoto) {
       unlink( FCPATH . "./assets/image/photo/siswa/".$oldphoto );
        $config['upload_path'] = './assets/image/photo/siswa';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library( 'upload', $config );

        if ( !$this->upload->do_upload( 'photo' ) ) {


            $data['error'] = array( 'error' => $this->upload->display_errors() );
            $data['siswa'] = $this->msiswa->get_datsiswa();
            $this->load->view( 'templating/t-header' );
            $this->load->view( 'templating/t-navbarUser' );
            $this->load->view( 'vPengaturanProfile', $data );

            $this->load->view( 'templating/t-footer' );


            // $this->load->view('beranda/main_view',$error);,

        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            $this->msiswa->update_photo( $photo );
            echo "berhasil upload"; //for testing
            // $data['img'] = base_url().'/images/'.$file_data['file_name'];
            // $this->load->view('beranda/success_msg',$data);
        }
    }

}

?>
