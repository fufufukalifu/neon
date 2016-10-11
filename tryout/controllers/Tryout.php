<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class Tryout extends MX_Controller
{


	public function __construct() {
		$this->load->library( 'parser' );
		$this->load->model('Tryout_model');
		parent::__construct();
	}

	public function ajax_get_tryout(){
		$datas['id_siswa'] = $this->Tryout_model->get_id_siswa();
		$datas['tryout'] = $this->Tryout_model->get_tryout_akses($datas);

		$list = $datas['tryout'];

		$data = array();

		//mengambil nilai list
		$baseurl = base_url();
		foreach ( $list as $tryout_item ) {
			// $no++;
			$row = array();
			$row[] = $tryout_item['id_tryout'];
			$row[] = str_replace('-', ':', $tryout_item['nm_tryout']);

			$row[] = '
			<a id="btn-'.$tryout_item['id_tryout'].'" class="btn btn-primary btn-'.$tryout_item['id_tryout'].'"  title="Kerjakan TO" 
			onclick="kerjakan_to('.$tryout_item['id_tryout'].')"  data-todo="'.json_encode($tryout_item).'">
			<i class="glyphicon glyphicon-pencil"></i></a>

			<a class="btn btn-success"  title="Hapus" 
			onclick="lihat_detail('."'".$tryout_item['id_tryout']."'".')">
			<i class="glyphicon glyphicon-list-alt"></i></a>';

			$data[] = $row;

		}
		

		$output = array(
			"data"=>$data
			);

		echo json_encode( $output );
	}

	//# fungsi indeks
	public function index(){
		

		$data = array(
			'judul_halaman' => 'Neon - Tryout',
			'judul_header' => 'Daftar Tryout',
			'judul_tingkat' => '',
			);

		$konten = 'modules/tryout/views/v-daftar-to.php';

		$data['files'] = array(
			APPPATH . 'modules/homepage/views/v-header-login.php',
			APPPATH . 'modules/templating/views/t-f-pagetitle.php',
			APPPATH . $konten,
			APPPATH . 'modules/homepage/views/v-footer.php',
			);

		
		

		$this->parser->parse('templating/index', $data);
	}
	//# fungsi indeks


}
?>
