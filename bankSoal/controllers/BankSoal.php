<?php

/**
 * 
 */
class Banksoal extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mbanksoal');
        $this->load->model('templating/Mtemplating');
        $this->load->library('parser');
    }

    public function index() {
       
        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/test.php',
        );
        $data['judul_halaman'] = "test";
        $this->load->view('templating/index-b-guru', $data);
    }

    public function listmp() {
        $tingkatID = htmlspecialchars($this->input->get('tingkatID'));
      
       
        $data['pelajaran'] = $this->Mbanksoal->get_pelajaran($tingkatID);
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
        $data['bab'] = $this->Mbanksoal->get_bab($mpID);
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

        $data['subbab'] = $this->Mbanksoal->get_subbab($babID);
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
    ## START FUNCTION UNTUK HALAMAN SOAL PERSUB-BAB
    // Functon menampilkan halaman list soal per sub--bab
    public function listsoal() {
      
        $subBab = htmlspecialchars($this->input->get('subbab'));
        $data ['subBab'] = $subBab;
        $data['judul_halaman'] = "Bank Soal";
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
    // function untuk mengambil data soal
    function ajax_soalPerSub($subBab) {
        $list  = $this->Mbanksoal->get_soal($subBab);
         $pilihan = $this->Mbanksoal->get_pilihan($subBab);

        // $list = $this->load->mToBack->paket_by_toID($idTO);
        $data = array();

        $baseurl = base_url();
        foreach ( $list as $list_soal ) {
            $jawabanBenar= "";
            $jawaban=$list_soal['jawaban'];
            $tingkat=$list_soal['kesulitan'];
            $id_soal=$list_soal['id_soal'];
            $random=$list_soal['random'];
            $publish=$list_soal['publish'];
            $ckRandom="";
            $ckPublish="";

            
             // menentukan tingkat kesulitan dengan indeks 1 - 3
            if ($tingkat == '3') {
                $kesulitan = 'Sulit';
            } elseif ($tingkat == '2') {
                $kesulitan = 'Sedang';
            }else {
               $kesulitan = 'Mudah';
            }
            // menentukan jawaban benar
            foreach ( $pilihan as $piljawaban ) {
                $id_soal_fk=$piljawaban['id_soal'];
                $op=$piljawaban['pilihan'];
                if ($id_soal==$id_soal_fk && $jawaban == $op ) {
                    $jawabanBenar=$piljawaban['jawabanBenar'];
                } 
                
            }
            // menentukan checked random
            if ($random =='1') {
                $ckRandom="checked";
            } 
            //mnentukan checked publish
              if ($publish =='1') {
                $ckPublish="checked";
            } 
            
            $row = array();
            $row[] = $id_soal;
            $row[] = $list_soal['judul_soal'];
            $row[] = $list_soal['sumber'];
            $row[] = $list_soal['keterangan'];
            $row[] = $kesulitan;
            $row[] = $list_soal['soal'];
            $row[] = $jawabanBenar;
           $row[] ='
                    <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                <input type="checkbox" name="ckRand"'.$ckPublish.' value="1">
                                <label for="ckRand" >&nbsp;&nbsp;</label>
                    </span>';

            // $row[] ='
            //         <span class="checkbox custom-checkbox custom-checkbox-inverse">
            //                     <input type="checkbox" name="ckRand"'.$ckRandom.'>
            //                     <label for="ckRand" >&nbsp;&nbsp;</label>
            //         </span>';
            $row[] = '
            <form action="'.base_url().'index.php/banksoal/formUpdate" method="get">

                                                <input type="text" name="UUID" value="'.$list_soal['UUID'].'"  hidden="true">
                                                <input type="text" name="subBab" value="'.$list_soal['id_subbab'].'" hidden="true">
                                                <button type="submit" class="btn btn-sm btn-default"><i class="ico-file5"></i></button>

            </form>';

             $row[]=' 
            <a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropSoal('."'".$list_soal['id_soal']."'".')"><i class="ico-remove"></i></a>';

            $data[] = $row;

        }
    
        $output = array(
            
            "data"=>$data,
        );

        echo json_encode( $output );
    } 
    ## END START FUNCTION UNTUK HALAMAN SOAL PERSUB-BAB#

    ## START FUNCTION UNTUK HALAMAN ALL SOAL##
    //function untuk menampilkan halaman all soal
    public function allsoal()
    {
        // $data['soal'] = $this->Mbanksoal->get_allsoal();
        // $data['pilihan'] = $this->Mbanksoal->get_allpilihan();
       
        $data['judul_halaman'] = "Bank Soal";
        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/v-list-allsoal.php',
            );
        #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses=='admin') {

                $this->parser->parse('admin/v-index-admin', $data);
           
            
        } elseif($hakAkses=='guru'){
             // jika guru

               $this->parser->parse('templating/index-b-guru', $data);

            
        }else{
            // jika siswa redirect ke welcome
            redirect(site_url('welcome'));
        }
        #END Cek USer#
    }

    // function untuk mengambil data soal
    function ajax_listAllSoal() {
        $list = $this->Mbanksoal->get_allsoal();
        $pilihan = $this->Mbanksoal->get_allpilihan();

        // $list = $this->load->mToBack->paket_by_toID($idTO);
        $data = array();

        $baseurl = base_url();
        foreach ( $list as $list_soal ) {
             $jawabanBenar= "";
            $jawaban=$list_soal['jawaban'];
            $tingkat=$list_soal['kesulitan'];
            $id_soal=$list_soal['id_soal'];
            $random=$list_soal['random'];
            $publish=$list_soal['publish'];
            $ckRandom="";
            $ckPublish="";

            
             // menentukan tingkat kesulitan dengan indeks 1 - 3
            if ($tingkat == '3') {
                $kesulitan = 'Sulit';
            } elseif ($tingkat == '2') {
                $kesulitan = 'Sedang';
            }else {
               $kesulitan = 'Mudah';
            }
            // menentukan jawaban benar
            foreach ( $pilihan as $piljawaban ) {
                $id_soal_fk=$piljawaban['id_soal'];
                $op=$piljawaban['pilihan'];
                if ($id_soal==$id_soal_fk && $jawaban == $op ) {
                    $jawabanBenar=$piljawaban['jawabanBenar'];

                } 

                
            }
            // menentukan checked random
            if ($random =='1') {
                $ckRandom="checked";
            } 
            //mnentukan checked publish
              if ($publish =='1') {
                $ckPublish="checked";
            } 
            
            $row = array();
            $row[] = $id_soal;
            $row[] = $list_soal['judul_soal'];
            $row[] = $list_soal['sumber'];
            $row[] = $list_soal['keterangan'];
            $row[] = $kesulitan;
            $row[] =  $list_soal['soal'];
            $row[] = $jawabanBenar;
           $row[] ='
                    <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                <input type="checkbox" name="ckRand"'.$ckPublish.' value="1">
                                <label for="ckRand" >&nbsp;&nbsp;</label>
                    </span>';

            // $row[] ='
            //         <span class="checkbox custom-checkbox custom-checkbox-inverse">
            //                     <input type="checkbox" name="ckRand"'.$ckRandom.'>
            //                     <label for="ckRand" >&nbsp;&nbsp;</label>
            //         </span>';
            $row[] = '
            <form action="'.base_url().'index.php/banksoal/formUpdate" method="get">

                                                <input type="text" name="UUID" value="'.$list_soal['UUID'].'"  hidden="true">
                                                <input type="text" name="subBab" value="'.$list_soal['id_subbab'].'" hidden="true">
                                                <button type="submit" class="btn btn-sm btn-default"><i class="ico-file5"></i></button>

            </form>';

            $row[]=' 
            <a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropSoal('."'".$list_soal['id_soal']."'".')"><i class="ico-remove"></i></a>';

            $data[] = $row;

        }
    
        $output = array(
            
            "data"=>$data,
        );

        echo json_encode( $output );
    } 

    #Start Function untuk form upload bank soal#

    public function formsoal() {
        $data['subBab'] = htmlspecialchars($this->input->get('subBab'));

        $data['judul_halaman'] = "Bank Soal";
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
        //load library n helper
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $subBabID = htmlspecialchars($this->input->post('subBabID'));
        //syarat pengisian form upload soal
        $this->form_validation->set_rules('judul', 'Judul Soal', 'trim|required|is_unique[tb_banksoal.judul_soal]');
        //pengecekan pengisian form regitrasi siswa
        // if ($this->form_validation->run() == FALSE) {##
        //jika tidak memenuhi syarat akan menampilkan pesan error/kesalahan di halaman regitrasi siswa
            // redirect(site_url('banksoal/formsoal?subBab='.$subBabID));
        // } else {##
         // START SINTX UPLOAD SOAL
           $options = htmlspecialchars($this->input->post('options'));
           $jum_pilihan = htmlspecialchars($this->input->post('opjumlah'));
           $UUID = uniqid();
           $soal = ($this->input->post('editor1'));
           $gambarSoal = $this->input->post('gambarSoal');
           $judul_soal = htmlspecialchars($this->input->post('judul'));
           $jawaban = htmlspecialchars($this->input->post('jawaban'));
           $kesulitan = htmlspecialchars($this->input->post('kesulitan'));
           $sumber = htmlspecialchars($this->input->post('sumber'));
           $publish = htmlspecialchars($this->input->post('publish'));
           $random = htmlspecialchars($this->input->post('random'));
           $a = $this->input->post('a');
           $b = $this->input->post('b');
           $c = $this->input->post('c');
           $d = $this->input->post('d');
           $e = $this->input->post('e');
           $create_by = $this->session->userdata['id'];
           //kesulitan indks 1-3
           $dataSoal = array(
               'judul_soal' => $judul_soal,
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
           $this->Mbanksoal->insert_soal($dataSoal);
            $this->up_img_soal($UUID);
           // // mengambil id soal untuk fk di tb_piljawaban
           $data['tb_banksoal'] = $this->Mbanksoal->get_soalID($UUID)[0];
           $soalID = $data['tb_banksoal']['id_soal'];


           #Start pengecekan jenis inputan jawaban#
           //pengkondisian untuk jenis inputan text atau gambar
           if ($options == 'text') {
               #jika inputan text
               //cek tipe jumlah pilihan jawaban
            
            if ($jum_pilihan=='4') {
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
                   )
               );
            } else {
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
            }
            
               

               //call function insert jawaban tet
               $this->Mbanksoal->insert_jawaban($dataJawaban);
           } else {
               #jika inputan gambar
               //call functiom upload gamabar
               $this->up_img_jawaban($soalID);
           }
           #END pengecekan jenis inputan jawaban#
           redirect(site_url('banksoal/listsoal?subbab=' . $subBabID));
         // END SINTX UPLOAD SOAL
        // }##

        
    }

    //function upload gambar soal
     public function up_img_soal($UUID) {
        $config['upload_path'] = './assets/image/soal/';
        $config['allowed_types'] = 'jpeg|gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $gambar = "gambarSoal";
        $this->upload->do_upload($gambar);
        $file_data = $this->upload->data();
        $file_name = $file_data['file_name'];
        $data['UUID']=$UUID;
        $data['dataSoal']=  array(
            'gambar_soal' => $file_name);

            $this->Mbanksoal->ch_soal($data);
    }
    public function ch_img_soal($UUID) {
        $config['upload_path'] = './assets/image/soal/';
        $config['allowed_types'] = 'jpeg|gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $gambar = "gambarSoal";
        $oldgambar = $this->Mbanksoal->get_oldgambar_soal($UUID);
        if ($this->upload->do_upload($gambar)) {
         foreach ($oldgambar as $rows) {
            unlink(FCPATH . "./assets/image/soal/" . $rows['gambar_soal']);
         }
         $file_data = $this->upload->data();
         $file_name = $file_data['file_name'];
         $data['UUID']=$UUID;
         $data['dataSoal']=  array(
          'gambar_soal' => $file_name);
         $this->Mbanksoal->ch_soal($data);
        }
        
       
       

        // $this->Mbanksoal->insert_gambar($datagambar);
    }
    //function untuk mengupload gambar pilihan jawaban
    public function up_img_jawaban($soalID) {
        $config2['upload_path'] = './assets/image/jawaban/';
        $config2['allowed_types'] = 'jpeg|gif|jpg|png';
        $config2['max_size'] = 100;
        $config2['max_width'] = 1024;
        $config2['max_height'] = 768;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        $n = '1';
        $datagambar = array();
        for ($x = 1; $x <= 5; $x++) {
            $gambar = "gambar" . $n;
            
            if ($this->upload->do_upload($gambar)) {
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
            } else {
              # code...
            }
            

            

            $n++;
        }

        $this->Mbanksoal->insert_gambar($datagambar);
    }

    #ENDFunction untuk form upload soal#
    #START Function untuk form update bank soal #

    public function formUpdate() {

        $data['subBabID'] = htmlspecialchars($this->input->get('subBab'));
        
        $UUID = htmlspecialchars($this->input->get('UUID'));

        //get data soan where==UUID
        $data['banksoal'] = $this->Mbanksoal->get_onesoal($UUID)[0];
        $id_soal = $data['banksoal']['id_soal'];
            //get piljawaban == id soal
        $data['piljawaban'] = $this->Mbanksoal->get_piljawaban($id_soal);
        $data['judul_halaman'] = "Bank Soal";
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

    public function updatebanksoal() {
       
        #Start post data soal#
        $judul_soal = htmlspecialchars($this->input->post('judul'));
        $jum_pilihan = htmlspecialchars($this->input->post('opjumlah'));
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
        $a = $this->input->post('a');
        $b = $this->input->post('b');
        $c = $this->input->post('c');
        $d = $this->input->post('d');
        $e = $this->input->post('e');
        #END post data pilihan jawaban#
        //keterangan *kesulitan index 1-3


        $data['UUID'] = $UUID;
        $data['dataSoal'] = array(
            'judul_soal' => $judul_soal,
            'soal' => $soal,
            'jawaban' => $jawaban,
            'sumber' => $sumber,
            'kesulitan' => $kesulitan,
            'publish' => $publish,
            'create_by' => $create_by,
            'random' => $random
        );

        //call fungsi insert soal
        $this->Mbanksoal->ch_soal($data);
        $this->ch_img_soal($UUID);

        #data yg dilempar ke function count_pilihan#
        // data['id_soal'] digunakan untuk function pengecekan jumlah pilihan
        $data['id_soal']=$soalID;
        $data['jum_pilihan']=$jum_pilihan;
        $data['e']=$e;
        ######################
        // cek jumlah pilihan jawaban di db
       $this->count_pilihan($data);
        #Start pengecekan jenis inputan jawaban#
        //pengkondisian untuk jenis inputan text atau gambar
        if ($options == 'text') {
            #jika inputan text
              if ($jum_pilihan=='4') {

               $data['dataJawaban']  = array(
                  array(
                    'pilihan' => 'A',
                    'jawaban' => $a,
                ),
                array(
                    'pilihan' => 'B',
                    'jawaban' => $b,
                ),
                array(
                    'pilihan' => 'C',
                    'jawaban' => $c,
                ),
                array(
                    'pilihan' => 'D',
                    'jawaban' => $d,
                )
               );
            } else {
                $data['dataJawaban']  = array(
                   array(
                    'pilihan' => 'A',
                    'jawaban' => $a,
                ),
                array(
                    'pilihan' => 'B',
                    'jawaban' => $b,
                ),
                array(
                    'pilihan' => 'C',
                    'jawaban' => $c,
                ),
                array(
                    'pilihan' => 'D',
                    'jawaban' => $d,
                ),
                array(
                    'pilihan' => 'E',
                    'jawaban' => $e,
                )
               );
            }
             
            //call function insert jawaban tet
            $this->Mbanksoal->ch_jawaban($data);
            // $this->Mbanksoal->ch_jawaban($data);
        } else {
            #jika inputan gambar

            // call functiom upload gamabar
            $this->ch_img_jawaban($soalID);
        }
        #END pengecekan jenis inputan jawaban#
        redirect(site_url('banksoal/allsoal'));
    }

    // pengecekan jumlaha pilihan
    public function count_pilihan($data){

      $id_soal=$data['id_soal'];
      $count_dat=$this->Mbanksoal->get_count_pilihan($id_soal);
      $a = $count_dat;
      if ( $count_dat>$data['jum_pilihan']) {
        $this->Mbanksoal->del_oneJawaban( $id_soal);
      } else if ($count_dat<$data['jum_pilihan']) {
        // insert pilihan jawaban option E
        $pil_E = array(
          'pilihan' => 'E',
          'id_soal' => $id_soal
        );
        $this->Mbanksoal->add_oneJawaban($pil_E);

      }

    }

    public function ch_img_jawaban($soalID) {

        // unlink( FCPATH . "./assets/image/jawaban/".$xxxx );
        $config2['upload_path'] = './assets/image/jawaban/';
        $config2['allowed_types'] = 'jpeg|gif|jpg|png';
        $config2['max_size'] = 100;
        $config2['max_width'] = 1024;
        $config2['max_height'] = 768;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);

        $oldgambar = $this->Mbanksoal->get_oldgambar($soalID);

        $n = '1';
        $datagambar = array();
        // pengulngan untuk mendapat kan data gambar lama
        foreach ($oldgambar as $rows) {
            // remove old gambar   		
            $gambar = "gambar" . $n;
            // pengecekan upload
            if ($this->upload->do_upload($gambar)) {
              // jika upload berhasil hapus gambar sebelumnya
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
                // tampung nama gambar yg berhasil di upload ke array
                $datagambar[] = array('pilihan' => $pilihan,
                    'gambar' => $file_name,
                    'id_soal' => $soalID,
                    'id_pilihan' => $rows['id_pilihan']);
           
            }else{
              //  $error = array('error' => $this->upload->display_errors());
              // var_dump( $error);
            }

            $n++;
        }
        // pengecekan jika array kosong
        if ($datagambar!=array()) {
          // jika array tidak kosong panggil function ch_gambar
         $this->Mbanksoal->ch_gambar($datagambar);
        }
    }

    #END Function untuk form update bank soal #
    #END Function untuk delete bank soal #

    public function deletebanksoal($data) {
        $this->Mbanksoal->del_banksoal($data);
    }

}

?>