<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('parser');
        $this->load->model('guru/mGuru');
        $this->load->model('siswa/mSiswa');
        $this->load->model('matapelajaran/mmatapelajaran');
        $this->load->model('video/mvideos');
    }

    public function index() {
        $datas['jumlahGuru'] = $this->mGuru->get_teachers_number();
        $datas['jumlahMapel'] = $this->mmatapelajaran->get_courses_number();
        $datas['jumlahSiswa'] = $this->mSiswa->get_siswa_numbers();
        $datas['jumlahVideo'] = $this->mvideos->get_numbers_all_video();




        $data = array(
        'judul_halaman' => 'Neon Homepage',
        'jumlah_guru' => $datas['jumlahGuru'],
        'jumlah_siswa' => $datas['jumlahSiswa'],
        'jumlah_mapel' => $datas['jumlahMapel'],
        'jumlah_video'=> $datas['jumlahVideo']


        );
        $data['file'] = 'v-container.php';
        $data['teachers'] = $this->mGuru->get_guru_random();
        // print_r($datas['jumlahGuru']);
        $this->parser->parse('v-index-homepage', $data);
    }

}
