<?php


class Mguru extends CI_Model
{
	#Start function pengaturan Profile untuk update ke db#
	public function update_guru( $data ) {
		$penggunaID=$this->session->userdata['id'] ;
		$this->db->where( 'penggunaID', $penggunaID );
		$this->db->update( 'tb_guru', $data );
		redirect(site_url('guru/dashboard'));
	}

	public function update_email($data)
	{
		$id=$this->session->userdata['id'] ;
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);
		redirect(site_url('guru/dashboard'));
		
	}

	public function update_katasandi($data)
	{
		$id=$this->session->userdata['id'] ;
		$this->db->where('id',$id);
		$this->db->update('tb_pengguna',$data);
		redirect(site_url('guru/dashboard'));

	}
	public function update_photo($photo)
	{
		$data = array(
               'photo' => $photo
            );
		$penggunaID=$this->session->userdata['id'] ;
		$this->db->where('penggunaID',$penggunaID);
		$this->db->update('tb_guru',$data);
		redirect(site_url('guru/dashboard'));
	}
	#END function pengaturan Profile untuk update ke db#

	public function get_single_guru( $data ) {
		$this->db->select( '*' );
		$this->db->from( 'tb_guru guru' );
		$this->db->join( 'tb_mata-pelajaran pelajaran', 'guru.mataPelajaranID=pelajaran.id' );
		$this->db->where( 'guru.id', $data );
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_penulis( $guruID ) {
		$this->db->select( '*' );
		$this->db->from( 'tb_guru guru' );
		$this->db->where( 'guru.id', $guruID );
		$query = $this->db->get();
		return $query->result_array();
	}

	//function untuk mengambil data guru di gunakan untuk menset 
	//data guru ke form pengaturan profil/akun guru
	public function get_datguru()
	{
		$penggunaID=$this->session->userdata['id'] ;	
		$this->db->select('namaDepan,namaBelakang,alamat,noKontak,mataPelajaranID,biografi,photo');
		$this->db->from('tb_guru');
		$this->db->where('penggunaID',$penggunaID); 
		$query = $this->db->get();
         return $query->result_array();
	}

}

?>
