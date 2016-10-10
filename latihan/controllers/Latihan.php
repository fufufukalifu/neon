<?php
/**
 *
 */
class Latihan extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mlatihan');
        $this->load->library('parser');
        $this->load->model('video/mvideos');
        $this->load->model('matapelajaran/Mmatapelajaran');
    }

    public function tambah_latihan_ajax() {

        //uuid untuk soal

        $uuid_latihan = uniqid();
        var_dump($uuid_latihan);
       $idsub = $_POST['subab'];
       $jumlah_soal = $_POST['jumlahsoal'];
       $kesulitan = $_POST['kesulitan'];

         // $idsub =  32;
         // $jumlah_soal =  2;
         // $kesulitan =  "mudah";
//        untuk halaman
        $data = array(
            'judul_halaman' => 'Latihan - Neon',
            'judul_header' => 'Latihan'
        );
        //get nama mata pelajaran untuk nama paket
        $nama_matapelajaran = $this->mvideos->get_pelajaran_for_paket($idsub)[0]->aliasMataPelajarans;
        //get nama sub bab untuk digabungkan jadi Nama Matapelajaran - Nama Subab
        $nama_subab = $this->Mmatapelajaran->sc_sub_by_subid($idsub)[0]['judulSubBab'];
        
            $data['post'] = array(
            "jumlahSoal" => $jumlah_soal,
            "tingkatKesulitan" => $kesulitan,
            "nm_latihan" => $nama_matapelajaran . "-" . $nama_subab,
            "create_by" => $this->session->userdata['USERNAME'],
            "uuid_latihan" => $uuid_latihan,
            "id_subbab" => $idsub
        );

        
        $param = array(
            "id_subab" => $idsub,
            "jumlah_soal" => $jumlah_soal,
            "kesulitan" => $kesulitan
        );
        // insert ke soal
        $this->mlatihan->insert($data['post']);
        $id_latihan = $this->mlatihan->get_latihan_by_uuid($uuid_latihan)[0]['id_latihan'];
        $this->session->set_userdata('id_latihan', $id_latihan);
        // get soal randoom
        $data['soal_random'] = $this->mlatihan->get_random_for_latihan($param);
        // $data['mm_sol']=array();
        //ngecacah teru dimasukin ke relasi
        foreach ($data['soal_random'] as $row) {
            $data['mm_sol'] = array(
                "id_latihan" => $id_latihan,
                "id_soal" => $row['id_soal']
            );
            // print_r($data['mm_sol']); echo "<br>";
            $this->mlatihan->insert_tb_mm_sol_lat($data['mm_sol']);
        };
        // print_r($data['mm_sol']);
        // $data['pilihan']=$this->mlatihan->get_piljawaban($id_soal);
        // print_r($data['banksoal']);
    }

    public function formlatihan() {

        $data = array(
            'judul_halaman' => 'Netjoo - Welcome',
            'judul_header' => 'Welcome'
        );

        $data['files'] = array(
            APPPATH . 'modules/homepage/views/v-header-login.php',
            APPPATH . 'modules/templating/views/t-f-pagetitle.php',
            APPPATH . 'modules/homepage/views/v-footer.php',
        );


        $this->parser->parse('templating/index', $data);
    }

}

?>
