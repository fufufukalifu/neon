<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ortuback extends MX_Controller {
	private $hakakses;

	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('Ortuback_model');
		$this->load->model('Laporanortu/Laporanortu_model');
		$this->load->model('admincabang/admincabang_model');
		$this->load->model('tingkat/Mtingkat');
		$this->load->library('sessionchecker');
        $this->sessionchecker->checkloggedin();

		$this->hakakses = $this->gethakakses();
	}

	//GET HAK AKSES
	function gethakakses(){
		return $this->session->userdata('HAKAKSES');
	}
	//GET HAK AKSES

	// LOAD PARSER SESUAI HAK AKSES
	public function loadparser($data){
		$this->hakakses = $this->gethakakses();
		if ($this->hakakses=='admin') {
			$this->parser->parse('ortuback/v-index-ortu', $data);
		}else{
			echo "forbidden access";    		
		}
	}
	// LOAD PARSER SESUAI HAK AKSES

	public function test()
	{
		$data['judul_halaman'] = "Laporan Orang Tua";

		$hakAkses = $this->session->userdata['HAKAKSES'];

			$data['files'] = array(
				APPPATH . 'modules/ortuback/views/v-daftar-report.php',
				);
			$all_report = $this->Ortuback_model->get_report(4);

		$n=1;
		$data['report']=array(); 
		foreach ( $all_report as $item ) {
		
			$data['report'][]=array(
                'namaortu'=>$item['namaOrangTua'],
               );
		}

			$this->loadparser($data);

	}

	//laporan ortu ajax
	public function index(){
		$data['judul_halaman'] = "Laporan Orang Tua";

		$hakAkses = $this->session->userdata['HAKAKSES'];

		$data['files'] = array(
			APPPATH . 'modules/ortuback/views/v-daftar-report.php',
		);
		
		// get report berdasarkan nilai
		$report_nilai = $this->Ortuback_model->get_report_nilai(4);

		// get report berdasarkan absen
		$report_absen = $this->Ortuback_model->get_report_absen(4);

		// get report berdasarkan umum
		$report_umum = $this->Ortuback_model->get_report_umum(4);

		$data['namaortu'] = $report_nilai[0]['namaOrangTua'];
		$n=1;

		// untuk nampung report nilai
		$data['nilai']=array(); 
		foreach ( $report_nilai as $item ) {
		
			$data['nilai'][]=array(
                'namaortu'=>$item['namaOrangTua'],
                'jenis'=>$item['jenis'],
                'isi'=>$item['isi'],
               );
		}

		// untuk nampung report absen
		$data['absen']=array(); 
		foreach ( $report_absen as $item ) {
		
			$data['absen'][]=array(
                'namaortu'=>$item['namaOrangTua'],
                'jenis'=>$item['jenis'],
                'isi'=>$item['isi'],
               );
		}

		// untuk nampung report umum
		$data['umum']=array(); 
		foreach ( $report_umum as $item ) {
		
			$data['umum'][]=array(
                'namaortu'=>$item['namaOrangTua'],
                'jenis'=>$item['jenis'],
                'isi'=>$item['isi'],
               );
		}

		$this->loadparser($data);

	}

	//laporan ortu ajax
	public function report_ajax($jenis="all"){

		$datas = ['jenis'=>$jenis];

		$all_report = $this->Ortuback_model->get_report_all($datas);

		$data = array();
		$n=1;
		foreach ( $all_report as $item ) {
		
			$row = array();
			$row[] = $n;
			$row[] = $item ['jenis'];
			$row[] = $item ['isi'];

			$data[] = $row;
			$n++;
		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );
	}
}

?>