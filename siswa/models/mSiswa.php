<?php 


class Msiswa extends CI_Model
{

	public function update_siswa($data)
	{
		
		$penggunaID=$this->session->userdata['id'] ;
		$this->db->where('penggunaID',$penggunaID);
		$this->db->update('tb_siswa',$data);
		redirect(site_url('siswa'));

	}

	public function update_email($data)
	{
		$id=$this->session->userdata['id'] ;
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);
		echo "email berhasil di ubah";//for testing
	}

	public function update_katasandi($data)
	{
		$id=$this->session->userdata['id'] ;
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);
		redirect(site_url('siswa'));

	}
	public function update_photo($photo)
	{
		$data = array(
               'photo' => $photo
            );
		$penggunaID=$this->session->userdata['id'] ;
		$this->db->where('penggunaID',$penggunaID);
		$this->db->update('tb_siswa',$data);
		redirect(site_url('siswa'));
	}
	public function get_siswa()
	{
			$penggunaID=$this->session->userdata['id'] ;
			//select from 2 table di join semuanya
              $this->db->select('namaDepan');
              $this->db->from('tb_guru guru'); 
              $this->db->join('tb_pengguna pengguna', 'pengguna.id=guru.penggunaID');

       //where 
             $this->db->where('penggunaID',$penggunaID);       
              $query = $this->db->get();
              return $query->result();
	}

	public function get_datsiswa()
	{	
		
		$penggunaID=$this->session->userdata['id'] ;	
		$this->db->select('namaDepan,namaBelakang,alamat,noKontak,namaSekolah,alamatSekolah,biografi,photo');
		$this->db->from('tb_siswa');
		$this->db->where('penggunaID',$penggunaID); 
		$query = $this->db->get();
         return $query->result_array();
	}

	public function get_password ()
	{
		$ID=$this->session->userdata['id'];
		$this->db->select('kataSandi');
		$this->db->from('tb_pengguna');
		$this->db->where('id',$ID);
		$query = $this->db->get();
		return $query->result_array();
	}

}

 ?>