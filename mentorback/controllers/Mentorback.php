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
		$this->load->model('cabang/mcabang');
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
				# get cabang
		$data['cabang'] = $this->mcabang->get_all_cabang();
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

 	public function ajax_list_siswa($records_per_page='10',$page='0',$cabang="all",$status_mentor='0',$keySearch='')
 	{
 		$records_per_page=$this->input->post('records_per_page_siswa');
 		$page=$this->input->post("page");
 		$cabang=$this->input->post("cabang");
 		$status_mentor=$this->input->post("status_mentor_siswa");
 		$keySearch=$this->input->post("keySearchSiswa");
 		$tb_Siswa=null;
 		$arrSiswa=$this->Mmentorback->get_siswa($records_per_page,$page,$cabang);
 		$no=$page+1;
 		$n=1;
 		foreach($arrSiswa as $val){
 		$nama=$val->namaDepan." ".$val->namaBelakang;
 		$namaPengguna="'$val->namaPengguna'";
 			$mentor="<span style='color:red;'>Belum ada mentor</span>";
 			$tb_Siswa.='
	        <tr>
	        	<td><span class="checkbox custom-checkbox custom-checkbox-inverse">
								<input type="checkbox" name='.'siswa'.$n.' id='.'siswa'.$val->id_siswa.' value='.$val->id_siswa.'>
								<label for='.'siswa'.$val->id_siswa.'>&nbsp;&nbsp;</label></span>
						</td>
	          <td>'.$no.'</td>
	          <td>'.$val->namaPengguna.'</td>
	          <td>'.$nama.'</td>
	          <td>'.$val->namaCabang.'</td>
	          <td>'.$mentor.'</td>
	           <td> <a class="btn btn-sm btn-danger" onclick="removeMentor('.$val->id_siswa.','.$namaPengguna.')"><i class="ico-remove" ></i></a></td>
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
 		$namaPengguna="'$val->namaPengguna'";
 			$pelajaran="<span style='color:red;'>Belum memilih pelajaran</span>";
 			$tb_guru.='
	        <tr>
	        	<td><span class="checkbox custom-checkbox custom-checkbox-inverse">
								<input type="checkbox" name='.'mentor'.$n.' id='.'guru'.$val->id_guru.' value='.$val->id_guru.'>
								<label for='.'guru'.$val->id_guru.'>&nbsp;&nbsp;</label></span>
						</td>
	          <td>'.$no.'</td>
	          <td>'.$val->namaPengguna .'</td>
	          <td>'.$nama.'</td>
	          <td>'.$pelajaran.'</td>
	           <td> 
	           <a href="'.base_url().'mentorback/detail_mentor_guru/'.$val->id_guru.'" class="btn btn-sm btn-info" title="lihat anak bimbingan"><i class="ico-eye" ></i></a>
	           <a class="btn btn-sm btn-danger" title="remove anak bimbingan" onclick="removeSiswaMentoring('.$val->id_guru.','.$namaPengguna.')" ><i class="ico-remove" ></i></a>
	           </td>
	      	</tr>
    		';
    		$n++;
    		$no++;

 		}
 		echo json_encode($tb_guru);
 	}

 	public function set_mentor()
 	{
 		$id_siswa = $this->input->post('id_siswa');
 		$id_guru = $this->input->post('id_guru');
 		$datMentoring=array();
 		for ($i=0; $i < count($id_guru) ; $i++) { 
 				for ($z=0; $z < count($id_siswa) ; $z++) { 
 					$datMentoring[] = array('siswaID' => $id_siswa[$z],
								                'guruID' => $id_guru[$i]);
 				}
 		}
 		$this->Mmentorback->in_mentoring($datMentoring);
 	}

 	//hapus data mentoring berdasarkan id siswa
 	public function del_mentor_siswa()
 	{
 		$id_siswa=$this->input->post("id_siswa");
 		$this->Mmentorback->del_mentor_siswa($id_siswa);
 	}
 	 	//hapus data mentoring berdasarkan id guru
 	public function del_siswa_mentor()
 	{
 		$id_guru=$this->input->post("id_guru");
 		$this->Mmentorback->del_siswa_mentor($id_guru);
 	}
 	
 	public function pagination_siswa($records_per_page='10',$cabang="all",$status_mentor='0',$keySearch='')
 	{

 		$jumlah_data = $this->Mmentorback->jumlah_siswa($cabang);

 		$pagination='<li class="hide" id="page-prevSiswa"><a href="javascript:void(0)" onclick="prevPageSiswa()" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a></li>';


    	 $pagePagination=1;

    	 $sumPagination=($jumlah_data/$records_per_page);

    	 for ($i=0; $i < $sumPagination; $i++) { 
    	 	if ($pagePagination<=7) {
    	 		    	 	$pagination.='<li ><a href="javascript:void(0)" onclick="selectPageSiswa('.$i.')" id="pageSiswa-'.$pagePagination.'">'.$pagePagination.'</a></li>';
    	 	}else{
    	 		    	 	$pagination.='<li class="hide" id="pageSiswa-'.$pagePagination.'"><a href="javascript:void(0)" onclick="selectPageSiswa('.$i.')" >'.$pagePagination.'</a></li>';
    	 	}

    	 	$pagePagination++;
    	 }

    	if ($pagePagination>7) {
    	 	  $pagination.='<li class="" id="page-nextSiswa">
		      								<a href="javascript:void(0)" onclick="nextPageSiswa()" aria-label="NextSiswa">
		        								<span aria-hidden="true">&raquo;</span>
		      								</a>
		    								</li>';
    	 }

    	 if ($pagePagination<3) {
    	 		$pagination='';
    	 }

    echo  json_encode($pagination);
 	}

 	public function detail_mentor_guru($id_guru='')
 	{
 		$datMentoring=$this->Mmentorback->get_siswa_mentor_by_idguru($id_guru);

 		var_dump($datMentoring);
 	}

 } ?>