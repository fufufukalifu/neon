<?php 
/**
 * 
 */
 class Mentorback extends MX_Controller
 {
 	function __construct()
 	{
 		parent::__construct();
		$this->load->model('Mmentorback');
		$this->load->library('parser');
		$this->load->library('sessionchecker');
        $this->sessionchecker->checkloggedin();
 	}

 	public function listMentoring()
 	{
 	
 		$data['files'] = array(
			APPPATH . 'modules/mentorback/views/v-list-mentor.php',
			);
		$data['judul_halaman'] = "List Mentor";
		$hakAkses=$this->session->userdata['HAKAKSES'];
                // cek hakakses 
		if ($hakAkses=='admin') {
        // jika admin
			$this->parser->parse('admin/v-index-admin', $data);
		} elseif($hakAkses=='guru'){
                 // jika guru
			 redirect(site_url('guru/dashboard/'));       
		}else{
            // jika siswa redirect ke welcome
			redirect(site_url('welcome'));
		}
 	}

 	public function ajax_list_siswa()
 	{
 		$tb_Siswa=null;
 		$arrSiswa=$this->Mmentorback->get_siswa();
 		$no=1;
 		$n=1;
 		foreach($arrSiswa as $val){
 		$nama=$val->namaDepan." ".$val->namaBelakang;
 			$mentor="<span style='color:red;'>Belum ada mentor</span>";
 			$tb_Siswa.='
	        <tr>
	        	<td><span class="checkbox custom-checkbox custom-checkbox-inverse">
								<input type="checkbox" name='.'token'.$n.' id='.'siswa'.$val->id_siswa.' value='.$val->id_siswa.'>
								<label for='.'siswa'.$val->id_siswa.'>&nbsp;&nbsp;</label></span>
						</td>
	          <td>'.$no.'</td>
	          <td>'.$val->namaPengguna .'</td>
	          <td>'.$nama.'</td>
	          <td>'.$val->namaCabang.'</td>
	          <td>'.$mentor.'</td>
	           <td> <a class="btn btn-sm btn-danger"><i class="ico-remove" ></i></a></td>
	      	</tr>
    		';
    		$n++;
    		$no++;

 		}
 		echo json_encode($tb_Siswa);
 	}

 	public function ajax_list_mentor()
 	{
 		$tb_guru=null;
 		$arrGuru=$this->Mmentorback->get_mentor();
 		$no=1;
 		$n=1;
 		// pengulangan untuk record tb_mentor
 		foreach($arrGuru as $val){
 		$nama=$val->namaDepan." ".$val->namaBelakang;
 			$mentor="<span style='color:red;'>Belum ada mentor</span>";
 			$tb_guru.='
	        <tr>
	        	<td><span class="checkbox custom-checkbox custom-checkbox-inverse">
								<input type="checkbox" name='.'token'.$n.' id='.'guru'.$val->id_guru.' value='.$val->id_guru.'>
								<label for='.'guru'.$val->id_guru.'>&nbsp;&nbsp;</label></span>
						</td>
	          <td>'.$no.'</td>
	          <td>'.$val->namaPengguna .'</td>
	          <td>'.$nama.'</td>
	          <td>'.$mentor.'</td>
	           <td> <a class="btn btn-sm btn-danger"><i class="ico-remove" ></i></a></td>
	      	</tr>
    		';
    		$n++;
    		$no++;

 		}
 		echo json_encode($tb_guru);
 	}



 } ?>