<?php

/**
 * 
 */
class Modulonline extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mmodulonline');
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
      
       
        $data['pelajaran'] = $this->Mmodulonline->get_pelajaran($tingkatID);
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
        $data['bab'] = $this->Mmodulonline->get_bab($mpID);
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

        $data['subbab'] = $this->Mmodulonline->get_subbab($babID);
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
    public function subsoal($subBab ) {
        $data ['subBab'] = $subBab;
        $datSub=$this->Mmodulonline->dat_sub($subBab);
        $babID=$datSub->babID;
        $datBab=$this->Mmodulonline->get_judulBab($babID);
        $judulBab=$datBab->judulBab;
        $tingkatPelajaranID=$datBab->tingkatPelajaranID;
        $namaMp=$this->Mmodulonline->get_namaMp($tingkatPelajaranID);
        $data ['judulSub'] =$datSub->judulSubBab;
        $data['judul_halaman'] = "Bank Soal ".$namaMp."/".$judulBab;
        $data['files'] = array(
            APPPATH . 'modules/banksoal/views/v-soal-sub.php',
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
        $list  = $this->Mmodulonline->get_soal($subBab);
         $pilihan = $this->Mmodulonline->get_pilihan($subBab);

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
            $soal=$list_soal['soal'];
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
            $row[] = $kesulitan;
             $valSoal=$this->cek_soal_tabel($soal);
            if ($valSoal == true) {
                $row[] = '<a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Soal</a>';
            } else if (strlen($soal)>160 ) {
           
                 $row[] = substr($soal,  0, 140). '... <a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Detail</a>';
            } else {
                $row[] = $soal;
            }
            
           
            $row[] = $jawabanBenar.'<input type="text" id="jawaban-'.$id_soal.'" value="'.$jawabanBenar.'" hidden="true">';
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
                                                <button type="submit" title="edit" class="btn btn-sm btn-warning"><i class="ico-file5"></i></button>

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

    ##Start Function untuk halaman soal perBab##
     // function untuk mengambil data soal
    function ajax_soalPerbab($bab) {
        $list  = $this->Mmodulonline->get_soal_bab($bab);
        $pilihan = $this->Mmodulonline->get_pilihan_bab($bab);
        $data = array();
        $baseurl = base_url();
        foreach ( $list as $list_soal ) {
            $jawabanBenar= "";
            $jawaban=$list_soal['jawaban'];
            $tingkat=$list_soal['kesulitan'];
            $id_soal=$list_soal['id_soal'];
            $random=$list_soal['random'];
            $publish=$list_soal['publish'];
            $soal=$list_soal['soal'];
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
            $row[] = $list_soal['judulSubBab'];
            $row[] = $kesulitan;
               $valSoal=$this->cek_soal_tabel($soal);
            if ($valSoal == true) {
                $row[] = '<a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Soal</a>';
            } else if (strlen($soal)>160 ) {
           
                 $row[] = substr($soal,  0, 140). '... <a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Detail</a>';
            } else {
                $row[] = $soal;
            }
            
           
            $row[] = $jawabanBenar.'<input type="text" id="jawaban-'.$id_soal.'" value="'.$jawabanBenar.'" hidden="true">';
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
                                                <button type="submit" title="edit" class="btn btn-sm btn-warning"><i class="ico-file5"></i></button>

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

    ##
 ##Start Function untuk halaman soal per mata pelajaran##
     // function untuk mengambil data soal
    function ajax_soalPerMp($idMp) {
      $list  = $this->Mmodulonlinel->get_soal_mp($idMp);
        $pilihan = $this->Mmodulonline->get_pilihan_mp($idMp);
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
            $row[] = $list_soal['judulBab'];
            $row[] = $kesulitan;
            $soal=$list_soal['soal'];
              $valSoal=$this->cek_soal_tabel($soal);
            if ($valSoal == true) {
                $row[] = '<a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Soal</a>';
            } else if (strlen($soal)>160 ) {
           
                 $row[] = substr($soal,  0, 140). '... <a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Detail</a>';
            } else {
                $row[] = $soal;
            }
            
           
            $row[] = $jawabanBenar.'<input type="text" id="jawaban-'.$id_soal.'" value="'.$jawabanBenar.'" hidden="true">';
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
                                                <button type="submit" title="edit" class="btn btn-sm btn-warning"><i class="ico-file5"></i></button>

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
 ##Start Function untuk halaman soal per mata pelajaran##
     // function untuk mengambil data soal
    function ajax_soalPerTkt($tingkatID) {
      $list  = $this->Mmodulonline->get_soal_tkt($tingkatID);
        $pilihan = $this->Mmodulonline->get_pilihan_tkt($tingkatID);
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
            $soal=$list_soal['soal'];
            $valSoal=$this->cek_soal_tabel($soal);
            if ($valSoal == true) {
                $row[] = '<a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Soal</a>';
            } else if (strlen($soal)>160 ) {
           
                 $row[] = substr($soal,  0, 140). '... <a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Detail</a>';
            } else {
                $row[] = $soal;
            }
            
           
            $row[] = $jawabanBenar.'<input type="text" id="jawaban-'.$id_soal.'" value="'.$jawabanBenar.'" hidden="true">';
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
                                                <button type="submit" title="edit" class="btn btn-sm btn-warning"><i class="ico-file5"></i></button>

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

    ## START FUNCTION UNTUK HALAMAN ALL SOAL##
    //function untuk menampilkan halaman all soal
    public function allsoal()
    {
        // $data['soal'] = $this->Mbanksoal->get_allsoal();
        // $data['pilihan'] = $this->Mbanksoal->get_allpilihan();
       
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
        $pilihan = $this->Mmodulonline->get_allpilihan();

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
            $soal=$list_soal['soal'];
            // pengecekan soal jika ada tabel
            $valSoal=$this->cek_soal_tabel($soal);
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
            if ($valSoal == true) {
                $row[] = '<a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Soal</a>';
            } else if (strlen($soal)>160 ) {
              // <a class="btn btn-sm btn-primary detail-'.$list_video['videoID'].'"  title="Play"
              // data-id='."'".json_encode($list_video)."'".'
              // onclick="detail('."'".$list_video['videoID']."'".')"
              // >
              // <i class=" ico-play3"></i>
              //   </a> 
                 $row[] = substr($soal,  0, 140). '... <a class="label label-info   detail-'.$id_soal.'"  title="lihat detail" data-id='."'".json_encode($list_soal)."'".'onclick="detailSoal('."'".$id_soal."'".')"><i class="ico-eye" ><i>Lihat Detail</a>';
            } else {
                $row[] = $soal;
            }
            
           
            $row[] = $jawabanBenar.'<input type="text" id="jawaban-'.$id_soal.'" value="'.$jawabanBenar.'" hidden="true">';
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
                                                <button type="submit" title="edit" class="btn btn-sm btn-warning"><i class="ico-file5"></i></button>

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
    public function up_video_pembahasan($UUID)
    {
        // echo "video pembahasan";
          $configvideo['upload_path'] = './assets/video/videoPembahasan';
        $configvideo['allowed_types'] = 'mp4';
        $configvideo['max_size'] = 90000;
        $this->load->library('upload', $configvideo);
        $this->upload->initialize($configvideo);
             // pengecekan upload
        if (!$this->upload->do_upload('video')) {
                // jika upload video gagal
            $error = array('error' => $this->upload->display_errors());

        } else {
                // jika uplod video berhasil jalankan fungsi penyimpanan data video ke db
              $file_data = $this->upload->data();
           $file_name = $file_data['file_name'];
        $data['UUID']=$UUID;
        $data['dataSoal']=  array(
            'video_pembahasan' => $file_name,
            'pembahasan'=>'');

            $this->Mmodulonline->ch_soal($data);


           
        }
    }
    public function ch_img_soal($UUID) {
        $config['upload_path'] = './assets/image/soal/';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $gambar = "gambarSoal";
        $oldgambar = $this->Mmodulonline->get_oldgambar_soal($UUID);
        if ($this->upload->do_upload($gambar)) {
         foreach ($oldgambar as $rows) {
            unlink(FCPATH . "./assets/image/soal/" . $rows['gambar_soal']);
         }
         $file_data = $this->upload->data();
         $file_name = $file_data['file_name'];
         $data['UUID']=$UUID;
         $data['dataSoal']=  array(
          'gambar_soal' => $file_name);
         $this->Mmodulonline->ch_soal($data);
        }
        // $this->Mbanksoal->insert_gambar($datagambar);
    }
    //function untuk mengupload gambar pilihan jawaban
    public function up_img_jawaban($soalID) {
        $config2['upload_path'] = './assets/image/jawaban/';
        $config2['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
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

        $this->Mmodulonline->insert_gambar($datagambar);
    }

    #ENDFunction untuk form upload soal#
    #START Function untuk form update bank soal #

    public function formUpdate() {
        $subBabID =htmlspecialchars($this->input->get('subBab'));
        $data['subBabID'] = $subBabID;
        $data['infosoal']=$this->Mmodulonline->get_info_soal($subBabID);
        $UUID = htmlspecialchars($this->input->get('UUID'));

        //get data soan where==UUID
        $data['banksoal'] = $this->Mmodulonline->get_onesoal($UUID)[0];
        $id_soal = $data['banksoal']['id_soal'];
            //get piljawaban == id soal
        $data['piljawaban'] = $this->Mmodulonline->get_piljawaban($id_soal);
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
        $data['a'] = $this->input->post('a');
        $data['b'] = $this->input->post('b');
        $data['c']= $this->input->post('c');
        $data['d'] = $this->input->post('d');
        $data['e'] = $this->input->post('e');
        #END post data pilihan jawaban#
        //keterangan *kesulitan index 1-3
// var_dump(jum_pilihan);

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
        $this->Mmodulonline->ch_soal($data);
        $this->ch_img_soal($UUID);

        #data yg dilempar ke function count_pilihan#
        // data['id_soal'] digunakan untuk function pengecekan jumlah pilihan
        $data['id_soal']=$soalID;
        $data['jum_pilihan']=$jum_pilihan;
       
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
                    'jawaban' => $data['a'],
                ),
                array(
                    'pilihan' => 'B',
                    'jawaban' => $data['b'],
                ),
                array(
                    'pilihan' => 'C',
                    'jawaban' => $data['c'],
                ),
                array(
                    'pilihan' => 'D',
                    'jawaban' => $data['d'],
                )
               );
            } else {
                $data['dataJawaban']  = array(
                   array(
                    'pilihan' => 'A',
                    'jawaban' => $data['a'],
                ),
                array(
                    'pilihan' => 'B',
                    'jawaban' => $data['b'],
                ),
                array(
                    'pilihan' => 'C',
                    'jawaban' => $data['c'],
                ),
                array(
                    'pilihan' => 'D',
                    'jawaban' => $data['d'],
                ),
                array(
                    'pilihan' => 'E',
                    'jawaban' => $data['e'],
                )
               );
            }
             
            //call function insert jawaban tet
            $this->Mmodulonline->ch_jawaban($data);
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
      $count_dat=$this->Mmodulonline->get_count_pilihan($id_soal);
      $a = $count_dat;
      if ( $count_dat>$data['jum_pilihan']) {
        $this->Mmodulonline->del_oneJawaban( $id_soal);
      } else if ($count_dat < 2 && $data['jum_pilihan'] == 4 ) {
        echo
          $dataJawaban = array(
            array('pilihan' => 'A',
             'id_soal' => $id_soal),
            array('pilihan' => 'B',
                'id_soal' => $id_soal),
            array('pilihan' => 'C',
                'id_soal' => $id_soal),
            array('pilihan' => 'D',
                'id_soal' => $id_soal));
          $this->Mmodulonlinel->insert_jawaban($dataJawaban);
      }else if ($count_dat < 2 && $data['jum_pilihan'] == 5 ) {
          $dataJawaban = array(
            array('pilihan' => 'A',
                'id_soal' => $id_soal),
            array('pilihan' => 'B',
                'id_soal' => $id_soal),
            array('pilihan' => 'C',
                'id_soal' => $id_soal),
            array('pilihan' => 'D',
                'id_soal' => $id_soal),
            array('pilihan' => 'E',
                'id_soal' => $id_soal));
           $this->Mmodulonline->insert_jawaban($dataJawaban);
      }else if ($count_dat<$data['jum_pilihan']) {
        // insert pilihan jawaban option E
        $pil_E = array(
          'pilihan' => 'E',
          'id_soal' => $id_soal
        );
        $this->Mmodulonline->add_oneJawaban($pil_E);

      }

    }

    public function ch_img_jawaban($soalID) {

        // unlink( FCPATH . "./assets/image/jawaban/".$xxxx );
        $config2['upload_path'] = './assets/image/jawaban/';
        $config2['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        $config2['max_size'] = 100;
        $config2['max_width'] = 1024;
        $config2['max_height'] = 768;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);

        $oldgambar = $this->Mmodulonline->get_oldgambar($soalID);

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
         $this->Mmodulonline->ch_gambar($datagambar);
        }
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
}

?>