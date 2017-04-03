<?php
class Logtryout extends MX_Controller {


	function __construct(){
		$this->load->library('parser');
		$this->load->model('logtryout_model');
	}

	function ajax_status_to($cabang="all",$tryout="all",$paket="all"){

		$data['param'] = ['cabang'=>$cabang,'tryout'=>$tryout,'paket'=>$paket];
		$list = $this->logtryout_model->get_log_tryout($data['param']);

		$data = array();
		foreach ( $list as $list_item ) {
			$row = array();
			$row[]=$list_item['id'];
			$row[]=$list_item['siswa_id'];

			$row[]=$list_item['namaDepan'].' '.$list_item['namaBelakang'];
			$row[]=$list_item['waktu_mulai'];
			$row[]=$list_item['nm_tryout'];
			$row[]=$list_item['nm_paket'];
			if ($list_item['status_pengerjaan']=="") {
				$row[]="<i class='ico-pencil3 text-primary' title='sedang mengerjakan'></i>";
			} else {
				$row[]="<i class='ico-checkmark3 text-success' title='selesai mengerjakan'></i>";
			}
			
			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
	}
}
?>