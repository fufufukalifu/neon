<?php  

/**
* 
*/
class Mregister extends CI_Model
{

	//merupakan function untuk menyimpan data guru ke tabel guru di databse netjoo  
	public function insert_guru($namaDepan,$namaBelakang,$mataPelajaran,$alamat,$noKontak,$data)
	{
		foreach ($data['tb_pengguna'] as $row) {
			$idPengguna=$row['id'];

			$this->db->set('namaDepan',$namaDepan);
			$this->db->set('namaBelakang',$namaBelakang);
			$this->db->set('mataPelajaran',$mataPelajaran);
			$this->db->set('alamat',$alamat);
			$this->db->set('nokontak',$noKontak);
			$this->db->set('penggunaID',$idPengguna);
			$this->db->insert('tb_guru');
		}
		



		
	}

	//merupakan function untuk menyimpan data guru ke tabel penggunas di databse netjoo  
	public function insert_pengguna($namaPengguna,$kataSandi,$email,$hakAkses)
	{

		$this->db->set('namaPengguna',$namaPengguna);
		$this->db->set('kataSandi',$kataSandi);
		$this->db->set('email',$email);
		$this->db->set('hakAkses',$hakAkses);
		$this->db->insert('tb_pengguna');

	}

	//merupakan function untuk menyimpan data guru ke tabel siswa di databse netjoo  
	public function insert_siswa($namaDepan,$namaBelakang,$alamat,$noKontak,$namaSekolah,$alamatSekolah,$data)
	{
		foreach ($data['tb_pengguna'] as $row) {
			$idPengguna=$row['id'];
			$this->db->set('namaDepan',$namaDepan);
			$this->db->set('namaBelakang',$namaBelakang);
			$this->db->set('alamat',$alamat);
			$this->db->set('noKontak',$noKontak);
			$this->db->set('namaSekolah',$namaSekolah);
			$this->db->set('alamatSekolah',$alamatSekolah);
			$this->db->set('penggunaID',$idPengguna);
			$this->db->insert('tb_siswa');
		}


	}

	public function get_idPengguna($data)
	{
		echo "masuk get ID ";
		$this->db->where('namaPengguna',$data);
		$this->db->select('id')->from('tb_pengguna');
		$query=$this->db->get();
		return $query->result_array();


	}


}

?>