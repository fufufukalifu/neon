<?php 
/**
* 
*/
class Mkonsultasi extends CI_Model
{
	
	function __construct(){
	}

	//ambil semua pertnyaan
	function get_all_questions($id_siswa,$perpage,$page,$key=""){
	$this->db->select('`pertanyaan`.`id` AS `pertanyaanID`, `photo`, 
			`namaDepan`, `namaBelakang`, `judulPertanyaan`, 
			`isiPertanyaan`, `pertanyaan`.`date_created`, 
			`bab`.`judulBab`,(SELECT COUNT(id) FROM `tb_k_jawab`  WHERE pertanyaanID = pertanyaan.id) AS jumlah');
		$this->db->join('`tb_bab` `bab`','`pertanyaan`.`babID` = `bab`.`id`');
		$this->db->join('`tb_tingkat-pelajaran` `tp`','`bab`.`tingkatPelajaranID` = `tp`.`id`');
		$this->db->join('`tb_siswa` `siswa`','`pertanyaan`.`siswaID` = `siswa`.`id`');
		$this->db->order_by('`pertanyaan`.`id`','desc');

		$query = $this->db->get('`tb_k_pertanyaan` `pertanyaan`',$perpage,$page);
			return $query->result_array();
			
	}
	// ambil jumlah semua pertanyaan
	function get_all_questions_number($key=""){
	$this->db->select('`pertanyaan`.`id`');
		$this->db->join('`tb_bab` `bab`','`pertanyaan`.`babID` = `bab`.`id`');
		$this->db->join('`tb_tingkat-pelajaran` `tp`','`bab`.`tingkatPelajaranID` = `tp`.`id`');
		$this->db->join('`tb_siswa` `siswa`','`pertanyaan`.`siswaID` = `siswa`.`id`');
		// $this->db->where('`siswa`.`id`', $id_siswa )->order_by('`pertanyaan`.`id`','desc');
		$query = $this->db->get('`tb_k_pertanyaan` `pertanyaan`');
			return $query->num_rows();				
	}

	//ambil pertanyaan yang dimiliki oleh id tertentu.
	function get_my_questions($id_siswa,$perpage,$page,$key=""){
		$this->db->select('`pertanyaan`.`id` AS `pertanyaanID`, `photo`, 
			`namaDepan`, `namaBelakang`, `judulPertanyaan`, 
			`isiPertanyaan`, `pertanyaan`.`date_created`, 
			`bab`.`judulBab`,(SELECT COUNT(id) FROM `tb_k_jawab`  WHERE pertanyaanID = pertanyaan.id) AS jumlah');
		$this->db->join('`tb_bab` `bab`','`pertanyaan`.`babID` = `bab`.`id`');
		$this->db->join('`tb_tingkat-pelajaran` `tp`','`bab`.`tingkatPelajaranID` = `tp`.`id`');
		$this->db->join('`tb_siswa` `siswa`','`pertanyaan`.`siswaID` = `siswa`.`id`');
		$this->db->where('`siswa`.`id`', $id_siswa )->order_by('`pertanyaan`.`id`','desc');
		$query = $this->db->get('`tb_k_pertanyaan` `pertanyaan`',$perpage,$page);
		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array();
		}

	}

	//ambil pertanyaan yang dimiliki oleh id tertentu.
	function get_my_questions_number($id_siswa,$key=""){
		$sub = "SELECT `pertanyaan`.`id` AS `pertanyaanID`, `photo`, 
		`namaDepan`, `namaBelakang`, `judulPertanyaan`, 
		`isiPertanyaan`, `pertanyaan`.`date_created`, 
		`bab`.`judulBab`,(SELECT COUNT(id) FROM `tb_k_jawab`  WHERE pertanyaanID = pertanyaan.id) AS jumlah
		FROM `tb_k_pertanyaan` `pertanyaan` 
		JOIN `tb_bab` `bab` ON `pertanyaan`.`babID` = `bab`.`id` 
		JOIN `tb_siswa` `siswa` ON `pertanyaan`.`siswaID` = `siswa`.`id` 
		WHERE `siswa`.`id` = $id_siswa 
		AND `judulPertanyaan` LIKE '%$key%' 
		ORDER BY `pertanyaan`.`date_created` desc";
		$result = $this->db->query($sub);
		return $result->num_rows();		
	}

	//ambil pertanyaan yang memiliki level sama
	function get_my_question_level($id_tingkat,$perpage,$page,$key=""){
		$this->db->select('`pertanyaan`.`id` AS `pertanyaanID`, `photo`, 
			`namaDepan`, `namaBelakang`, `judulPertanyaan`, 
			`isiPertanyaan`, `pertanyaan`.`date_created`, 
			`bab`.`judulBab`,(SELECT COUNT(id) FROM `tb_k_jawab`  WHERE pertanyaanID = pertanyaan.id) AS jumlah');
		$this->db->join('`tb_bab` `bab`','`pertanyaan`.`babID` = `bab`.`id`');
		$this->db->join('`tb_tingkat-pelajaran` `tp`','`bab`.`tingkatPelajaranID` = `tp`.`id`');
		$this->db->join('`tb_siswa` `siswa`','`pertanyaan`.`siswaID` = `siswa`.`id`');
		$this->db->where('`siswa`.`tingkatID`', $id_tingkat)->order_by('`pertanyaan`.`id`','desc');
		$query = $this->db->get('`tb_k_pertanyaan` `pertanyaan`',$perpage,$page);
		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array();
		}

		// $sub = "SELECT `pertanyaan`.`id` AS `pertanyaanID`, `photo`, `namaDepan`, 
		// `namaBelakang`, `judulPertanyaan`, `isiPertanyaan`, `pertanyaan`.`date_created`, 
		// `bab`.`judulBab`,(SELECT COUNT(id) FROM `tb_k_jawab`  WHERE pertanyaanID = pertanyaan.id) AS jumlah
		// FROM `tb_k_pertanyaan` `pertanyaan` 
		// JOIN `tb_siswa` `siswa` ON `pertanyaan`.`siswaID` = `siswa`.`id` 
		// JOIN `tb_bab` `bab` ON `pertanyaan`.`babID` = `bab`.`id` 
		// JOIN `tb_tingkat` `tingkat` ON `siswa`.`tingkatID` = `tingkat`.`id` 
		// WHERE `tingkat`.`id` = 1
		// AND `judulPertanyaan` LIKE '%$key%' 
		// ORDER BY `pertanyaan`.`date_created` 
		// desc";

		// $result = $this->db->query($sub);x
		// $result->result_array();

		// if ($result->result_array()==array()) {
		// 	return false;
		// } else {
		// 	return $result->result_array();
		// }		
	}

	// ambil meta data from konsultasi
	function get_pertanyaan($id_pertanyaan){
		$this->db->select('*, pertanyaan.date_created as tgl_dibuat');
		$this->db->from('tb_k_pertanyaan pertanyaan');
		$this->db->join('tb_siswa siswa','pertanyaan.siswaID = siswa.id');
		$this->db->join('tb_bab bab','pertanyaan.babID = bab.id');
		
		$this->db->join('tb_tingkat tingkat','siswa.tingkatID = tingkat.id');
		$this->db->join('tb_pengguna pengguna','pengguna.id = siswa.penggunaID');

		$this->db->where('pertanyaan.id',$id_pertanyaan);

		$query = $this->db->get();   
		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array();
		}
	}
	//ambil jumlah postingan dalam pertanyaan tertentu.
	function get_jumlah_postingan($pertanyaanID){
		$this->db->select('id');
		$this->db->from('tb_k_jawab jawab');
		$this->db->where('jawab.pertanyaanID',$pertanyaanID);
		$query = $this->db->get();   
		return $query->num_rows();
	}

