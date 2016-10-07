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
	public function addPaketTo()
	{
		$data['tingkat'] = $this->mtemplating->get_tingkat();
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
		// $id_paket=$this->input->post('test');
		// $this->mToBack->inseert_addPaket();
		var_dump("asdas");
		var_dump($id_paket);
		// var_dump(expression)
	}

	#END Function add pakket to Try Out#

	#START Function di halaman daftar TO#
	//menampilkan list TO
	public function listTO()
	{
		$data['tingkat'] = $this->mtemplating->get_tingkat();
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
