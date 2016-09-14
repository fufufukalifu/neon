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
		$data['bab'] =$this->mbanksoal->get_pelajaran($tingkatPelajaranID);
		// var_dump($data['pelajaran']); //for testing
		$this->load->view('templating/t-footer-back');
        $this->load->view('templating/t-header');
		$this->load->view('v-list-bab',$data);
	}

	public function listsoal()
	{
		# code...
	}

	public function formsoal()
	{	
		$this->load->view('templating/t-footer-back');
        $this->load->view('templating/t-header');
		$this->load->view('v-form-soal');
	}

	public function uploadsoal()
	{
		$soal=htmlspecialchars($this->input->post('soal'));
		$jawaban = htmlspecialchars($this->input->post('jawaban'));
		$kesulitan = htmlspecialchars($this->input->post('kesulitan'));
		$sumber = htmlspecialchars($this->input->post('sumber'));
		$publish = htmlspecialchars($this->input->post('publishs'));
	}

}
 ?>