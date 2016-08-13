<?php 


/**
* 
*/
class DashboardGuru extends MX_Controller
{
	
	 public function __construct() {
        parent::__construct();
        $this->load->model('mguru');
    }

     // function untuk menampikan halam pertama saat registrasi
    public function index() {
    	
       $this->load->view('templating/t-header');
       $this->load->view('vProfileGuru');
       $this->load->view('templating/t-footer');
    }

    public function profileguru()
    {
    	echo "a";
    	$this->load->view('vProfileGuru');
    }


    public function ubahprofileguru()
    { 

      $namaDepan=htmlspecialchars($this->input->post('namadepan'));
      $namaBelakang=htmlspecialchars($this->input->post('namabelakang'));
      $mataPelajaran=htmlspecialchars($this->input->post('mtpelajaran'));
      $alamat=htmlspecialchars($this->input->post('alamat'));
      $noKontak=htmlspecialchars($this->input->post('nokontak'));
      $biografi=htmlspecialchars($this->input->post('biografi'));
      $penggunaID='1';
      $data_post=array(
        'namaDepan'=>$namaDepan,
        'namaBelakang'=>$namaBelakang,
        'mataPelajaran'=>$mataPelajaran,
        'alamat'=>$alamat,
        'noKontak'=>$noKontak,
        'biografi'=>$biografi,
        );
     $this->mguru->update_guru($penggunaID,$data_post);

    }

    public function ubahakunguru()
    {
       $namaPengguna=htmlspecialchars($this->input->post('namapengguna'));
      $email=htmlspecialchars($this->input->post('email'));
      //$id var sementara
      $id='1';
        $data_post=array(
        'id'=>'1',
        'namaPengguna'=>$namaPengguna,
        'email'=>$email,
        );
      $this->mguru->update_akun($id,$data_post);
    }


    public function ubahkatasandi()
    {
      $kataSandi=htmlspecialchars(md5($this->input->post('newpass')));
      //$id var sementara
      $id='1';
        $data_post=array(
        'id'=>'1',
        'kataSandi'=>$kataSandi,
        );
      $this->mguru->update_katasandi($id,$data_post);
    }
}

?>