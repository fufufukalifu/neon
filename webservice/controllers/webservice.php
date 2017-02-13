<?php 
/**
 * 
 */
 class Webservice extends MX_Controller
 {
 	
 	public function __construct()
	{
		# code...
	}

	public function getName($id)
	{
		return 'sam';
	}


}
$params= array('uri'=>base_url()."Webservice.php");
$server = new webservice(null,$params);
$server->setClass('Webservice');
$server->hendle();
 ?>