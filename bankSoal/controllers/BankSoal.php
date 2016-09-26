<?php 
/**
* 
*/
class  BankSoal extends MX_Controller 
{
	
		function __construct()
		{
			 parent::__construct();
	        $this->load->model( 'mbanksoal' );
	        $this->load->model('Templating/mtemplating');
		}



		public function listmp($tingkatID)
		{	
			$data['tingkat']  = $this->mtemplating->get_tingkat();
			$data['pelajaran'] =$this->mbanksoal->get_pelajaran($tingkatID);
			$data['tingkatID'] = $tingkatID;
			
			$data['files'] = array(
				APPPATH.'modules/banksoal/views/v-list-mp.php',
				);

			$data['judul_halaman'] = "List  Mata Pelajaran";

			$this->load->view( 'templating/index-b-guru', $data );


			// $data['pelajaran'] =$this->mbanksoal->get_pelajaran($tingkatID);
			// // var_dump($data['pelajaran']); //for testing
			// $this->load->view('templating/t-footer-back');
	  //       $this->load->view('templating/t-header');
			// $this->load->view('v-list-mp',$data);
		}

		public function listbab($tingkatPelajaranID)
		{
			$data['tingkat']  = $this->mtemplating->get_tingkat();

			$data['bab'] =$this->mbanksoal->get_bab($tingkatPelajaranID);
			$data['judul_halaman'] = "List Bab";
			$data['files'] = array(
				APPPATH.'modules/banksoal/views/v-list-bab.php',
				);
			$this->load->view( 'templating/index-b-guru', $data );




			// $data['bab'] =$this->mbanksoal->get_bab($tingkatPelajaranID);
			// // var_dump($data['pelajaran']); //for testing
			// $this->load->view('templating/t-footer-back');
	  //       $this->load->view('templating/t-header');
			// $this->load->view('v-list-bab',$data);
		}

		public function listsoal($babID)
		{
			$data['tingkat']  = $this->mtemplating->get_tingkat();
			$data['soal'] =$this->mbanksoal->get_soal($babID);
			$data ['babID']= $babID;	
			$data['judul_halaman'] = "List  Soal";
			$data['files'] = array(
				APPPATH.'modules/banksoal/views/v-list-soal.php',
				);
			$this->load->view( 'templating/index-b-guru', $data );


			// $data['soal'] =$this->mbanksoal->get_soal($babID);
			// // var_dump($data);
			// $data ['babID']= $babID;	

			// $this->load->view('templating/t-footer-back');
	  //       $this->load->view('templating/t-header');
			// $this->load->view('v-list-soal',$data);
		}

	#Start Function untuk form upload bank soal#
		public function formsoal()
		{	
			$data['tingkat']  = $this->mtemplating->get_tingkat();
			$data['babID']=htmlspecialchars($this->input->post('babID'));
			$data['judul_halaman'] = "Form Input Soal";
			$data['files'] = array(
				APPPATH.'modules/banksoal/views/v-form-soal.php',
				);
			$this->load->view( 'templating/index-b-guru', $data );

			// $data['babID']=htmlspecialchars($this->input->post('babID'));

			// $this->load->view('templating/t-footer-back');
	  //       $this->load->view('templating/t-header');
			// $this->load->view('v-form-soal',$data);
		}

