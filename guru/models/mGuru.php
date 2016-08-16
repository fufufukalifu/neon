<?php 


class Mguru extends CI_Model
{

	public function update_guru($data)
	{	
		$penggunaID=$this->session->userdata['id'] ;
		$this->db->where('penggunaID',$penggunaID);
		$this->db->update('tb_guru',$data);
		echo "profile telah diubah";
	}


	public function update_akun($data)
	{	
		$id=$this->session->userdata['id'] ;
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);
	}

	public function update_katasandi($data)
	{
		
		$id=$this->session->userdata['id'] ;
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);

	}

}

 ?>