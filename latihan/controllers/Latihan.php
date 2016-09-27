<?php 
/**
* 
*/
class Latihan extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model( 'mlatihan' );

        $this->load->library( 'parser' );
	}

	public function index()
	{
		$data['banksoal']=$this->mlatihan->get_banksoal();
		$id_soal=array();
		foreach ($data['banksoal'] as $row) {
			$id_soal[]= array('id_soal'=> $row['id_soal']);
		}
		var_dump($id_soal);

		$data['pilihan']=$this->mlatihan->get_piljawaban($id_soal);
		$this->load->library('table');
		echo $this->table->generate($data['pilihan']);
		// var_dump($data);
		
		// $data['piljawaban']=$this->mlatihan->get_piljawaban();
	}

	public function formlatihan()
	{
		
        $data = array(
            'judul_halaman' => 'Netjoo - Welcome',
            'judul_header' =>'Welcome'
        );

        $data['files'] = array( 
            APPPATH.'modules/homepage/views/v-header-login.php',
            APPPATH.'modules/templating/views/t-f-pagetitle.php',
            APPPATH.'modules/homepage/views/v-footer.php',
        );

       

        $this->parser->parse( 'templating/index', $data );
	}
}
 ?>