<?php 


class Msiswa extends CI_Model
{

	public function update_siswa($data)
	{
		
		$penggunaID=$this->session->userdata['id'] ;
		$this->db->where('penggunaID',$penggunaID);
		$this->db->update('tb_siswa',$data);
		echo "profile telah diubah";

	}

	public function update_email($data)
	{
		$id=$this->session->userdata['id'] ;
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);
		echo "email berhasil di ubah";
	}

	public function update_katasandi($data)
	{
		$id=$this->session->userdata['id'] ;
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);

	}

}

 ?>