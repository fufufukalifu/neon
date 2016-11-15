<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Tryout extends MX_Controller {

    public function __construct() {
        $this->load->library('parser');
        $this->load->model('Mtryout');
        $this->load->model('tesonline/Mtesonline');
        parent::__construct();

        # check session
        if ($this->session->userdata('loggedin') == true) {
            if ($this->session->userdata('HAKAKSES') == 'siswa') {
                
            } else if ($this->session->userdata('HAKAKSES') == 'guru') {
                redirect('guru/dashboard');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
        ##
    }

    public function ajax_get_paket($id_tryout) {
        $data = $this->Mtryout->get_paket_by_id_to($id_tryout);

        $output = array('data' => $data);
        echo json_encode($output);
    }

    //# fungsi indeks, mampilin to yang dikasih hak akses.
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
//            APPPATH . 'modules/homepage/views/v-footer.php',
            APPPATH . 'modules/testimoni/views/v-footer.php',
            
        );

        $datas['id_siswa'] = $this->Mtryout->get_id_siswa();
        $data['tryout'] = $this->Mtryout->get_tryout_akses($datas);
        $this->parser->parse('templating/index', $data);
    }

    public function create_seassoin_idto($id_to) {
        $this->session->set_userdata('id_tryout', $id_to);
        redirect("tryout/daftarpaket");
    }

    public function daftarpaket() {
        $id_to = $this->session->userdata('id_tryout');
        $datas['id_tryout'] = $id_to;
        $datas['id_pengguna'] = $this->session->userdata('id');
        $data['nama_to'] = $this->Mtryout->get_tryout_by_id($id_to)[0]['nm_tryout'];




        if (isset($id_to)) {
            $data = array(
                'judul_halaman' => 'Neon - Daftar Paket',
                'judul_header' => 'Tryout : ' . $data['nama_to'],
                'judul_tingkat' => '',
            );

            $konten = 'modules/tryout/views/v-daftar-paket.php';

            $data['files'] = array(
                APPPATH . 'modules/homepage/views/v-header-login.php',
                APPPATH . 'modules/templating/views/t-f-pagetitle.php',
                APPPATH . $konten,
                // APPPATH . 'modules/homepage/views/v-footer.php',
                APPPATH . 'modules/testimoni/views/v-footer.php',
            );

            $data['paket_dikerjakan'] = $this->Mtryout->get_paket_reported($datas);
            $data['paket'] = $this->Mtryout->get_paket_undo($id_to);

            $this->parser->parse('templating/index', $data);
        } else {
            //kalo gak ada session
            // redirect('tryout');
        }
        // var_dump($data['paket_dikerjakan']);
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
            $data['topaket'] = $this->Mtryout->datatopaket($id);
//        echo $id;
            $id_paket = $this->Mtryout->datapaket($id)[0]->id_paket;

//        echo $id_paket; 
            $data['paket'] = $this->Mtryout->durasipaket($id_paket);
//        var_dump($data);

            $this->load->view('templating/t-headerto');
            $query = $this->load->Mtryout->get_soal($id_paket);
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

       // var_dump($data);
       // echo $data[27][0];
        $id = $this->session->userdata['id_mm-tryoutpaket'];
        $id_paket = $this->Mtryout->datapaket($id)[0]->id_paket;
////   
        $result = $this->Mtryout->jawabansoal($id_paket);
//        var_dump($result);
        $benar = 0;
        $salah = 0;
        $kosong = 0;
        $koreksi = array();
        $idSalah = array();
        for ($i = 0; $i < sizeOf($result); $i++) {
            $id = $result[$i]['soalid'];
            $data[$id];
            // echo $data[$id][0];
            // echo "<br>";
            echo $result[$i]['jawaban'];
            if (!isset($data[$id])) {
                $kosong++;
                $koreksi[] = $result[$i]['soalid'];
                $idSalah[] = $i;
            } else if ($data[$id][0] == $result[$i]['jawaban']) {
                $benar++;
            } else {
                $salah++;
                $koreksi[] = $result[$i]['soalid'];
                $idSalah[] = $i;
            }
        }
//////
           // echo 'kosong = ' . $kosong;
           // echo 'Salah = ' . $salah;
           // echo 'benar = ' . $benar;
        //
  $hasil['id_pengguna'] = $this->session->userdata['id'];
        $hasil['id_mm-tryout-paket'] = $this->session->userdata['id_mm-tryoutpaket'];
        ;
        $hasil['jmlh_kosong'] = $kosong;
        $hasil['jmlh_benar'] = $benar;
        $hasil['jmlh_salah'] = $salah;
        $hasil['total_nilai'] = $benar;
        $hasil['poin'] = $benar;
        $hasil['status_pengerjaan'] = 1;

        $result = $this->load->Mtryout->inputreport($hasil);
        $this->session->unset_userdata('id_mm-tryoutpaket');
        redirect(base_url('index.php/tryout'));
    }

    //end fungsi ilham
}

?>
