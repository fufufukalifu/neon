<?php 


class Mguru extends CI_Model
{

	public function update_guru($penggunaID,$data)
	{
		echo "update guru";
		$this->db->where('penggunaID',$penggunaID);
		$this->db->update('tb_guru',$data);

	}

	public function update_akun($id,$data)
	{
		echo "update akun";
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);
	}

	public function update_katasandi($id,$data)
	{
		echo "update katasandi";
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);

	}

}

 ?>