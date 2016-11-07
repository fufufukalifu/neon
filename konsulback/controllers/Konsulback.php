 <?php 
 /**
  * 
  */
  class Konsulback extends MX_Controller
  {
  	
  	function __construct()
  	{
  		$this->load->helper( 'session' );
        parent::__construct();
        $this->load->model( 'Mkonsulback' );
        $this->load->library('parser');
        //cek kalo bukan guru lemparin.
        if ($this->session->userdata('loggedin')==true) {
            if ($this->session->userdata('HAKAKSES')=='siswa'){
             // redirect('welcome');
            }else if($this->session->userdata('HAKAKSES')=='guru'){
             // redirect('guru/dashboard');
            }else{
            // redirect('login');
            }
        }
  	}
    //history di guru 
  	public function myhistory()
  	{

  		$data['judul_halaman'] = "History Konsultasi";
  		$data['files'] = array(
  			APPPATH . 'modules/konsulback/views/v-history-konsul.php',
  			);
  		$guruID=$this->session->userdata['id_guru'];
  		// get jumlah respon
  		$data['countJawab']=$this->Mkonsulback->get_count_jawab($guruID);
  		// get data guru
  		$datguru=$this->Mkonsulback->get_datguru($guruID);
  		$data['nama']=$datguru['namaDepan'].' '.$datguru['namaBelakang'];
  		$data['photo']=base_url().'assets/image/photo/siswa/'.$datguru['photo'];
  		$data['countLove']=$datguru['love'];
  		// get respon atau jawaban
  		$data['respon']=$this->Mkonsulback->get_respone_by_guru($guruID);
  		$tamppoin=($data['countJawab']*5)+($data['countLove']*10);
  		$data['poin']=$tamppoin;

         #START cek hakakses#
  		$hakAkses=$this->session->userdata['HAKAKSES'];
  		if ($hakAkses=='admin') {
         // jika admin
  			$this->parser->parse('admin/v-index-admin', $data);
  		} elseif($hakAkses=='guru'){
         // jika guru
  			$this->parser->parse('templating/index-b-guru', $data);
  		}else{
        // jika siswa redirect ke welcome
  			redirect(site_url('login'));
  		}
          #END Cek USer#
  	}
  	// history guru berdasarkan id guru
  	public function history($guruID)
  	{

  		$data['judul_halaman'] = "History Konsultasi";
  		$data['files'] = array(
  			APPPATH . 'modules/konsulback/views/v-history-konsul.php',
  			);
  		// get jumlah respon
  		$data['countJawab']=$this->Mkonsulback->get_count_jawab($guruID);
  		// get data guru
  		$datguru=$this->Mkonsulback->get_datguru($guruID);
  		$data['nama']=$datguru['namaDepan'].' '.$datguru['namaBelakang'];
  		$data['photo']=base_url().'assets/image/photo/siswa/'.$datguru['photo'];
  		$data['countLove']=$datguru['love'];
  		// get respon atau jawaban
  		$data['respon']=$this->Mkonsulback->get_respone_by_guru($guruID);
  		$tamppoin=($data['countJawab']*5)+($data['countLove']*10);
  		$data['poin']=$tamppoin;

         #START cek hakakses#
  		$hakAkses=$this->session->userdata['HAKAKSES'];
  		if ($hakAkses=='admin') {
         // jika admin
  			$this->parser->parse('admin/v-index-admin', $data);
  		} elseif($hakAkses=='guru'){
         // jika guru
  			$this->parser->parse('templating/index-b-guru', $data);
  		}else{
        // jika siswa redirect ke welcome
  			redirect(site_url('login'));
  		}
          #END Cek USer#
  	}

  	public function aq_konsul ()
  	{
  		$data['judul_halaman'] = "Akumulasi Konsultasi";
  		$data['files'] = array(
  			APPPATH . 'modules/konsulback/views/v-aq-konsul.php',
  			);
  		$dat_guru=$this->Mkonsulback->get_aq_konsul();
  		$tampAq=array();
  		foreach ($dat_guru as $value) {
  			$guruID=$value['id'];
  			$datguru=$this->Mkonsulback->get_datguru($guruID);
  			$countJawab=$this->Mkonsulback->get_count_jawab($guruID);
  			$poin=($countJawab*5)+($value['love']*10);
  			$tampAq[]=array('poin'=>$poin,
  							'nama'=>$value['namaDepan'].' '.$value['namaBelakang'],
  							'love'=>$value['love'],
  							'countJawab'=>$countJawab,
  							'guruID'=>$value['id']
  							);
  		}
  		rsort($tampAq);
  		$data['dat_aq']=$tampAq;
         #START cek hakakses#
  		$hakAkses=$this->session->userdata['HAKAKSES'];
  		if ($hakAkses=='admin') {
         // jika admin
  			$this->parser->parse('admin/v-index-admin', $data);
  		} elseif($hakAkses=='guru'){
         // jika guru
  			$this->parser->parse('templating/index-b-guru', $data);
  		}else{
        // jika siswa redirect ke welcome
  			redirect(site_url('login'));
  		}
         // #END Cek USer#
  	}

  } ?>