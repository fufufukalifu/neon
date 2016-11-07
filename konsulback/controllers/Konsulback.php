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
  		$penggunaID=$this->session->userdata['id'];
  		// get jumlah respon
  		$data['countJawab']=$this->Mkonsulback->get_count_jawab($penggunaID);
  		// get data guru
  		$datguru=$this->Mkonsulback->get_datguru($penggunaID);
  		$data['nama']=$datguru['namaDepan'].' '.$datguru['namaBelakang'];
  		$data['photo']=base_url().'assets/image/photo/siswa/'.$datguru['photo'];
  		$data['countLove']=$this->Mkonsulback->get_count_love($penggunaID);
  		// get respon atau jawaban
  		$data['respon']=$this->Mkonsulback->get_respone_by_guru($penggunaID);
  		$tamppoin=($data['countJawab']*5)+($data['countLove']*10);
  		$data['poin']=$tamppoin;
      //get data komen untuk tabel histrori komen
      $data['komen']=$this->Mkonsulback->get_komen_love($penggunaID);

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
  	public function history($penggunaID)
  	{

  		$data['judul_halaman'] = "History Konsultasi";
  		$data['files'] = array(
  			APPPATH . 'modules/konsulback/views/v-history-konsul.php',
  			);
  		// get jumlah respon
  		$data['countJawab']=$this->Mkonsulback->get_count_jawab($penggunaID);
  		// get data guru
  		$datguru=$this->Mkonsulback->get_datguru($penggunaID);
  		$data['nama']=$datguru['namaDepan'].' '.$datguru['namaBelakang'];
  		$data['photo']=base_url().'assets/image/photo/siswa/'.$datguru['photo'];
  		$data['countLove']=$this->Mkonsulback->get_count_love($penggunaID);
  		// get respon atau jawaban
  		$data['respon']=$this->Mkonsulback->get_respone_by_guru($penggunaID);
  		$tamppoin=($data['countJawab']*5)+($data['countLove']*10);
  		$data['poin']=$tamppoin;
      //get data komen untuk tabel histrori komen
      $data['komen']=$this->Mkonsulback->get_komen_love($penggunaID);
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
  			$penggunaID=$value['penggunaID'];
  			$love=$this->Mkonsulback->get_count_love($penggunaID);
  			$datguru=$this->Mkonsulback->get_datguru($penggunaID);
  			$countJawab=$this->Mkonsulback->get_count_jawab($penggunaID);
  			$poin=($countJawab*5)+($love*10);
  			$tampAq[]=array('poin'=>$poin,
  							'nama'=>$value['namaDepan'].' '.$value['namaBelakang'],
                'mapel'=>$value['mapel'],
  							'love'=>$love,
  							'countJawab'=>$countJawab,
  							'penggunaID'=>$penggunaID
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