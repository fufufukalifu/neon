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
	}



	public function listmp($tingkatID)
	{	
		$data['pelajaran'] =$this->mbanksoal->get_pelajaran($tingkatID);
		// var_dump($data['pelajaran']); //for testing
		$this->load->view('templating/t-footer-back');
        $this->load->view('templating/t-header');
		$this->load->view('v-list-mp',$data);
	}

	public function listbab($tingkatPelajaranID)
	{

		$data['bab'] =$this->mbanksoal->get_bab($tingkatPelajaranID);
		// var_dump($data['pelajaran']); //for testing
		$this->load->view('templating/t-footer-back');
        $this->load->view('templating/t-header');
		$this->load->view('v-list-bab',$data);
	}

	public function listsoal($babID)
	{
		$data['soal'] =$this->mbanksoal->get_soal($babID);
		// var_dump($data);
		$data ['babID']= $babID;	

		$this->load->view('templating/t-footer-back');
        $this->load->view('templating/t-header');
		$this->load->view('v-list-soal',$data);
	}

	public function formsoal()
	{	
		$data['babID']=htmlspecialchars($this->input->post('babID'));

		$this->load->view('templating/t-footer-back');
        $this->load->view('templating/t-header');
		$this->load->view('v-form-soal',$data);
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
					'jawaban' => $e,
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
        $dat_gambar=array();
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

}
 ?>