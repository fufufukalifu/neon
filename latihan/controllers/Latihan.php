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
		var_dump($data);
		// foreach ($variable as $key => $value) {
		// 	# code...
		// }
		// $data['piljawaban']=$this->mlatihan->get_piljawaban();
	}

	public function formlatihan()
	{
		
        $data = array(
            'judul_halaman' => 'Netjoo - Welcome',
            'judul_header' =>'Welcome'
        );

        $data['files'] = array( 
            APPPATH.'modules/homepage/views/v-header.php',
            APPPATH.'modules/templating/views/t-f-pagetitle.php',
            APPPATH.'modules/homepage/views/v-footer.php',
        );

       

        $this->parser->parse( 'templating/index', $data );
	}
}
 ?>