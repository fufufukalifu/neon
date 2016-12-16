<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
 class Linetopik extends MX_Controller
 {
 	
 	function __construct()
 	{
 		$this->load->model('Mlinetopik');
 		 $this->load->library('parser');
 	}

 	public function index()
 	{
 		echo "string";
 	}

 	public function learningLine($UUID)
 	{
 		// var_dump($data['datline']);
 		        $data = array(
            'judul_halaman' => 'Netjoo - Welcome',
            'judul_header' => 'Welcome'
        );


 		$dat=$this->Mlinetopik->get_line_topik($UUID);
 		$data['datline']=array();
 		foreach ($dat as $rows) {
 			$data['namaTopik']=$rows['namaTopik'];
            $data['deskripsi']=$rows['deskripsi'];
 			$tampJenis = $rows['jenisStep'];
 			$UUID = $rows['stepUUID'];
 			if ($tampJenis == '1') {
 				$jenis='Video';
 				$icon ='Video';
 				$link = base_url('index.php/linetopik/step_video/').$UUID;
 			}else if ($tampJenis == '2') {
 				$jenis='Materi';
 				$icon ='Materi';
 				$link = base_url('index.php/linetopik/step_materi/').$UUID;
 			}else{
 				$jenis='Latihan';
 				$icon ='Latihan';
 				$link = base_url('index.php/linetopik/step_quiz/').$UUID;
 			}
 			$data['datline'][]=array(
 				'namaStep'=> $rows['namaStep'],
 				'jenisStep'=>$jenis,
 				'icon' =>$icon,
 				'link' => $link);

 		}
        $data['files'] = array(

            APPPATH . 'modules/homepage/views/v-header-login.php',

            APPPATH . 'modules/linetopik/views/v-line-topik.php',

            APPPATH . 'modules/homepage/views/v-footer.php',

        );





        $this->parser->parse('templating/index', $data);
 	}

 	// view step video
 	public function step_video($UUID)
 	{
 		 $data = array(

            'judul_halaman' => 'Netjoo - Step Video',

            'judul_header' => 'Step Video'

        );
 		 $data['datVideo']=$this->Mlinetopik->get_datVideo($UUID);
 		  $data['files'] = array(

            APPPATH . 'modules/homepage/views/v-header-login.php',

            APPPATH . 'modules/linetopik/views/v-step-video.php',

            APPPATH . 'modules/homepage/views/v-footer.php',

        );


        $this->parser->parse('templating/index', $data);

 	}
 	// View step Materi
 	 	public function step_materi($UUID)
 	{
 		 $data = array(

            'judul_halaman' => 'Netjoo - Step Materi',

            'judul_header' => 'Step Materi'

        );
 		  $data['datMateri']=$this->Mlinetopik->get_datMateri($UUID);
          $timestamp = strtotime($data['datMateri']['date_created']);
          $data['tgl']=date("d", $timestamp);
           $data['bulan']=date("M", $timestamp);
 		  $data['files'] = array(

            APPPATH . 'modules/homepage/views/v-header-login.php',

            APPPATH . 'modules/linetopik/views/v-step-materi.php',

            APPPATH . 'modules/homepage/views/v-footer.php',

        );


        $this->parser->parse('templating/index', $data);

 	}
 	// view step Quiz
 	 	public function step_quiz($UUID)
 	{
 		 $data = array(

            'judul_halaman' => 'Netjoo - Step Quiz',

            'judul_header' => 'Step Quiz'

        );
 		  $data['files'] = array(

            APPPATH . 'modules/homepage/views/v-header-login.php',

            APPPATH . 'modules/linetopik/views/v-step-quiz.php',

            APPPATH . 'modules/homepage/views/v-footer.php',

        );


        $this->parser->parse('templating/index', $data);

 	}

 } ?>