<?php 
	/**
	* 
	*/
	class Example extends CI_Controller
	{
		
		function __construct()
		{
			parrent::__construct();
			$this->load->helper('url'); 
			$this->output->set_template('default');
		}

		public function index() {
			echo "Example";
   			$this->middle = 'home';
    		$this->layout();
  		}
	}
 ?>