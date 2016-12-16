<?php

/**
 * 
 */
class Modulonline extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mmodulonline');
        $this->load->model('templating/Mtemplating');
         $this->load->model( 'matapelajaran/mmatapelajaran' );

        $this->load->model( 'tingkat/MTingkat' );

        $this->load->library('parser');
    }

    public function index() {
       
        $data['files'] = array(
            APPPATH . 'modules/modulonline/views/test.php',
        );
        $data['judul_halaman'] = "test";
        $this->load->view('templating/index-b-guru', $data);
    }

    public function listmp() {
        $tingkatID = htmlspecialchars($this->input->get('tingkatID'));
      
       
        $data['pelajaran'] = $this->Mmodulonline->get_pelajaran($tingkatID);
        $data['tingkatID'] = $tingkatID;

        $data['files'] = array(
            APPPATH . 'modules/modalonline/views/v-list-mp.php',
            );

        $data['judul_halaman'] = "List Mata Pelajaran";

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

  
    ##
 ##Start Function untuk halaman soal per mata pelajaran##
     // function untuk mengambil data soal
    function ajax_soalPerMp($idMp) {
      $list  = $this->Mmodulonline->get_soal_mp($idMp);
      //   $pilihan = $this->Mmodulonline->get_pilihan_mp($idMp);

       $data = array();

        $baseurl = base_url();
        foreach ($list as $list_soal ) {
            $id=$list_soal['id'];
            $judul=$list_soal['judul'];
            $deskripsi=$list_soal['deskripsi'];
            // $url=$list_soal['url_file'];
            $publish=$list_soal['publish'];
            $ckPublish="";
             
            //mnentukan checked publish
            if ($publish =='1') {
                $ckPublish="checked";
            } 
            
            $row = array();
            $row[] = $id;
            $row[] = $list_soal['judul'];
            $row[] = $list_soal['deskripsi'];
            $row[] ='
                    <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                <input type="checkbox" name="ckRand"'.$ckPublish.' value="1">
                                <label for="ckRand" >&nbsp;&nbsp;</label>
                    </span>';
            $row[] = '<a href="'.base_url("assets/modul/".$list_soal['url_file']).'" class="btn btn-sm btn-primary">
                                <i class="ico-download"></i>
                    </a>';
                    

            $row[] = '
            <form action="'.base_url().'index.php/modulonline/formUpdate" method="get">

                                                
                                                <input type="text" name="subBab" value="'.$list_soal['id'].'" hidden="true">
                                                <button type="submit" title="edit" class="btn btn-sm btn-warning"><i class="ico-file5"></i></button>

            </form>';

            $row[]=' 
            <a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropSoal('."'".$list_soal['id']."'".')"><i class="ico-remove"></i></a>';

            $data[] = $row;

        }
    
        $output = array(
            
            "data"=>$data,
        );

        echo json_encode( $output );
     
    } 
 ##Start Function untuk halaman soal per mata pelajaran##
     // function untuk mengambil data soal
    function ajax_soalPerTkt($tingkatID) {
      $list  = $this->Mmodulonline->get_soal_tkt($tingkatID);
        // $pilihan = $this->Mmodulonline->get_pilihan_tkt($tingkatID);
        $data = array();

        $baseurl = base_url();
        foreach ($list as $list_soal ) {
            $id=$list_soal['id'];
            $judul=$list_soal['judul'];
            $deskripsi=$list_soal['deskripsi'];
            // $url=$list_soal['url_file'];
            $publish=$list_soal['publish'];
            $ckPublish="";
             
            //mnentukan checked publish
            if ($publish =='1') {
                $ckPublish="checked";
            } 
            
            $row = array();
            $row[] = $id;
            $row[] = $list_soal['judul'];
            $row[] = $list_soal['deskripsi'];
            $row[] ='
                    <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                <input type="checkbox" name="ckRand"'.$ckPublish.' value="1">
                                <label for="ckRand" >&nbsp;&nbsp;</label>
                    </span>';
            $row[] = '<a href="'.base_url("assets/modul/".$list_soal['url_file']).'" class="btn btn-sm btn-primary">
                                <i class="ico-download"></i>
                    </a>';
                    

            $row[] = '
            <form action="'.base_url().'index.php/modulonline/formUpdate" method="get">

                                                
                                                <input type="text" name="subBab" value="'.$list_soal['id'].'" hidden="true">
                                                <button type="submit" title="edit" class="btn btn-sm btn-warning"><i class="ico-file5"></i></button>

            </form>';

            $row[]=' 
            <a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropSoal('."'".$list_soal['id']."'".')"><i class="ico-remove"></i></a>';

            $data[] = $row;

        }
    
        $output = array(
            
            "data"=>$data,
        );

        echo json_encode( $output );
    } 

    ## START FUNCTION UNTUK HALAMAN ALL SOAL##
    //function untuk menampilkan halaman all soal
    public function allsoal()
    {
       
        $data['judul_halaman'] = "Modul Online";
        $data['files'] = array(
            APPPATH . 'modules/modulonline/views/v-soal-all.php',
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
        $list = $this->Mmodulonline->get_allsoal();
        // $pilihan = $this->Mmodulonline->get_allpilihan();

        // $list = $this->load->mToBack->paket_by_toID($idTO);
        $data = array();

        $baseurl = base_url();
        foreach ($list as $list_soal ) {
            $id=$list_soal['id'];
            $judul=$list_soal['judul'];
            $deskripsi=$list_soal['deskripsi'];
            // $url=$list_soal['url_file'];
            $publish=$list_soal['publish'];
            $ckPublish="";
             
            //mnentukan checked publish
            if ($publish =='1') {
                $ckPublish="checked";
            } 
            
            $row = array();
            $row[] = $id;
            $row[] = $list_soal['judul'];
            $row[] = $list_soal['deskripsi'];
            $row[] ='
                    <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                <input type="checkbox" name="ckRand"'.$ckPublish.' value="1">
                                <label for="ckRand" >&nbsp;&nbsp;</label>
                    </span>';
            $row[] = '<a href="'.base_url("assets/modul/".$list_soal['url_file']).'" class="btn btn-sm btn-primary" target="_blank">
                                <i class="ico-download"></i>
                    </a>';
                    
            $row[] = '
            <form action="'.base_url().'index.php/modulonline/formUpdate" method="get">

                                                <input type="text" name="uuid" value="'.$list_soal['uuid'].'"  hidden="true">
                                                <input type="text" name="id_tingkatmapel" value="'.$list_soal['id_tingkatpelajaran'].'" hidden="true">
                                                <button type="submit" title="edit" class="btn btn-sm btn-warning"><i class="ico-file5"></i></button>

            </form>';

            $row[]=' 
            <a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropSoal('."'".$list_soal['id']."'".')"><i class="ico-remove"></i></a>';

            $data[] = $row;

        }
    
        $output = array(
            
            "data"=>$data,
        );

        echo json_encode( $output );
    } 

    #Start Function untuk form upload bank soal#\



    // pengecekan soal jika ada tabel
    public function cek_soal_tabel($soal)
    {
         if (strpos($soal, '<table') !== false) {
            return true;
        }else{
            return false;
        }

    
    }

    public function formmodul() {

        $data['judul_halaman'] = "Modul Online";
        $data['files'] = array(
            APPPATH . 'modules/modulonline/views/v-form-soal.php',
            );
         #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses=='admin') {
            // jika admin
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

    public function uploadmodul() {
        //load library n helper
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $mapelID = htmlspecialchars($this->input->post('mataPelajaran'));
        $gambarSoal = $this->input->post('gambarSoal');
        //syarat pengisian form upload soal
        $this->form_validation->set_rules('judul', 'Judul Modul', 'trim|required|is_unique[tb_modul.judul]');
           $UUID = uniqid();
           $judul = htmlspecialchars($this->input->post('judul'));
           $publish = htmlspecialchars($this->input->post('publish'));
           $deskripsi = $this->input->post('deskripsi');
           $create_by = $this->session->userdata['id'];
           //kesulitan indks 1-3
           $dataSoal = array(
               'judul' => $judul,
               'deskripsi' => $deskripsi,
               // 'url_file' => $,
               'publish' => $publish,
               'UUID' => $UUID,
               'create_by' => $create_by,
               'id_tingkatpelajaran' => $mapelID
           );

           //call fungsi insert soal
           $this->Mmodulonline->insert_soal($dataSoal);
            $this->up_img_soal($UUID);
           // // mengambil id soal untuk fk di tb_piljawaban
           // $data['tb_banksoal'] = $this->Mmodulonline->get_soalID($UUID)[0];
           // $soalID = $data['tb_banksoal']['id_soal'];        

           redirect(site_url('modulonline/allsoal'));
           // var_dump($dataSoal);
         // END SINTX UPLOAD SOAL  
    }

    //function upload gambar soal
     public function up_img_soal($UUID) {
        $config['upload_path'] = './assets/modul/';
        $config['allowed_types'] = 'doc|docx|ppt|pptx|pdf';
        $config['max_size'] = 10000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $gambar = "gambarSoal";
        $this->upload->do_upload($gambar);
        $file_data = $this->upload->data();
        $file_name = $file_data['file_name'];
        $data['UUID']=$UUID;
        $data['dataSoal']=  array(
            'url_file' => $file_name);

            $this->Mmodulonline->ch_soal($data);
    }
    //function upload gambar pembahasan
    public function up_img_pembahasan($UUID)
    {   
         // echo "img pembahasan";
         $configpmb['upload_path'] = './assets/image/pembahasan/';
        $configpmb['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        $configpmb['max_size'] = 100;
        $configpmb['max_width'] = 1024;
        $configpmb['max_height'] = 768;
        $this->load->library('upload', $configpmb);
        $this->upload->initialize($configpmb);
        $gambar = "gambarPembahasan";
        $this->upload->do_upload($gambar);
        $file_data = $this->upload->data();
        $file_name = $file_data['file_name'];
        $data['UUID']=$UUID;
        $data['dataSoal']=  array(
            'gambar_pembahasan' => $file_name
            );

            $this->Mmodulonline->ch_soal($data);
    }

    public function ch_img_soal($UUID) {
        $config['upload_path'] = './assets/modul/';
        $config['allowed_types'] = 'doc|docx|ppt|pptx|pdf';
        $config['max_size'] = 10000;
        // $config['max_width'] = 1024;
        // $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $gambar = "gambarSoal";
        $oldgambar = $this->Mmodulonline->get_oldgambar_soal($UUID);
        if ($this->upload->do_upload($gambar)) {
         foreach ($oldgambar as $rows) {
            unlink(FCPATH . "./assets/modul/" . $rows['url_file']);
         }
         $file_data = $this->upload->data();
         $file_name = $file_data['file_name'];
         $data['uuid']=$UUID;
         $data['dataSoal']=  array(
          'url_file' => $file_name);
         $this->Mmodulonline->ch_soal($data);
        }
        // $this->Mbanksoal->insert_gambar($datagambar);
    }

    #ENDFunction untuk form upload soal#
    #START Function untuk form update bank soal #

    public function formUpdate() {
        $tingkatmapel =htmlspecialchars($this->input->get('id_tingkatmapel'));
        // echo "<script> console.log($tingkatmapel)</script>";
        $data['id_tingkatpelajaran'] = $tingkatmapel;
        $data['infosoal']=$this->Mmodulonline->get_info_soal($tingkatmapel);
        $uuid = htmlspecialchars($this->input->get('uuid'));
        //get data soan where==UUID
        $data['banksoal'] = $this->Mmodulonline->get_onesoal($uuid)[0];
        // $id_soal = $data['modul']['id'];
            //get piljawaban == id soal
        // $data['piljawaban'] = $this->Mmodulonline->get_piljawaban($id_soal);
        $data['judul_halaman'] = "Modul Online";
        $data['files'] = array(
            APPPATH . 'modules/modulonline/views/v-update-soal.php',
            );
        #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses=='admin') {
            // jika admin
            if ($data['id_tingkatpelajaran'] == null || $UUID == null) {
                redirect(site_url('admin'));
            } else {
                $this->parser->parse('admin/v-index-admin', $data);
            }
            
        } elseif($hakAkses=='guru'){
            // jika guru
            if ($data['id_tingkatpelajaran'] == null || $uuid == null) {
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
        $id_tingkatpelajaran = htmlspecialchars($this->input->post('mataPelajaran'));
        $judul = htmlspecialchars($this->input->post('judul'));
        $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
        $publish = htmlspecialchars($this->input->post('publish'));

        $UUID = htmlspecialchars($this->input->post('UUID'));
        $create_by = $this->session->userdata['id'];

        #END post data soal#
        $data['uuid'] = $UUID;

        $data['dataSoal'] = array(
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            // 'jawaban' => $jawaban,
            'publish' => $publish,
            'create_by' => $create_by,
            'id_tingkatpelajaran' =>  $id_tingkatpelajaran
        );

        //call fungsi insert soal
        $this->Mmodulonline->ch_soal($data);
        $this->ch_img_soal($UUID);
        redirect(site_url('modulonline/allsoal'));
    }


    #END Function untuk form update bank soal #
    #END Function untuk delete bank soal #

    public function deletebanksoal($data) {
        $this->Mmodulonline->del_banksoal($data);
    }

    // fungsi untuk memfilter video yang akan di tampilkan
    public function filtermodul()
    {
        $tingkatID = $this->input->post('tingkat');
        $mpID = $this->input->post('mataPelajaran');
        // $bab=$this->input->post('bab');
        // $subbab=$this->input->post('subbab');
        if ($mpID != null) {
            $this->soalMp($mpID);
        } else if ($tingkatID != null) {
            $this->soalTingkat($tingkatID);
        } else {
           $this->allsoal();
            // $this->listsoal($subbab);
        }    
    }

     // list soal per mata Pelajaran
    public function soalMp($mpID)
    { 
        // $subBab = htmlspecialchars($this->input->get('subbab'));
        $data ['mpID'] = $mpID;
        $tingkatPelajaranID=$mpID;
        $namaMp=$this->Mmodulonline->get_namaMp($mpID);
        $data['namaMp']=$namaMp;
        $data['judul_halaman'] = "Modul Online ".$namaMp;
        $data['files'] = array(
            APPPATH . 'modules/modulonline/views/v-soal-mp.php',
            );
        #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses =='admin') {
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

    // list soal per tingkat
    public function soalTingkat($tingkatID)
    { 
        // $subBab = htmlspecialchars($this->input->get('subbab'));
        $data ['tingkatID'] = $tingkatID;
        $tingkatPelajaranID=$tingkatID;
        $tingkat=$this->Mmodulonline->get_namaTingkat($tingkatPelajaranID);
        $data['tingkat']=$tingkat;
        $data['judul_halaman'] = "Modul ".$tingkat;
        $data['files'] = array(
            APPPATH . 'modules/modulonline/views/v-soal-tingkat.php',
            );
        #START cek hakakses#
        $hakAkses=$this->session->userdata['HAKAKSES'];
        if ($hakAkses =='admin') {
            // jika admin
            if ($tingkatID == null) {
                redirect(site_url('admin'));
            } else {
                $this->parser->parse('admin/v-index-admin', $data);
            }
            
        } elseif($hakAkses=='guru'){
             // jika guru
            if ($tingkatID == null) {
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

    public function allmodul() {

        $data = array(

            'judul_halaman' => 'Neon - Edu Drive',

            'judul_header' =>'Welcome',

            'judul_header2' =>'Modul Belajar'



        );



        $data['files'] = array( 

            APPPATH.'modules/homepage/views/v-header-login.php',

            APPPATH.'modules/modulonline/views/v-edudrive.php',

            // APPPATH.'modules/welcome/views/v-tampil-tes.php',

            APPPATH.'modules/testimoni/views/v-footer.php',

        );

        $data['tingkat'] = $this->load->MTingkat->gettingkat();

        // print_r($data['tingkat']);
        $data['pelajaran_sma'] = $this->mmatapelajaran->daftarMapelSMA();
        $data['pelajaran_sma_ips'] = $this->mmatapelajaran->daftarMapelSMAIPS();
        $data['pelajaran_smp'] = $this->mmatapelajaran->daftarMapelSMP();
        $data['pelajaran_sd'] = $this->mmatapelajaran->daftarMapelSD();
        $data['pelajaran_sma_ipa'] = $this->mmatapelajaran->daftarMapelSMAIPA();

        $this->parser->parse( 'templating/index', $data );

    }

}

?>