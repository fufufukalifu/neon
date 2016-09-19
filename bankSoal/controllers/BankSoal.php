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

	public function uploadsoal($babID)
	{
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


			$this->mbanksoal->insert_jawaban($dataJawaban);


	}

}
 ?>