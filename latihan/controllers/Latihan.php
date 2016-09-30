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
		$data = array(
            'judul_halaman' => 'Latihan - Neon',
            'judul_header' => 'Latihan'
        	);
		
		// get soal randoom
		$data['banksoal']=$this->mlatihan->get_banksoal();

		$id_soal=array();//untuk menampung id
		foreach ($data['banksoal'] as $row) {
			$id_soal[]= array('id_soal'=> $row['id_soal']);
		}
	
		// get pilihan jawaban sesuai dgn soal
		$data['pilihan']=$this->mlatihan->get_piljawaban($id_soal);

		
		// for testing
		$this->load->library('table');
		echo $this->table->generate($data['banksoal']);
		echo "==================================";
		echo $this->table->generate($data['pilihan']);

		var_dump($data['banksoal']);
		  

        // $data['files'] = array(
        //     APPPATH . 'modules/templating/views/v-navbarregister.php',
        //     APPPATH . 'modules/latihan/views/v-latihan.php',
        //     APPPATH . 'modules/homepage/views/v-footer.php',
        // );



       

        // $this->parser->parse('templating/index', $data);

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