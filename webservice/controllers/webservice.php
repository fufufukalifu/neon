<?php 
/**
 * 
 */
class Webservice extends MX_Controller
{

	public function __construct()
	{
		$this->load->model('tryout/mtryout');
		$this->load->model('Webservice_model');
	}

	public function getName($id)
	{
		return 'sam';
	}

	public function tryoutoffline(){
		$data = $this->mtryout->get_tryout_by_id(81);
		echo json_encode($data);
	}

	public function paketoffline($id){
		$data = $this->mtryout->get_paket_by_toid($id);
		$datas = json_encode($data);
		echo $datas;
	}

	public function siswaoffline($idto){
		$data = $this->Webservice_model->get_siswa_on_tryout($idto);
		$datas = json_encode($data);
		echo $datas;
	}

	public function penggunaffline($idto){
		$data = $this->Webservice_model->get_pengguna_on_tryout($idto);
		$datas = json_encode($data);
		echo $datas;
	}

	public function hakaksesoffline($idto){
		$data = $this->Webservice_model->get_hak_akses_on_tryout($idto);
		$datas = json_encode($data);
		echo $datas;
	}

	public function soaloffline($idto){
		$data = $this->Webservice_model->get_soal_on_tryout($idto);
		$datas = json_encode($data);
		echo $datas;
	}

	public function mm_soal_paket($idto){
		$data = $this->Webservice_model->get_mm_paket($idto);
		$datas = json_encode($data);
		echo $datas;
	}


}
?>