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

	public function get_single_guru($data){
		$this->db->select('*');
        $this->db->from('tb_guru guru'); 
        $this->db->join('tb_mata-pelajaran pelajaran','guru.mataPelajaranID=pelajaran.id'); 
		$this->db->where('guru.id',$data);
		$query = $this->db->get();
        return $query->result_array();
	}

}

 ?>