<?php 
/**
* 
*/
class Mkonsultasi extends CI_Model
{
	
	function __construct(){
	}

	//ambil semua pertnyaan
	function get_all_questions($key=""){
		$sub = "SELECT `pertanyaan`.`id` AS `pertanyaanID`, `photo`, 
		`namaDepan`, `namaBelakang`, `judulPertanyaan`, 
		`isiPertanyaan`, `pertanyaan`.`date_created`, 
		`subbab`.`judulSubBab`,(SELECT COUNT(id) FROM `tb_k_jawab`  WHERE pertanyaanID = pertanyaan.id) AS jumlah
		FROM `tb_k_pertanyaan` `pertanyaan` 
		JOIN `tb_subbab` `subbab` ON `pertanyaan`.`subBabID` = `subbab`.`id` 
		JOIN `tb_siswa` `siswa` ON `pertanyaan`.`siswaID` = `siswa`.`id`
		WHERE `judulPertanyaan` LIKE '%$key%' 
		ORDER BY `pertanyaan`.`date_created` desc ";
		$result = $this->db->query($sub);
		$result->result_array();

		if ($result->result_array()==array()) {
			return false;
		} else {
			return $result->result_array();
		}		
	}

	//ambil pertanyaan yang dimiliki oleh id tertentu.
	function get_my_questions($id_siswa,$key=""){
		$sub = "SELECT `pertanyaan`.`id` AS `pertanyaanID`, `photo`, 
		`namaDepan`, `namaBelakang`, `judulPertanyaan`, 
		`isiPertanyaan`, `pertanyaan`.`date_created`, 
		`subbab`.`judulSubBab`,(SELECT COUNT(id) FROM `tb_k_jawab`  WHERE pertanyaanID = pertanyaan.id) AS jumlah
		FROM `tb_k_pertanyaan` `pertanyaan` 
		JOIN `tb_subbab` `subbab` ON `pertanyaan`.`subBabID` = `subbab`.`id` 
		JOIN `tb_siswa` `siswa` ON `pertanyaan`.`siswaID` = `siswa`.`id` 
		WHERE `siswa`.`id` = $id_siswa 
		AND `judulPertanyaan` LIKE '%$key%' 
		ORDER BY `pertanyaan`.`date_created` desc";
		$result = $this->db->query($sub);

		$result->result_array();

		if ($result->result_array()==array()) {
			return false;
		} else {
			return $result->result_array();
		}		
	}

	//ambil pertanyaan yang memiliki level sama
	function get_my_question_level($id_tingkat,$key=""){

		$sub = "SELECT `pertanyaan`.`id` AS `pertanyaanID`, `photo`, `namaDepan`, 
		`namaBelakang`, `judulPertanyaan`, `isiPertanyaan`, `pertanyaan`.`date_created`, `subbab`.`judulSubBab`,(SELECT COUNT(id) FROM `tb_k_jawab`  WHERE pertanyaanID = pertanyaan.id) AS jumlah
		FROM `tb_k_pertanyaan` `pertanyaan` 
		JOIN `tb_siswa` `siswa` ON `pertanyaan`.`siswaID` = `siswa`.`id` 
		JOIN `tb_subbab` `subbab` ON `pertanyaan`.`subBabID` = `subbab`.`id` 
		JOIN `tb_tingkat` `tingkat` ON `siswa`.`tingkatID` = `tingkat`.`id` 
		WHERE `tingkat`.`id` = 1
		AND `judulPertanyaan` LIKE '%$key%' 
		ORDER BY `pertanyaan`.`date_created` 
		desc";

		$result = $this->db->query($sub);

		$result->result_array();

		if ($result->result_array()==array()) {
			return false;
		} else {
			return $result->result_array();
		}		
	}

	// ambil meta data from konsultasi
	function get_pertanyaan($id_pertanyaan){
		$this->db->select('*');
		$this->db->from('tb_k_pertanyaan pertanyaan');
		$this->db->join('tb_siswa siswa','pertanyaan.siswaID = siswa.id');
		$this->db->join('tb_subbab subbab','pertanyaan.subBabID = subbab.id');
		
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
		$this->db->select('*,jawab.id as jawabID');
		$this->db->from('tb_k_jawab jawab');
		$this->db->where('jawab.pertanyaanID',$pertanyaanID);
		$this->db->join('tb_pengguna pengguna','pengguna.id = jawab.penggunaID');
		$this->db->order_by('jawab.date_created','asc');

		$query = $this->db->get();   
		if ($query->result_array()==array()) {
			return false;
		} else {
			return $query->result_array();
		}
	}

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
		}
		?>