<?php  

/**
* 
*/
class Mregister extends CI_Model
{
	
	public function insert_guru($nama,$mataPelajaran,$namaPengguna)
	{
		$this->db->set('namaDepan',$nama);
		$this->db->set('mataPelajaran',$mataPelajaran);
		$this->db->set('namaPengguna',$namaPengguna);
		$this->db->insert('guru');
	}
}

?>