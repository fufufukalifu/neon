<?php 
class Video extends MX_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Mvideos');
    }
    
    ########### FRONT END  ####################
    public function index() {
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbarUser');
       $this->load->view('templating/t-title-site');
       $this->load->view('templating/t-footer');
    }

    public function videobelajar(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('v-banner-videoBelajar');
       $this->load->view('v-container-all-videos');
       $this->load->view('templating/t-footer');
    }

    public function videobelajarsingle(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('v-banner-videoBelajar');
       $this->load->view('v-single-video');
       $this->load->view('templating/t-footer');
    }

    public function daftarvideo($alias_pelajaran="", $alias_tingkat=""){
      $data['bab_video'] = $this->load->Mvideos->get_video_as_bab($alias_tingkat, $alias_pelajaran);
      $data['aliastingkat'] = $alias_tingkat;
      $data['aliaspelajaran'] = $alias_pelajaran;
       
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('v-banner-videoBelajar', $data);
       $this->load->view('v-video-list');

       $this->load->view('templating/t-footer');
    }
    ########### FRONT END  ####################
    
    #----------# BACK END  #----------#
    public function uploadvideo(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('v-b-form-upload-video');
       $this->load->view('templating/t-footer');
    }   
     #----------# BACK END  #----------#



}
 ?>