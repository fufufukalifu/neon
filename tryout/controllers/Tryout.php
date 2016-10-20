<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Tryout extends MX_Controller {

    public function __construct() {
        $this->load->library('parser');
        $this->load->model('Tryout_model');
//        $this->load->model('Tesonline_model');
        $this->load->model('tesonline/Tesonline_model');
        parent::__construct();
    }

    public function ajax_get_paket($id_tryout) {
        $data = $this->Tryout_model->get_paket_by_id_to($id_tryout);

        $output = array('data' => $data);
        echo json_encode($output);
    }

    public function ajax_get_tryout() {
        $datas['id_siswa'] = $this->Tryout_model->get_id_siswa();
        $datas['tryout'] = $this->Tryout_model->get_tryout_akses($datas);

        $list = $datas['tryout'];

        $data = array();

        //mengamb
    }

    public function ajax_get_tryout_single($id_tryout) {
        $datas['id_tryout'] = $id_tryout;
        $datas['tryout'] = $this->Tryout_model->get_tryout_by_id($datas);

        $list = $datas['tryout'];

        $data = array();

//mengambil nilai list
        $baseurl = base_url();
        foreach ($list as $tryout_item) {
            
        }


        $output = array(
            "data" => $data
        );

        echo json_encode($output);
    }

    //# fungsi indeks
    public function index() {
        $data = array(
            'judul_halaman' => 'Neon - Tryout',
            'judul_header' => 'Daftar Tryout',
            'judul_tingkat' => '',
        );

        $konten = 'modules/tryout/views/v-daftar-to.php';

        $data['files'] = array(
            APPPATH . 'modules/homepage/views/v-header-login.php',
            APPPATH . 'modules/templating/views/t-f-pagetitle.php',
            APPPATH . $konten,
            APPPATH . 'modules/homepage/views/v-footer.php',
        );


        $datas['id_siswa'] = $this->Tryout_model->get_id_siswa();
// print_r($datas['id_siswa']);
        $data['tryout'] = $this->Tryout_model->get_tryout_akses($datas);
// print_r($data);
        $this->parser->parse('templating/index', $data);
    }

    public function create_seassoin_idto($id_to) {
        $this->session->set_userdata('id_tryout', $id_to);
        redirect("tryout/daftarpaket");
    }

    public function create_session($id_paket) {
//$this->session->userdata('id_paket',$id_paket);
    }

    public function daftarpaket() {
        $data['id_to'] = $this->session->userdata('id_tryout');
        $id_to = $data['id_to'];

        if (!isset($id_to['id_to'])) {
            $data = array(
                'judul_halaman' => 'Neon - Daftar Paket',
                'judul_header' => 'Daftar Paket',
                'judul_tingkat' => '',
            );

            $konten = 'modules/tryout/views/v-daftar-paket.php';

            $data['files'] = array(
                APPPATH . 'modules/homepage/views/v-header-login.php',
                APPPATH . 'modules/templating/views/t-f-pagetitle.php',
                APPPATH . $konten,
                APPPATH . 'modules/homepage/views/v-footer.php',
            );

            //$data['paket'] = $this->Tryout_model->get_paket_by_id_to($id_to);

            $data['paket_dikerjakan'] = $this->Tryout_model->get_paket_actioned_by_id_to($id_to);
            $data['paket'] = $this->Tryout_model->get_paket_undo($id_to);
            // print_r($data['paket_dikerjakan2']);
            // echo "<br><br>";
            // print_r($data['paket_dikerjakan']);
            $this->parser->parse('templating/index', $data);
        } else {
            //kalo gak ada session
            redirect('tryout');
        }
    }

//# fungsi indeks
    function buatto() {
        $data = array("id_paket" => $this->input->post('id_paket'),
            "id_tryout" => $this->input->post('id_tryout'),
            "id_mm-tryoutpaket" => $this->input->post('id_mm_tryoutpaket'),
        );
        $this->session->set_userdata('id_paket', $data['id_paket']);
        $this->session->set_userdata('id_tryout', $data['id_tryout']);
        $this->session->set_userdata('id_mm-tryoutpaket', $data['id_mm-tryoutpaket']);
        $insert = array("id_pengguna" => $this->session->userdata('id'),
            "id_mm-tryout-paket" => $this->session->userdata('id_mm-tryoutpaket'),
            "status_pengerjaan" => '2'
        );

//        $this->Tryout_model->insert_report_sementara($insert);
    }

    //# fungsi indeks

    function test2() {
        var_dump($this->session->userdata());
    }

//# fungsi indeks
//fungsi ilham
    public function mulaitest() {
        if (!empty($this->session->userdata['id_mm-tryoutpaket'])) {
        $id = $this->session->userdata['id_mm-tryoutpaket'];
        $data['topaket']= $this->Tryout_model->datatopaket($id);
//        echo $id;
        $id_paket = $this->Tryout_model->datapaket($id)[0]->id_paket;

//        echo $id_paket; 
        $data['paket'] = $this->Tryout_model->durasipaket($id_paket);
//        var_dump($data);

        $this->load->view('templating/t-headerto');
        $query = $this->load->Tryout_model->get_soal($id_paket);
        $data['soal'] = $query['soal'];
        $data['pil'] = $query['pil'];
////        var_dump($data);
        $this->load->view('vHalamanTo.php', $data);
        $this->load->view('templating/t-footerto', $data);
        } else {
            $this->errorTest();
        }
    }

    public function errorTest() {
        $this->load->view('templating/t-headerto');
        $this->load->view('v-error-test.php');
    }

    public function cekJawaban() {
        $data = $this->input->post('pil');

//        var_dump($data);
        $id = $this->session->userdata['id_mm-tryoutpaket'];
        $id_paket = $this->Tryout_model->datapaket($id)[0]->id_paket;
////   
        $result = $this->Tryout_model->jawabansoal($id_paket);
//        var_dump($result);
        $benar = 0;
        $salah = 0;
        $kosong = 0;
        $koreksi = array();
        $idSalah = array();
        for ($i = 0; $i < sizeOf($result); $i++) {
            $id = $result[$i]['soalid'];
            $data[$id];
            if (!isset($data[$id])) {
                $kosong++;
                $koreksi[] = $result[$i]['soalid'];
                $idSalah[] = $i;
            } else if ($data[$id] == $result[$i]['jawaban']) {
                $benar++;
            } else {
                $salah++;
                $koreksi[] = $result[$i]['soalid'];
                $idSalah[] = $i;
            }
        }
//////
//            echo 'kosong = ' . $kosong;
//            echo 'Salah = ' . $salah;
//            echo 'benar = ' . $benar;
        //
        $hasil['id_pengguna'] = $this->session->userdata['id'];
        $hasil['id_mm-tryout-paket'] = $this->session->userdata['id_mm-tryoutpaket'];;
        $hasil['jmlh_kosong'] = $kosong;
        $hasil['jmlh_benar'] = $benar;
        $hasil['jmlh_salah'] = $salah;
        $hasil['total_nilai'] = $benar;
        $hasil['poin'] = $benar;
        $hasil['status_pengerjaan'] = 1;
        
        $result = $this->load->Tryout_model->inputreport($hasil);
        $this->session->unset_userdata('id_mm-tryoutpaket');
        redirect(base_url('index.php/tryout'));
    }

    //end fungsi ilham
}

?>
