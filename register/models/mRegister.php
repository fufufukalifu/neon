<?php  

/**
* 
*/
class Mregister extends CI_Model
{

	//merupakan function untuk menyimpan data guru ke tabel guru di databse netjoo  
	public function insert_guru($namaDepan,$namaBelakang,$mataPelajaran,$alamat,$noKontak,$namaPengguna)
	{
		
		$this->db->set('namaPengguna',$namaPengguna);
		$this->db->set('namaDepan',$namaDepan);
		$this->db->set('namaBelakang',$namaBelakang);
		$this->db->set('mataPelajaran',$mataPelajaran);
		$this->db->set('alamat',$alamat);
		$this->db->set('nokontak',$noKontak);
		$this->db->insert('tb_guru');
		
	}

	//merupakan function untuk menyimpan data guru ke tabel penggunas di databse netjoo  
	public function insert_pengguna($namaPengguna,$kataSandi,$hakAkses)
	{

		$this->db->set('namaPengguna',$namaPengguna);
		$this->db->set('kataSandi',$kataSandi);
		$this->db->set('hakAkses',$hakAkses);
		$this->db->insert('tb_pengguna');

	}

	//merupakan function untuk menyimpan data guru ke tabel siswa di databse netjoo  
	public function insert_siswa($namaDepan,$namaBelakang,$alamat,$noKontak,$namaSekolah,$alamatSekolah)
	{
		$this->db->set('namaDepan',$namaDepan);
		$this->db->set('namaBelakang',$namaBelakang);
		$this->db->set('alamat',$alamat);
		$this->db->set('noKontak',$noKontak);
		$this->db->set('namaSekolah',$namaSekolah);
		$this->db->set('alamatSekolah');
		$this->db->insert('tb_siswa');

	}


}

?>