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

	##ajax untuk melakukan update pada paket soal
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
	#

	##ajax untuk melakukan edit, mengambil nilai dari hasil query
	public function ajax_edit( $id ) {
		$data = $this->MPaketsoal->get_by_id( $id );
		echo json_encode( $data );
	}
	#

	#menampilkan semoa paket soal
	function ajax_list() {
		$list = $this->load->MPaketsoal->getpaketsoal();
		$data = array();
	
		$baseurl = base_url();
		foreach ( $list as $paket_soal ) {
			// $no++;
			$row = array();
			$row[] = $paket_soal['id_paket'];
			$row[] = $paket_soal['nm_paket'];
			$row[] = $paket_soal['jumlah_soal'];
			$row[] = $paket_soal['durasi'];
			$row[] = '<a class="btn btn-sm btn-primary"  title="Edit" onclick="edit_paket('."'".$paket_soal['id_paket']."'".')"><i class="ico-file5"></i></a>
			<a class="btn btn-sm btn-success"  title="Add Soal" href="addbanksoal/'."".$paket_soal['id_paket']."".'"><i class="ico-file-plus2"></i></a>
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="delete_paket('."'".$paket_soal['id_paket']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}
	##
		

		$output = array(
			"data"=>$data,
		);

		echo json_encode( $output );
	}


	#ajax untuk menampilkan soal yang terdapat pada paket soal tertentu.
	function ajax_listsoal($idpaket) {
		$list = $this->load->MPaketsoal->soal_by_paketID($idpaket);
		$data = array();


		//mengambil nilai list
		$baseurl = base_url();
		foreach ( $list as $list_soal ) {
			$row = array();
			$row[] = $list_soal['id_soal'];
			$row[] = $list_soal['judul_soal'];
			$row[] = $list_soal['sumber'];
			$row[] = $list_soal['soal'];
			$row[] = $list_soal['kesulitan'];
			$row[] = '
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="drop_soal('."'".$list_soal['id']."'".')"><i class="ico-remove"></i></a>';
			$data[] = $row;

		}

		$output = array(
					"data"=>$data,
		);
		echo json_encode( $output );
	}
	##

	function index() {
		$this->tambahpaketsoal();
	}

	#daftar paket soal
	function tambahpaketsoal() {		
		$data['paket_soal'] = $this->load->MPaketsoal->getpaketsoal();
		$data['judul_halaman'] = "Buat Paket Soal";
		$data['files'] = array(
			APPPATH.'modules/Paketsoal/views/v-create-paket-soal.php',
		);
		$this->load->view( 'templating/index-b-guru', $data );
	}
	##

	##menambahkan soal
	function add_soal() {
		
		$data['paket_soal'] = $this->load->MPaketsoal->getpaketsoal();
		$data['judul_halaman'] = "Tambahkan Paket Soal";
		$data['files'] = array(
			APPPATH.'modules/Paketsoal/views/v-create-paket-soal.php',
		);
		$this->load->view( 'templating/index-b-guru', $data );
	}
	##

	#menambahkan paket soal ke dalam database
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
	##

	function droppaketsoal( $id ) {
		$this->MPaketsoal->droppaket( $id );
	}

	#mengupdate paket soal
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
	##

	##mengambil paket soal dirubah ke json
	function ambil_paket_soal() {
		$data = $this->output
		->set_content_type( "application/json" )
		->set_output( json_encode( $this->load->MPaketsoal->getpaketsoal() ) ) ;
	}
	##

	#menambahkan soal ada paket tertentu.
	function addbanksoal( $idpaket ) {
		
		$paket_soal = $this->load->MPaketsoal->getpaket_by_id($idpaket);
		$data['judul_halaman'] = "Tambahkan Bank Soal";
		if (!$paket_soal==array()) {
			$data['listadd_soal']=$this->load->MPaketsoal->soal_by_paketID($idpaket);
	
			$data['panelheading'] = "Soal Untuk Paket soal ".$paket_soal['nm_paket'];
			$data['id_paket']=$idpaket;
			$data['files'] = array(
				APPPATH.'modules/Paketsoal/views/v-add-soal.php',
			);
			
		} else {
			$data['files'] = array(
	            APPPATH . 'modules/templating/views/v-data-notfound.php',
	        );
		}
		
		$this->load->view( 'templating/index-b-guru', $data );
	}
	##

	#
	function ajax_get_soal_by_subbabid( $subBabID ) {

		$list = $soal=$this->mBankSoal->get_soal( $subBabID );
		$data = array();


		//mengambil nilai list
		$baseurl = base_url();
		foreach ( $list as $list_soal ) {
			$n='1';
			$row = array();

			$row[] = "<span class='checkbox custom-checkbox custom-checkbox-inverse'>
								<input type='checkbox' name="."soal".$n." id="."soal".$list_soal['id_soal']." value=".$list_soal['id_soal'].">
								<label for="."soal".$list_soal['id_soal'].">&nbsp;&nbsp;</label>
							</span>";
			$row[] = $list_soal['judul_soal'];
			$row[] = $list_soal['sumber'];
			$row[] = $list_soal['soal'];
			$row[] = $list_soal['kesulitan'];
			$data[] = $row;
			$n++;

		}
		//print_r($data);
		$output = array(
			"data"=>$data,
		);
		echo json_encode( $output );
		
	}


	#Start Function add soal paket#
	public function addsoaltopaket()
	{
	
		$idSoal = $this->input->post('data');
		$idSubbab = $this->input->post('idSubBab');
		$idpaket = $this->input->post('id_paket');
		var_dump($idSubbab);
		var_dump('masuk');
		echo "haiiiiiiiiiiiiii";
		 $mmpaket=array();
		 foreach ($idSoal as $key ) {		 
		 	$mmpaket[] = array(
		 		'id_paket' => $idpaket,
                'id_soal' => $key,
                'id_subbab' => $idSubbab);
		 	
		 }
		 

		 $this->MPaketsoal->insert_soal_paket($mmpaket);
		
	}
	#END Function add soal paket#

	#hapus paket soal
	public function dropsoalpaket($id)
	{
		$this->MPaketsoal->drop_soal_paket($id);

	}
	##

	#ajax untuk menampilkan soal yang sudah di pub, belum terdaftar di paket dan statusnya 1
	function ajax_unregistered_soal( $id_paket, $id_subab ) {
		$param['id_paket'] = $id_paket;
		$param['id_subab'] = $id_subab;

		$list = $soal=$this->mBankSoal->get_soal_terdaftar($param);
		var_dump($list);
		// $data = array();


		// //mengambil nilai list
		// $baseurl = base_url();
		// foreach ( $list as $list_soal ) {
		// 	$n='1';
		// 	$row = array();

		// 	$row[] = "<span class='checkbox custom-checkbox custom-checkbox-inverse'>
		// 						<input type='checkbox' name="."soal".$n." id="."soal".$list_soal['id_soal']." value=".$list_soal['id_soal'].">
		// 						<label for="."soal".$list_soal['id_soal'].">&nbsp;&nbsp;</label>
		// 					</span>";
		// 	$row[] = $list_soal['judul_soal'];
		// 	$row[] = $list_soal['sumber'];
		// 	$row[] = $list_soal['soal'];
		// 	$row[] = $list_soal['kesulitan'];
		// 	$data[] = $row;
		// 	$n++;

		// }
		// //print_r($data);
		// $output = array(
		// 	"data"=>$data,
		// );
		// echo json_encode( $output );
		
	}


}
?>
