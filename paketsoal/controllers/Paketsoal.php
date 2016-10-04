<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class Paketsoal extends MX_Controller
{
	public function __construct() {
		$this->load->library( 'parser' );
		$this->load->model( 'MPaketsoal' );
		$this->load->model( 'BankSoal/mBankSoal' );
		$this->load->library( 'form_validation' );
		$this->load->helper( array( 'form', 'url' ) );
		$this->load->model('Templating/mtemplating');
		parent::__construct();
	}

	public function ajax_update() {
		$data = array(
			'idpaket' => $this->input->post( 'idpaket' ),
			'nm_paket' => $this->input->post( 'nama_paket' ) ,
			'jumlah_soal' => $this->input->post( 'jumlah_soal' ),
			'deskripsi' =>$this->input->post( 'deskripsi' ),
			'durasi' =>$this->input->post( 'durasi' )
		);

		$this->mpaketsoal->rubahpaket( array( 'id' => $this->input->post( 'id' ) ), $data );
		echo json_encode( array( "status" => TRUE ) );
	}

	public function ajax_edit( $id ) {
		$data = $this->MPaketsoal->get_by_id( $id );
		echo json_encode( $data );
	}

	function ajax_list() {
		$list = $this->load->MPaketsoal->getpaketsoal();
		$data = array();
		//$no = $_POST['start'];
		//$no = 1;
		//print_r($list);

		//mengambil nilai list
		$baseurl = base_url();
		foreach ( $list as $paket_soal ) {
			// $no++;
			$row = array();
			$row[] = $paket_soal['id_paket'];
			$row[] = $paket_soal['nm_paket'];
			$row[] = $paket_soal['jumlah_soal'];
			$row[] = $paket_soal['durasi'];
			$row[] = '<a class="btn btn-sm btn-primary"  title="Edit" onclick="edit_paket('."'".$paket_soal['id_paket']."'".')"><i class="ico-file5"></i></a>
			<a class="btn btn-sm btn-success"  title="Add Soal" href="paketsoal/addbanksoal/'."".$paket_soal['id_paket']."".'"><i class="ico-file-plus2"></i></a>
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="delete_paket('."'".$paket_soal['id_paket']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}
		//print_r($data);
		$output = array(
			"draw" => $_POST['draw'] ,
			"recordsTotal"=>$this->MPaketsoal->hitung_semua(),
			"recordsFiltered"=>$this->MPaketsoal->hitung_filter(),
			"data"=>$data,
		);

		echo json_encode( $output );
	}

	function index() {
		$this->tambahpaketsoal();
	}

	function tambahpaketsoal() {
		$data['tingkat'] = $this->mtemplating->get_tingkat();
		$data['paket_soal'] = $this->load->MPaketsoal->getpaketsoal();
		$data['judul_halaman'] = "Buat Paket Soal";
		$data['files'] = array(
			APPPATH.'modules/Paketsoal/views/v-create-paket-soal.php',
		);
		$this->load->view( 'templating/index-b-guru', $data );
	}

	function add_soal() {
		 $data['tingkat'] = $this->mtemplating->get_tingkat();
		$data['paket_soal'] = $this->load->MPaketsoal->getpaketsoal();
		$data['judul_halaman'] = "Tambahkan Paket Soal";
		$data['files'] = array(
			APPPATH.'modules/Paketsoal/views/v-create-paket-soal.php',
		);
		$this->load->view( 'templating/index-b-guru', $data );
	}



	function addpaketsoal() {
		$this->form_validation->set_rules( 'nama_paket', "Error Nama Paket", 'required' );
		//$this->form_validation->set_message('required',"You can't allowed empty");

		$data = array(
			'nm_paket' => $this->input->post( 'nama_paket' ) ,
			'jumlah_soal' => $this->input->post( 'jumlah_soal' ),
			'deskripsi' =>$this->input->post( 'deskripsi' ),
			'durasi' =>$this->input->post( 'durasi' )
		);

		$this->MPaketsoal->insertpaketsoal( $data );
	}

	function droppaketsoal( $id ) {
		$this->MPaketsoal->droppaket( $id );
	}
	function updatepaketsoal() {
		$id=$this->input->post( 'id_paket' );
		$data = array(
			'nm_paket' =>  $this->input->post( 'nama_paket' ) ,
			'deskripsi' => $this->input->post( 'jumlah_soal' ),
			'jumlah_soal' => $this->input->post( 'durasi' ),
			'durasi' => $this->input->post( 'deskripsi' )
		);

		$this->MPaketsoal->rubahpaket( $id, $data );
	}

	function ambil_paket_soal() {
		$data = $this->output
		->set_content_type( "application/json" )
		->set_output( json_encode( $this->load->MPaketsoal->getpaketsoal() ) ) ;
	}

	function addbanksoal( $idpaket ) {
		 $data['tingkat'] = $this->mtemplating->get_tingkat();
		$paket_soal = $this->load->MPaketsoal->getpaket_by_id($idpaket)[0];
		//var_dump($data['paket_soal']);
		$data['judul_halaman'] = "Tambahkan Bank Soal";
		$data['panelheading'] = "Soal Untuk Paket soal ".$paket_soal['nm_paket'];
		$data['id_paket']=$paket_soal['id_paket'];
		$data['files'] = array(
			APPPATH.'modules/Paketsoal/views/v-add-soal.php',
		);
		$this->load->view( 'templating/index-b-guru', $data );
	}

	function ajax_get_soal_by_subbabid( $subBabID ) {
		// var_dump("hai");

		$list = $soal=$this->mBankSoal->get_soal( $subBabID );
		// var_dump($list);


		if ( $list==array() ) {
			$row = array( 'link'=>"<span class='text-danger'>Soal Belum Tersedia</span>" );
			$datas[] = $row;
		}else {
			$datas = array();
			$n='1';
			foreach ( $list as $soal ) {
				// $no++;
				$row = array();
				$row = array( 'link'=>
					"<span class='checkbox custom-checkbox custom-checkbox-inverse'>
				<input type='checkbox' name="."soal".$n." id="."soal".$soal['id_soal']." value=".$soal['id_soal'].">
				<label for="."soal".$soal['id_soal'].">&nbsp;&nbsp;".htmlspecialchars($soal['soal'])."</label>
				<button>add</button>
				</span><br>"
				);

				$datas[] = $row;
				$n++;
			}


		}
		$data = $this->output
		->set_content_type( "application/json" )
		->set_output( json_encode( $datas ) ) ;

		return $data;

		// var_dump($datas);
	}
	// function addsoaltopaket(){
	// 	$paket_soal = $this->load->MPaketsoal->getpaketsoal()[0];
	// 	//$id_paket = $id_paket;
	// 	print_r($paket_soal);
	// 	// $data = array(
	// 	// 	'id_paket' => $this->input->post( 'nama_paket' ) ,
	// 	// );

	// 	// $this->MPaketsoal->insertpaketsoal( $data );
	// }
	//paket soal relasi bank soal

	#Start Function add soal paket#
	public function addsoaltopaket()
	{
	
		$idSoal = $this->input->post('data');
		$idSubbab = $this->input->post('idSubBab');
		$idpaket = $this->input->post('id_paket');
		// ;
		 var_dump($idSubbab);
		 var_dump($idpaket);
		 $mmpaket=array();
		 foreach ($idSoal as $key ) {		 
		 	$mmpaket[] = array('id_paket' => $idpaket,
                'id_soal' => $key,
                'subBabID' => $idSubbab);
		 	
		 }
		 

		 $this->MPaketsoal->insert_soal_paket($mmpaket);
		// var_dump($a);
		// $playlist = $this->input->post('val');
		// $data = $_POST['data'];
		// $addsoal=array();//untuk menampung id
		// foreach ($val as $row) {
		// 	$addsoal[]= array('idpaket'=> $??,
		// 					  'idsoal'=>$??,
		// 					  'subBabID'=>$??,	);
		// }
		// $this->mpaketsoal->insert_soal_paket($addsoal);
		

	}
	#END Function add soal paket#

}
?>