	//ambil postingan dalam pertanyaan tertentu.
	function get_postingan($pertanyaanID){
		$this->db->select('*,jawab.id as jawabID,siswa.photo siswa_photo,guru.photo guru_photo');
		$this->db->from('tb_k_jawab jawab');
		$this->db->where('jawab.pertanyaanID',$pertanyaanID);
		$this->db->join('tb_pengguna pengguna','pengguna.id = jawab.penggunaID');
		$this->db->join('tb_siswa siswa','pengguna.id = siswa.penggunaID','left');
		$this->db->join('tb_guru guru','pengguna.id = guru.penggunaID','left');

		$this->db->order_by('jawab.date_created','asc');

		$query = $this->db->get();   
		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array();
		}
	}

	//ambil postingan dalam pertanyaan tertentu pagination
	function get_postingan_pagination($pertanyaanID,$number,$offset){
		$this->db->select('*,jawab.id as jawabID,siswa.photo siswa_photo,guru.photo guru_photo');
		// $this->db->from('tb_k_jawab jawab');
		$this->db->where('jawab.pertanyaanID',$pertanyaanID);
		$this->db->join('tb_pengguna pengguna','pengguna.id = jawab.penggunaID');
		$this->db->join('tb_siswa siswa','pengguna.id = siswa.penggunaID','left');
		$this->db->join('tb_guru guru','pengguna.id = guru.penggunaID','left');
		$this->db->order_by('jawab.date_created','asc');
		return $query = $this->db->get('tb_k_jawab jawab',$number,$offset)->result_array();   
	}

	//ambil postingan dalam pertanyaan tertentu pagination

		//ambil jumlah postingan dalam pertanyaan tertentu pagination
	function get_postingan_pagination_number($pertanyaanID){
		$this->db->select('id');
		$this->db->from('tb_k_jawab jawab');
		$this->db->where('jawab.pertanyaanID',$pertanyaanID);

		$this->db->order_by('jawab.date_created','asc');

		$query = $this->db->get();   
		return  $query->num_rows();
	}
	//ambil jumlah postingan dalam pertanyaan tertentu pagination

	//ambil penggunaID by id_jawab
	function get_penggunaID($id_jawab){
		$this->db->select('penggunaID');
		$this->db->from('tb_k_jawab jawab');
		$this->db->where('jawab.id',$id_jawab);
		
		$query = $this->db->get();   
		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array()[0]['penggunaID'];

		}}

	//ambil penggunaID by id_jawab
		function get_date($id_jawab){
			$this->db->select('date_created');
			$this->db->from('tb_k_jawab jawab');
			$this->db->where('jawab.id',$id_jawab);

			$query = $this->db->get();   
			if ($query->result_array()==array()) {
				return false;
			} else {
				return $query->result_array()[0]['date_created'];

			}}


			function search_by($id_siswa, $param){
				$sub = "SELECT `pertanyaan`.`id` AS `pertanyaanID`, `photo`, `namaDepan`,
				`namaBelakang`, `judulPertanyaan`, `isiPertanyaan`, `pertanyaan`.`date_created`, 
				`subbab`.`judulSubBab`,(SELECT COUNT(id) FROM `tb_k_jawab` 
				WHERE pertanyaanID = pertanyaan.id) AS jumlah 
				FROM `tb_k_pertanyaan` `pertanyaan` JOIN `tb_subbab` `subbab` ON `pertanyaan`.`subBabID` = `subbab`.`id` 
				JOIN `tb_siswa` `siswa` ON `pertanyaan`.`siswaID` = `siswa`.`id` 
				WHERE `siswa`.`id` = $id_siswa
				AND `judulPertanyaan` LIKE '$param%'

				ORDER BY `pertanyaan`.`date_created` ASC

				LIMIT 5";

				$result = $this->db->query($sub);

				$result->result_array();

				if ($result->result_array()==array()) {
					return false;
				} else {
					return $result->result_array();
				}		
			}

			function check_postingan($data){
				$this->db->select('siswaID, jawabID');
				$this->db->from('tb_k_love');
				// var_dump($data);
				$this->db->where('siswaID',$data['siswaID']);
				$this->db->where('jawabID',$data['jawabID']);
				$query = $this->db->get();
				
				if ($query->result_array()==array()) {
					return 0;
				} else {
					return 1;

				}
			}

			function cari_pertanyaan($name){
				$this->db->like('judulPertanyaan', $name, 'both');
				return $this->db->get('tb_k_pertanyaan')->result();
			}
