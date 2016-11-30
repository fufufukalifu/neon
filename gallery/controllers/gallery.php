<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
 class Gallery extends MX_Controller
 {
 	private $upload_path = "./assets/image/gallery";
 	function __construct()
 	{
 		 parent::__construct();
        $this->load->model('Mgallery');
        // $this->load->model('templating/Mtemplating');
        $this->load->library('parser');
 	}


	public function index()
	{
		$data['datImg'] = $this->Mgallery->get_datImg();
		$data['files'] = array(
            APPPATH . 'modules/gallery/views/v-gallery.php',
            );

        $data['judul_halaman'] = "Upload Image Gallery";

        $hakAkses=$this->session->userdata['HAKAKSES'];
                // cek hakakses 

        if ($hakAkses=='admin') {
        // jika admin
         $this->parser->parse('admin/v-index-admin', $data);


        } elseif($hakAkses=='guru'){
                    // jika guru
             $this->parser->parse('templating/index-b-guru', $data);
            
            
        }else{
            // jika siswa redirect ke welcome
            redirect(site_url('welcome'));
        }
	}
 	//
 	public function formGallery()
 	{
 		 $data['files'] = array(
            APPPATH . 'modules/gallery/views/v-form-gallery.php',
            );

        $data['judul_halaman'] = "Upload Image Gallery";

        $hakAkses=$this->session->userdata['HAKAKSES'];
                // cek hakakses 

        if ($hakAkses=='admin') {
        // jika admin
         $this->parser->parse('admin/v-index-admin', $data);


        } elseif($hakAkses=='guru'){
                    // jika guru
             $this->parser->parse('templating/index-b-guru', $data);
            
            
        }else{
            // jika siswa redirect ke welcome
            redirect(site_url('welcome'));
        }
 	}

 	// public function uploadGallery()
 	// {
 	// 	# code...
 	// }

 	public function upload($babaID)
	{
		if ( ! empty($_FILES)) 
		{
			$config["upload_path"]   = $this->upload_path;
			$config["allowed_types"] = "gif|jpg|png";
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload("file")) {
				echo "failed to upload file(s)";
			}else{
				$file_data = $this->upload->data();
		        $file_name = $file_data['file_name'];
		         $data['dataGallery']=  array(
	            'file_name' => $file_name);

	            $this->Mgallery->in_gallery($data);
			}
		}
	}

	public function remove()
	{
		$file = $this->input->post("file");

		if ($file && file_exists($this->upload_path . "/" . $file)) {
			unlink($this->upload_path . "/" . $file);
		}
	}


	// public function list_files()
	// {
	// 	$this->load->helper("file");
	// 	$files = get_filenames($this->upload_path);
	// 	// we need name and size for dropzone mockfile
	// 	foreach ($files as &$file) {
	// 		$file = array(
	// 			'name' => $file,
	// 			'size' => filesize($this->upload_path . "/" . $file)
	// 		);
	// 	}

	// 	header("Content-type: text/json");
	// 	header("Content-type: application/json");
	// 	echo json_encode($files);
	// }

 } ?>