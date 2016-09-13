<?php

/**
 *
 */
class Admin extends MX_Controller {


    public function __construct() {
        parent::__construct();
         // $this->load->model( 'madmin' );
        // $this->load->model( 'guru/mguru' );
       


    }

    public function index  ()
    {
        echo "masuk admin";
         $this->load->view( 'templating/t-header' );
        
        $this->load->view( 'v-left-bar-admin' );
    }



}
?>