// =========## cruud ##==============
			public function insert_konstulasi( $data ) {
				$this->db->insert( 'tb_k_pertanyaan', $data );

			}

// insert jawaban
			public function insert_jawaban($data){
				$this->db->insert( 'tb_k_jawab', $data );

			}

//insert point
			public function insert_point($data){
				$this->db->insert( 'tb_k_love', $data );
			}

			public function get_konsultasi_by_siswa(){
				$sub = "SELECT * FROM 
				(SELECT id FROM tb_siswa s WHERE s.penggunaID = '1589' ) 
				siswa JOIN `tb_k_pertanyaan` p ON siswa.id = p.siswaID";

				$result = $this->db->query($sub);
				return $result->result_array();

			}

			public function in_upload_konsultasi($data){
				$this->db->insert('tb_upload_konsultasi', $data['data_upload_konsultasi']);
			}

			public function show_image(){
				$id = $this->session->userdata('id');

				$this->db->select('*');
				$this->db->from('tb_upload_konsultasi');
				$this->db->where('penggunaID',$id);
				$query = $this->db->get();   
				return $query->result_array();
			}

			#get edit jawaban#
			function get_edit_jawaban($data){
				$this->db->select('*');
				$this->db->from('tb_k_jawab');
				$this->db->where('penggunaID',$data['id_pengguna']);
				$this->db->where('id',$data['id_jawaban']);
				$query = $this->db->get();

				if ($query->result_array()) {
					return $query->result_array();
				}else{
					return false;
				}
			}
			#get edit jawaban#

			function edit_jawaban($data){
				$this->db->set('isiJawaban',htmlspecialchars_decode($data['isiJawaban']));
				$this->db->where('id', $data['id']);
				$this->db->update('tb_k_jawab');
			}


			// get single jawaban
			function show_post($id_jawaban){
				$this->db->select('*,jawab.id as jawabID,siswa.photo siswa_photo,guru.photo guru_photo');
				$this->db->from('tb_k_jawab jawab');
				$this->db->join('tb_k_pertanyaan pertanyaan','jawab.pertanyaanID = pertanyaan.id');
				$this->db->join('tb_pengguna pengguna','pengguna.id = jawab.penggunaID');
				$this->db->join('tb_siswa siswa','pengguna.id = siswa.penggunaID','left');
				$this->db->join('tb_guru guru','pengguna.id = guru.penggunaID','left');

				$this->db->order_by('jawab.date_created','asc');

				$this->db->where('jawab.id',$id_jawaban);
				$query = $this->db->get();

				if ($query->result_array()) {
					return $query->result_array();
				}else{
					return false;
				}
			}
			// get single jawaban

		}
		?>