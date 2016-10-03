<?php

/**
 * 
 */
class BankSoal extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mbanksoal');
        $this->load->model('Templating/mtemplating');
        $this->load->library('parser');
    }

    public function index() {
        $data['tingkat'] = $this->mtemplating->get_tingkat();
        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/test.php',
        );
        $data['judul_halaman'] = "test";
        $this->load->view('templating/index-b-guru', $data);
    }

    public function listmp() {
        $tingkatID = htmlspecialchars($this->input->get('tingkatID'));
      
        $data['tingkat'] = $this->mtemplating->get_tingkat();
        $data['pelajaran'] = $this->mbanksoal->get_pelajaran($tingkatID);
        $data['tingkatID'] = $tingkatID;

        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/v-list-mp.php',
            );

        $data['judul_halaman'] = "List  Mata Pelajaran";

        $hakAkses=$this->session->userdata['HAKAKSES'];
                // cek hakakses 
        if ($hakAkses=='admin') {
        // jika admin
        //cek jika sniping url
            if ($tingkatID==null) {
                redirect(site_url('admin'));
            } else {
                 $this->parser->parse('admin/v-index-admin', $data);
            }


        } elseif($hakAkses=='guru'){
                    // jika guru
            //cek jika sniping url
            if ($tingkatID==null) {
                redirect(site_url('guru/dashboard/'));
            } else {
                 $this->parser->parse('templating/index-b-guru', $data);
            }
            
        }else{
            // jika siswa redirect ke welcome
            redirect(site_url('welcome'));
        }
           
       
    }

    public function listbab() {
        $mpID = htmlspecialchars($this->input->get('mpID'));


        $data['tingkat'] = $this->mtemplating->get_tingkat();

        $data['bab'] = $this->mbanksoal->get_bab($mpID);
        $data['judul_halaman'] = "List Bab";
        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/v-list-bab.php',
            );
                #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses=='admin') {
            // jika admin
            if ($mpID == null) {
                redirect(site_url('admin'));
            } else {
               $this->parser->parse('admin/v-index-admin', $data);
            }
            
        } elseif($hakAkses=='guru'){
             // jika guru
            if ($mpID == null) {
                 redirect(site_url('guru/dashboard/'));
            } else {
               $this->parser->parse('templating/index-b-guru', $data);
            }
            
        }else{
                        // jika siswa redirect ke welcome
            redirect(site_url('welcome'));
        }
                #END Cek USer#
    }

    public function listsubbab() {
        $babID = htmlspecialchars($this->input->get('bab'));

        $data['tingkat'] = $this->mtemplating->get_tingkat();

        $data['subbab'] = $this->mbanksoal->get_subbab($babID);
        $data['judul_halaman'] = "List Sub Bab";
        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/v-list-subbab.php',
            );
         #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses=='admin') {
            // jika admin
            if ($babID == null) {
                redirect(site_url('admin'));
            } else {
                $this->parser->parse('admin/v-index-admin', $data);
            }
            
        } elseif($hakAkses=='guru'){
            // jika guru
             if ($babID == null) {
                redirect(site_url('guru/dashboard/'));
            } else {
                $this->parser->parse('templating/index-b-guru', $data);
            }
            
        }else{
                        // jika siswa redirect ke welcome
            redirect(site_url('welcome'));
        }
        #END Cek USer#
    }

    public function listsoal() {
      
        $subBab = htmlspecialchars($this->input->get('subbab'));

        $data['tingkat'] = $this->mtemplating->get_tingkat();
        $data['soal'] = $this->mbanksoal->get_soal($subBab);
        $data['pilihan'] = $this->mbanksoal->get_pilihan($subBab);
        $data ['subBab'] = $subBab;
        $data['judul_halaman'] = "List  Soal";
        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/v-list-soal.php',
            );
        #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses=='admin') {
            // jika admin
            if ($subBab == null) {
                redirect(site_url('admin'));
            } else {
                $this->parser->parse('admin/v-index-admin', $data);
            }
            
        } elseif($hakAkses=='guru'){
             // jika guru
            if ($subBab == null) {
                 redirect(site_url('guru/dashboard/'));
            } else {
               $this->parser->parse('templating/index-b-guru', $data);
            }
            
        }else{
            // jika siswa redirect ke welcome
            redirect(site_url('welcome'));
        }
        #END Cek USer#
    }

    #Start Function untuk form upload bank soal#

    public function formsoal() {
        $data['subBab'] = htmlspecialchars($this->input->get('subBab'));
      
        $data['tingkat'] = $this->mtemplating->get_tingkat();

        $data['judul_halaman'] = "Form Input Soal";
        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/v-form-soal.php',
            );
         #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses=='admin') {
            // jika admin
            if ($data['subBab'] == null) {
                redirect(site_url('admin'));
            } else {
                $this->parser->parse('admin/v-index-admin', $data);
            }
            
        } elseif($hakAkses=='guru'){
            // jika guru
            if ($data['subBab'] == null) {
                redirect(site_url('guru/dashboard/'));
            } else {
                $this->parser->parse('templating/index-b-guru', $data);
            }
            
        }else{
                        // jika siswa redirect ke welcome
            redirect(site_url('welcome'));
        }
                #END Cek USer#
    }

    public function uploadsoal() {
        $options = htmlspecialchars($this->input->post('options'));
        $UUID = uniqid();
        $soal = ($this->input->post('editor1'));
        $subBabID = htmlspecialchars($this->input->post('subBabID'));
        $jawaban = htmlspecialchars($this->input->post('jawaban'));
        $kesulitan = htmlspecialchars($this->input->post('kesulitan'));
        $sumber = htmlspecialchars($this->input->post('sumber'));
        $publish = htmlspecialchars($this->input->post('publish'));
        $random = htmlspecialchars($this->input->post('random'));
        $a = htmlspecialchars($this->input->post('a'));
        $b = htmlspecialchars($this->input->post('b'));
        $c = htmlspecialchars($this->input->post('c'));
        $d = htmlspecialchars($this->input->post('d'));
        $e = htmlspecialchars($this->input->post('e'));
        $create_by = $this->session->userdata['id'];
        //kesulitan indks 1-3
        $dataSoal = array(
            'soal' => $soal,
            'jawaban' => $jawaban,
            'sumber' => $sumber,
            'kesulitan' => $kesulitan,
            'publish' => $publish,
            'create_by' => $create_by,
            'id_subbab' => $subBabID,
            'UUID' => $UUID,
            'random' => $random
        );

        //call fungsi insert soal
        $this->mbanksoal->insert_soal($dataSoal);

        // mengambil id soal untuk fk di tb_piljawaban
        $data['tb_banksoal'] = $this->mbanksoal->get_soalID($UUID)[0];
        $soalID = $data['tb_banksoal']['id_soal'];


        #Start pengecekan jenis inputan jawaban#
        //pengkondisian untuk jenis inputan text atau gambar
        if ($options == 'text') {
            #jika inputan text
            //data untuk pilahan jawaban
            $dataJawaban = array(
                array(
                    'pilihan' => 'A',
                    'jawaban' => $a,
                    'id_soal' => $soalID
                ),
                array(
                    'pilihan' => 'B',
                    'jawaban' => $b,
                    'id_soal' => $soalID
                ),
                array(
                    'pilihan' => 'C',
                    'jawaban' => $c,
                    'id_soal' => $soalID
                ),
                array(
                    'pilihan' => 'D',
                    'jawaban' => $d,
                    'id_soal' => $soalID
                ),
                array(
                    'pilihan' => 'E',
                    'jawaban' => $e,
                    'id_soal' => $soalID
                )
            );

            //call function insert jawaban tet
            $this->mbanksoal->insert_jawaban($dataJawaban);
        } else {
            #jika inputan gambar
            //call functiom upload gamabar
            $this->uploadgambar($soalID);
        }
        #END pengecekan jenis inputan jawaban#
        redirect(site_url('banksoal/listsoal?subBab=' . $subBabID));
    }

    public function uploadgambar($soalID) {
        $config['upload_path'] = './assets/image/jawaban/';
        $config['allowed_types'] = 'jpeg|gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);

        $n = '1';
        $datagambar = array();
        for ($x = 1; $x <= 5; $x++) {
            $gambar = "gambar" . $n;
            $this->upload->do_upload($gambar);


            $file_data = $this->upload->data();
            $file_name = $file_data['file_name'];
            if ($n == '1') {
                $pilihan = "A";
            } else if ($n == '2') {
                $pilihan = "B";
            } else if ($n == '3') {
                $pilihan = "C";
            } else if ($n == '4') {
                $pilihan = 'D';
            } else {
                $pilihan = 'E';
            }

            $datagambar[] = array('pilihan' => $pilihan,
                'gambar' => $file_name,
                'id_soal' => $soalID);

            $n++;
        }

        $this->mbanksoal->insert_gambar($datagambar);
    }

    #ENDFunction untuk form upload soal#
    #START Function untuk form update bank soal #

    public function formUpdate() {

        $data['subBabID'] = htmlspecialchars($this->input->get('subBab'));
        
        $UUID = htmlspecialchars($this->input->get('UUID'));

        $data['tingkat'] = $this->mtemplating->get_tingkat();
            //get data soan where==UUID
        $data['bankSoal'] = $this->mbanksoal->get_onesoal($UUID)[0];
        $id_soal = $data['bankSoal']['id_soal'];
            //get piljawaban == id soal
        $data['piljawaban'] = $this->mbanksoal->get_piljawaban($id_soal);
        $data['judul_halaman'] = "Form Update Soal";
        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/v-update-soal.php',
            );
        #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses=='admin') {
            // jika admin
            if ($data['subBabID'] == null || $UUID == null) {
                redirect(site_url('admin'));
            } else {
                $this->parser->parse('admin/v-index-admin', $data);
            }
            
        } elseif($hakAkses=='guru'){
            // jika guru
            if ($data['subBabID'] == null || $UUID == null) {
                redirect(site_url('guru/dashboard/'));
            } else {
                $this->parser->parse('templating/index-b-guru', $data);
            }
            
        }else{
                        // jika siswa redirect ke welcome
            redirect(site_url('welcome'));
        }
         #END Cek USer#

    }

    public function updateBanksoal() {
       
        #Start post data soal#
        $options = htmlspecialchars($this->input->post('options'));
        $soal = ($this->input->post('editor1'));
        $soalID = htmlspecialchars($this->input->post('soalID'));
        $UUID = htmlspecialchars($this->input->post('UUID'));
        $subBabID = htmlspecialchars($this->input->post('subBabID'));
        $jawaban = htmlspecialchars($this->input->post('jawaban'));
        $kesulitan = htmlspecialchars($this->input->post('kesulitan'));
        $sumber = htmlspecialchars($this->input->post('sumber'));
        $publish = htmlspecialchars($this->input->post('publish'));
         $random = htmlspecialchars($this->input->post('random'));
        $create_by = $this->session->userdata['id'];
        #END post data soal#

        #Start post data pilihan jawaban#
        $idA = htmlspecialchars($this->input->post('idpilA'));
        $idB = htmlspecialchars($this->input->post('idpilB'));
        $idC = htmlspecialchars($this->input->post('idpilC'));
        $idD = htmlspecialchars($this->input->post('idpilD'));
        $idE = htmlspecialchars($this->input->post('idpilE'));
        $a = htmlspecialchars($this->input->post('a'));
        $b = htmlspecialchars($this->input->post('b'));
        $c = htmlspecialchars($this->input->post('c'));
        $d = htmlspecialchars($this->input->post('d'));
        $e = htmlspecialchars($this->input->post('e'));
        #END post data pilihan jawaban#
        //keterangan *kesulitan index 1-3


        $data['UUID'] = $UUID;
        $data['dataSoal'] = array(
            'soal' => $soal,
            'jawaban' => $jawaban,
            'sumber' => $sumber,
            'kesulitan' => $kesulitan,
            'publish' => $publish,
            'create_by' => $create_by,
            'random' => $random
        );

        //call fungsi insert soal
        $this->mbanksoal->ch_soal($data);

        #Start pengecekan jenis inputan jawaban#
        //pengkondisian untuk jenis inputan text atau gambar
        if ($options == 'text') {
            #jika inputan text
            //data untuk pilahan jawaban
            // $data['']=
            $data['dataJawaban'] = array(
                array(
                    'pilihan' => 'A',
                    'jawaban' => $a,
                    'id_pilihan' => $idA
                ),
                array(
                    'pilihan' => 'B',
                    'jawaban' => $b,
                    'id_pilihan' => $idB
                ),
                array(
                    'pilihan' => 'C',
                    'jawaban' => $c,
                    'id_pilihan' => $idC
                ),
                array(
                    'pilihan' => 'D',
                    'jawaban' => $d,
                    'id_pilihan' => $idD
                ),
                array(
                    'pilihan' => 'E',
                    'jawaban' => $e,
                    'id_pilihan' => $idE
                )
            );

            //call function insert jawaban tet
            $this->mbanksoal->ch_jawaban($data);
        } else {
            #jika inputan gambar

            // call functiom upload gamabar
            $this->updategambar($soalID);
        }
        #END pengecekan jenis inputan jawaban#
        redirect(site_url('banksoal/listsoal?subBab=' . $subBabID));
    }

    public function updategambar($soalID) {

        // unlink( FCPATH . "./assets/image/jawaban/".$xxxx );
        $config['upload_path'] = './assets/image/jawaban/';
        $config['allowed_types'] = 'jpeg|gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);

        $oldgambar = $this->mbanksoal->get_oldgambar($soalID);




        $n = '1';
        $datagambar = array();
        foreach ($oldgambar as $rows) {
            // remove old gambar   		

            $gambar = "gambar" . $n;

            if ($this->upload->do_upload($gambar)) {
                unlink(FCPATH . "./assets/image/jawaban/" . $rows['gambar']);
                $file_data = $this->upload->data();
                $file_name = $file_data['file_name'];
                if ($n == '1') {
                    $pilihan = "A";
                } else if ($n == '2') {
                    $pilihan = "B";
                } else if ($n == '3') {
                    $pilihan = "C";
                } else if ($n == '4') {
                    $pilihan = 'D';
                } else {
                    $pilihan = 'E';
                }

                $datagambar[] = array('pilihan' => $pilihan,
                    'gambar' => $file_name,
                    'id_soal' => $soalID,
                    'id_pilihan' => $rows['id_pilihan']);
                echo "masuk" . $n;
            }

            $n++;
        }

        $this->mbanksoal->ch_gambar($datagambar);
        // var_dump($oldgambar);
    }

    #END Function untuk form update bank soal #
    #END Function untuk delete bank soal #

    public function deleteBanksoal($data) {
        $this->mbanksoal->del_banksoal($data);
    }

}

?>