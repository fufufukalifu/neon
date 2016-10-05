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
			'publish'=>$publish
			);

		$this->mToBack->insert_to($dat_To);
		 redirect(site_url('toback/addPaketTo'));
	}
	#END Function buat TO#

	#START Function add pakket to Try Out#
	public function addPaketTo()
	{
		$data['tingkat'] = $this->mtemplating->get_tingkat();
		$data['paket']= $this->MPaketsoal->getpaketsoal();
        $data['files'] = array(
            APPPATH . 'modules/toback/views/v-bundlepaket.php',
        );
        $data['judul_halaman'] = "Bundle Paket";
        $this->load->view('templating/index-b-guru', $data);
	}
	#END Function add pakket to Try Out#

}
?>
