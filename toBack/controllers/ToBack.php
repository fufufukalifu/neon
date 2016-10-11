<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class ToBack extends MX_Controller
{
	public function __construct() {
		$this->load->library( 'parser' );
		$this->load->model('mToBack');
		$this->load->model( 'paketsoal/MPaketsoal' );
		$this->load->model('siswa/msiswa');
		$this->load->model('Templating/mtemplating');
		parent::__construct();
	}

	#START Function buat TO#
	public function buatTo()
	{
		echo "masuk controller";
		$nmpaket=htmlspecialchars($this->input->post('nmpaket'));
		$tglMulai=htmlspecialchars($this->input->post('tglmulai'));
		$tglAkhir=htmlspecialchars($this->input->post('tglakhir'));
		$publish=htmlspecialchars($this->input->post('publish'));
		$UUID = uniqid();

		$dat_To=array(
			'nm_tryout'=>$nmpaket,
			'tgl_mulai'=>$tglMulai,
			'tgl_berhenti'=>$tglAkhir,
			'publish'=>$publish,
			'UUID' =>$UUID
			);

		$this->mToBack->insert_to($dat_To);
		 redirect(site_url('toback/addPaketTo/'.$UUID));
	}
	#END Function buat TO#

	#START Function add pakket to Try Out#
	// menampilkan halaman add to
	public function addPaketTo($UUID)
	{	
		$data['tryout'] = $this->MPaketsoal->get_id_by_UUID($UUID)[0];
		$data['id_to']=$data['tryout']['id_tryout'];
		$data['siswa'] = $this->msiswa->get_allsiswa();
		$data['paket']= $this->MPaketsoal->getpaketsoal();
        $data['files'] = array(
            APPPATH . 'modules/toback/views/v-bundlepaket.php',
        );
        $data['judul_halaman'] = "Bundle Paket";
        $this->load->view('templating/index-b-guru', $data);
	}
	//add paket ke TO
	public function addPaketToTO()
	{
		$id_paket=$this->input->post('idpaket');
		$id_tryout=$this->input->post('id_to');
		// $id_paket=$this->input->post('test');
		// $this->mToBack->inseert_addPaket();
		$dat_paket=array();//testing
		foreach ($id_paket as $key) {
			$dat_paket[] = array(
				'id_tryout'=>$id_tryout,
			'id_paket'=>$key);
			
		}
		$this->mToBack->insert_addPaket($dat_paket);
		// var_dump(expression)
	}
	// add hak akses to siswa 
	public function addsiswaToTO()
	{
		$id_siswa=$this->input->post('idsiswa');
		$id_tryout=$this->input->post('id_to');
		// $id_paket=$this->input->post('test');
		// $this->mToBack->inseert_addPaket();
		//menampung array id siswa
		$dat_siswa=array();
		foreach ($id_siswa as $key) {
			$dat_siswa[] = array(
				'id_tryout'=>$id_tryout,
			'id_siswa'=>$key);
			
		}
		//add siswa ke paket 
		$this->mToBack->insert_addSiswa($dat_siswa);
		// var_dump(expression)
	}

	//menampikan paket yg sudah di add
	function ajax_listpaket($UUID) {
		$data['tryout'] = $this->MPaketsoal->get_id_by_UUID($UUID)[0];
		$id_to=$data['tryout']['id_tryout'];
		$list = $this->load->MPaketsoal->soal_by_paketUUID($id_to);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_paket ) {
			// $no++;
			$row = array();
			$row[] = $list_paket['id_paket'];
			$row[] = $list_paket['nm_paket'];
			$row[] = $list_paket['deskripsi'];
			$row[] = '
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick=""><i class="ico-remove"></i></a>';

			$data[] = $row;

		}
	
		$output = array(
			
			"data"=>$data,
		);

		echo json_encode( $output );
	}

	#END Function add pakket to Try Out#

	#START Function di halaman daftar TO#
	//menampilkan list TO
	public function listTO()
	{
		$data['listTO'] =$this->mToBack->get_To();
        $data['files'] = array(
            APPPATH . 'modules/toback/views/v-list-to.php',
        );
        $data['judul_halaman'] = "List Try Out";
        $this->load->view('templating/index-b-guru', $data);
	}
	#END Function di halaman daftar TO#


}
?>
