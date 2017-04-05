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

		$this->db->where( 'guru.penggunaID', $data );

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



	#function untuk mengambil 4 rcord random dari table guru

	function get_guru_random(){

		$this->db->select('namaDepan,namaBelakang,alamat,noKontak,mataPelajaranID,biografi,photo');

		$this->db->from('tb_guru');

		$this->db->order_by( 'rand()' );

		$this->db->limit(4);

		$query = $this->db->get();

		return $query->result_array();

	}

	##



	## function untuk get jumlah guru berapa

	function get_teachers_number(){

		$this->db->select('id');

		$this->db->from('tb_guru');

		$query = $this->db->get();

		return $query->num_rows();

	}



	## function get guru

	function get_teacher_user(){

		$this->db->select('*, guru.id as guruID,pengguna.id as penggunaID');

		$this->db->from('tb_guru guru');

		$this->db->join('tb_pengguna pengguna','guru.penggunaID = pengguna.id');

		$this->db->order_by('regTime','desc');

		$this->db->where('pengguna.status', 1);

		$this->db->where('guru.status', 1);



		$query = $this->db->get();

		return $query->result_array();

	}



	## function hapus guru

	function drop_guru($id,$idp){

		//update tabel guru statusnya jadi 0

		$this->db->set( 'status', 0 );

		$this->db->where( 'id', $id );

		$this->db->update( 'tb_guru' );

		// //update table pengguna statusnya jadi 0

		$this->db->set( 'status', 0 );

		$this->db->where( 'id', $idp );

		$this->db->update( 'tb_pengguna' );

	}

	function get_avatar(){
		$id_pengguna = $this->session->userdata('id');
		$this->db->select('photo');
		$this->db->from('tb_guru');
		$this->db->where('penggunaID',$id_pengguna);
		$query = $this->db->get();
		// return $query->result_array()[0]['photo'];
	}

}



?>