		public function uploadsoal()
		{
			$options = htmlspecialchars($this->input->post('options'));
			$UUID=uniqid();
			$soal=($this->input->post('editor1'));
			$babID	= htmlspecialchars($this->input->post('babID'));
			$jawaban = htmlspecialchars($this->input->post('jawaban'));
			$kesulitan = htmlspecialchars($this->input->post('kesulitan'));
			$sumber = htmlspecialchars($this->input->post('sumber'));
			$publish = htmlspecialchars($this->input->post('gift'));		
			$a=htmlspecialchars($this->input->post('a'));
			$b=htmlspecialchars($this->input->post('b'));
			$c=htmlspecialchars($this->input->post('c'));
			$d=htmlspecialchars($this->input->post('d'));
			$e=htmlspecialchars($this->input->post('e'));
			$create_by =  $this->session->userdata['id'];
			//kesulitan indks 1-3
			$dataSoal = array(
					
	                'soal' => $soal,
	                'jawaban' => $jawaban,
	                'sumber'=> $sumber,
	                'kesulitan' => $kesulitan,
	                'publish' => $publish,
	                'create_by' => $create_by,
	                'id_bab' => $babID,
	                'UUID' => $UUID
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
						'pilihan' => 'A' ,
						'jawaban' => $a,
						'id_soal' => $soalID
						),
					array(
						'pilihan' => 'B' ,
						'jawaban' => $b,
						'id_soal' => $soalID
						),
					array(
						'pilihan' => 'C' ,
						'jawaban' => $c,
						'id_soal' => $soalID
						),
					array(
						'pilihan' => 'D' ,
						'jawaban' => $d,
						'id_soal' => $soalID
						),
					array(
						'pilihan' => 'E' ,
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
			redirect(site_url('banksoal/listsoal/'.$babID));

		}



		public function uploadgambar($soalID)
		{
			$config['upload_path'] = './assets/image/jawaban/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png';
	        $config['max_size'] = 100;
	        $config['max_width'] = 1024;
	        $config['max_height'] = 768;
	        $this->load->library( 'upload', $config );

	        $n='1';
	        $datagambar=array();
	     	for ($x = 1; $x <= 5; $x++) {
	       		$gambar="gambar".$n;
	       		$this->upload->do_upload($gambar);
	       		

	       		$file_data = $this->upload->data();
	         	$file_name = $file_data['file_name'];
	         	if ($n=='1') {
	         		$pilihan = "A";
	         	} else if($n=='2') {
	         		$pilihan ="B";
	         	}else if($n=='3') {
	         		$pilihan = "C";
	         	}else if($n=='4'){
	         		$pilihan = 'D';
	         	}else{
	         		$pilihan = 'E';
	         	}
	         	
	         	$datagambar[]=array('pilihan'=>$pilihan,
	         				 		'gambar'=>$file_name,
	         				 		'id_soal'=>$soalID);
	         	
	         	$n++;
	       	}
	       	
	       	$this->mbanksoal->insert_gambar($datagambar);


		}

	#ENDFunction untuk form upload soal#

	#START Function untuk form update bank soal #
		public function formUpdate()
		{
			$this->load->view('templating/t-footer-back');
	        $this->load->view('templating/t-header');
			$data['babID']=htmlspecialchars($this->input->post('babID'));
			$UUID = htmlspecialchars($this->input->post('UUID'));
			//get data soan where==UUID
			$data['bankSoal']=$this->mbanksoal->get_onesoal($UUID)[0];
			$id_soal=$data['bankSoal']['id_soal'];
			//get piljawaban == id soal
			$data['piljawaban']=$this->mbanksoal->get_piljawaban($id_soal);
			$this->load->view('v-update-soal',$data);
			

		}
		public function updateBanksoal()
		{	
			#Start post data soal#
			$options = htmlspecialchars($this->input->post('options'));
			$soal=($this->input->post('editor1'));
			$soalID=htmlspecialchars($this->input->post('soalID'));
			$UUID	= htmlspecialchars($this->input->post('UUID'));
			$babID	= htmlspecialchars($this->input->post('babID'));
			$jawaban = htmlspecialchars($this->input->post('jawaban'));
			$kesulitan = htmlspecialchars($this->input->post('kesulitan'));
			$sumber = htmlspecialchars($this->input->post('sumber'));
			$publish = htmlspecialchars($this->input->post('gift'));
			$create_by =  $this->session->userdata['id'];
			#END post data soal#

			#Start post data pilihan jawaban#
			$idA = htmlspecialchars($this->input->post('idpilA'));
			$idB = htmlspecialchars($this->input->post('idpilB'));
			$idC = htmlspecialchars($this->input->post('idpilC'));
			$idD = htmlspecialchars($this->input->post('idpilD'));
			$idE = htmlspecialchars($this->input->post('idpilE'));
			$a=htmlspecialchars($this->input->post('a'));
			$b=htmlspecialchars($this->input->post('b'));
			$c=htmlspecialchars($this->input->post('c'));
			$d=htmlspecialchars($this->input->post('d'));
			$e=htmlspecialchars($this->input->post('e'));
			#END post data pilihan jawaban#
			
			//keterangan *kesulitan index 1-3

			
			$data['UUID']=$UUID;
			$data['dataSoal'] = array(
					
	                'soal' => $soal,
	                'jawaban' => $jawaban,
	                'sumber'=> $sumber,
	                'kesulitan' => $kesulitan,
	                'publish' => $publish,
	                'create_by' => $create_by,
	            );

			//call fungsi insert soal
			$this->mbanksoal->ch_soal($data);

			#Start pengecekan jenis inputan jawaban#
			//pengkondisian untuk jenis inputan text atau gambar
			if ($options == 'text') {
				#jika inputan text
				//data untuk pilahan jawaban
				// $data['']=
				$data['dataJawaban']= array(
					array(
						'pilihan' => 'A' ,
						'jawaban' => $a,
						'id_pilihan' => $idA
						),
					array(
						'pilihan' => 'B' ,
						'jawaban' => $b,
						'id_pilihan' => $idB
						),
					array(
						'pilihan' => 'C' ,
						'jawaban' => $c,
						'id_pilihan' => $idC
						),
					array(
						'pilihan' => 'D' ,
						'jawaban' => $d,
						'id_pilihan' => $idD
						),
					array(
						'pilihan' => 'E' ,
						'jawaban' => $e,
						'id_pilihan' => $idE
						)
					);

			// 		//call function insert jawaban tet
					$this->mbanksoal->ch_jawaban($data);
			} else {
				#jika inputan gambar
				// call functiom upload gamabar
				$this->updategambar($soalID);
			}
			#END pengecekan jenis inputan jawaban#
			redirect(site_url('banksoal/listsoal/'.$babID));

		}

		public function updategambar($soalID)
		{

			// unlink( FCPATH . "./assets/image/jawaban/".$xxxx );
			$config['upload_path'] = './assets/image/jawaban/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png';
	        $config['max_size'] = 100;
	        $config['max_width'] = 1024;
	        $config['max_height'] = 768;
	        $this->load->library( 'upload', $config );

	        $oldgambar=$this->mbanksoal->get_oldgambar($soalID);

	        
	      

	        $n='1';
	        $datagambar=array();
	     	foreach ($oldgambar as $rows ) {
	     		// remove old gambar   		
	     		
	       		$gambar="gambar".$n;
	       		
	       		if ($this->upload->do_upload($gambar)) {
	       			unlink( FCPATH . "./assets/image/jawaban/".$rows['gambar'] );
	       			$file_data = $this->upload->data();
		         	$file_name = $file_data['file_name'];
		         	if ($n=='1') {
		         		$pilihan = "A";
		         	} else if($n=='2') {
		         		$pilihan ="B";
		         	}else if($n=='3') {
		         		$pilihan = "C";
		         	}else if($n=='4'){
		         		$pilihan = 'D';
		         	}else{
		         		$pilihan = 'E';
		         	}
		         	
		         	$datagambar[]=array('pilihan'=>$pilihan,
		         				 		'gambar'=>$file_name,
		         				 		'id_soal'=>$soalID,
		         				 		'id_pilihan'=>$rows['id_pilihan']);
		         	echo "masuk".$n;
	       		} 
        	
	         	$n++;
	       	}
	       	
	       	$this->mbanksoal->ch_gambar($datagambar);
	       	// var_dump($oldgambar);


		}
	#END Function untuk form update bank soal #

	#END Function untuk delete bank soal #
		public function deleteBanksoal($data)
		{
			$this->mbanksoal->del_banksoal($data);
		}
	#END Function untuk delete update bank soal #


}
 ?>