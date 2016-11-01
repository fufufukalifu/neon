<?php

class Mvideos extends CI_Model

{



  function __construct() {
    $this->load->database();
  }

  //get  semua video by sub
  function get_all_video_by_bab($idbab){
    $this->db->select('video.id as videoID, subbab.id as subabID, judulSubBab, judulVideo');
    $this->db->from( 'tb_subbab subbab' );
    $this->db->join('tb_video video','subbab.id = video.subBabID');
    $this->db->order_by('subbab.id');

    $query = $this->db->get();
    return $query->result_array(); 
  }

    //get nama subab berdasarkan id video
  function get_nama_sub_by_id_video($id_video){
    $this->db->select( 'judulSubBab,subbab.id ');
    $this->db->from( 'tb_subbab subbab' );
    $this->db->join('tb_video video','subbab.id = video.subBabID');
    $this->db->where('video.id',$id_video);

    $query = $this->db->get();
    return $query->result_array()[0];    
  }

  //mengambil matapelajaran berdasarkan tingkat dan matapelajaranya
  function get_video_as_bab( $alias_tingkat, $alias_pelajaran ) {
    //select from 5 table di join semuanya
    $this->db->select( 'bab.id as babid,subbab.id as subbabID,aliasMataPelajaran,judulBab,judulSubBab,aliasTingkat ' );
    $this->db->from( 'tb_subbab subbab' );
    $this->db->join( 'tb_bab bab', 'subbab.babID=bab.id' );
    $this->db->join( 'tb_tingkat-pelajaran tingpel', 'tingpel.id=bab.tingkatPelajaranID' );
    $this->db->join( 'tb_tingkat tingkat', 'tingpel.tingkatID=tingkat.id' );
    $this->db->join( 'tb_mata-pelajaran mapel', 'tingpel.mataPelajaranID=mapel.id' );
    //where
    $this->db->where( 'aliasMataPelajaran', $alias_pelajaran );
    $this->db->where( 'aliasTingkat', $alias_tingkat );
    $query = $this->db->get();
    return $query->result();
  }

  function get_sub_by_id($babid){
          //select from 5 table di join semuanya
    $this->db->select( 'bab.id as babid,subbab.id as subbabID,judulBab,judulSubBab ' );
    $this->db->from( 'tb_subbab subbab' );
    $this->db->join( 'tb_bab bab', 'subbab.babID=bab.id' );
    //where
    $this->db->where( 'bab.id', $babid );
    $query = $this->db->get();
    return $query->result();
  }


    function get_video_as_sub( $alias_tingkat, $alias_pelajaran ) {
    //select from 5 table di join semuanya
        $myquery ="SELECT *,video.id as videoID, subbab.id as subbabID,bab.id as babID FROM tb_video video
        JOIN tb_subbab subbab ON
        video.subBabID = subbab.id
        JOIN tb_bab bab ON
        bab.id = subbab.babID
        JOIN `tb_tingkat-pelajaran` tingpel
        ON tingpel.id = bab.`tingkatPelajaranID`
        JOIN tb_tingkat tingkat ON
        tingkat.`id` = tingpel.`tingkatID`
        JOIN `tb_mata-pelajaran` mapel
        ON mapel.`id` = tingpel.`mataPelajaranID`
        WHERE `aliasMataPelajaran` = '$alias_pelajaran' AND `aliasTingkat` = '$alias_tingkat' order by bab.id
";

    $result = $this->db->query($myquery);
    return $result->result();
    // return $query->result();

  }



  //ambil semua video yang berada dalam 1 sub-bab

  function get_all_subab( $id_sub_bab ) {
    $this->db->select( '*' );
    $this->db->from( 'tb_subbab subbab' );
    $this->db->join( 'tb_video video', 'subbab.id=video.subBabId' );
    $this->db->join('tb_bab bab','bab.id = subbab.babID');
    $this->db->where( 'subbab.id', $id_sub_bab );
    $query = $this->db->get();
    $this->db->last_query();
    $hasil = $query->result();
    return $query->result_array();
  }

  //ambil semua video yang dibuat oleh guru

  function get_all_video_by_teacher( $guru_id ) {
    $this->db->select( '*, video.id as videoID,namaDepan,namaBelakang,judulSubBab,judulBab, tp.keterangan as matapelajaran' );
    $this->db->from( 'tb_video video' );
    $this->db->join( 'tb_guru guru', 'video.guruID=guru.id' );
    $this->db->join('tb_subbab subbab','video.subBabID=subbab.id');
    $this->db->join('tb_bab bab','subbab.babID=bab.id');
    $this->db->join('tb_tingkat-pelajaran tp','bab.tingkatPelajaranID=tp.id');
    $this->db->where( 'guru.id', $guru_id );
    $this->db->where('video.status', '1');
    $query = $this->db->get();
    return $query->result_array();
  }



    //ambil semua video yang dibuat oleh guru

  function get_video_by_teacher( $guru_id ) {

    $this->db->select( '*, video.id as videoID' );

    $this->db->from( 'tb_video video' );

    $this->db->join( 'tb_guru guru', 'video.guruID=guru.id' );

    $this->db->where( 'guru.id', $guru_id );

    $this->db->where('video.status', '1');

    $this->db->limit(3);

    $query = $this->db->get();



    return $query->result_array();



  }



  //ambil semua video yang berada dalam 1 sub-bab

  function get_video_by_sub( $id_sub ) {

    $this->db->select( '*, video.id' );

    $this->db->from( 'tb_video video' );

    $this->db->join( 'tb_subbab subbab', 'subbab.id=video.subBabID' );

    $this->db->where( 'subbab.id', $id_sub );

    $query = $this->db->get();



    return $query->result();

  }

  //ambil 1 video bedasarkan id videonya

  function get_single_video( $id_video ) {

    $this->db->select( '*' );

    $this->db->from( 'tb_video video' );

    $this->db->where( 'id', $id_video );

    $query = $this->db->get();



    return $query->result();

  }



  //ambil subab yang berada dalam bab yang sama

  function get_sub_by_babid( $bab_id ) {

    $this->db->select( '*' );

    $this->db->from( 'tb_subbab subbab' );

    $this->db->where( 'babID', $bab_id );

    $query = $this->db->get();



    return $query->result();

  }



  //ambil meta data dari video

  function get_matapelajaran( $idvideo ) {

    $this->db->select( '*' );

    $this->db->from( 'tb_mata-pelajaran mapel' );



    $this->db->join( 'tb_tingkat-pelajaran tipel', 'mapel.id=tipel.mataPelajaranID' );

    $this->db->join( 'tb_bab bab', 'bab.tingkatPelajaranID=tipel.id' );

    $this->db->join( 'tb_subbab subab', 'bab.id=subab.babID' );

    $this->db->join( 'tb_video video', 'video.subBabID=subab.id' );

    $this->db->where( 'video.id', $idvideo );



    $query = $this->db->get();

    return $query->result();

  }



  public function insertComment( $data_komen ) {

    $this->db->insert( 'tb_komen', $data_komen );

  }



  public function deleteVideo($idVideo, $idGuru) {

    $data = array( 'status' => 0 );

    $this->db->where( 'id', $idVideo );

    $this->db->where( 'guruID', $idGuru );



    $this->db->update( 'tb_video', $data );



  }



  function get_all_videos_admin() {

    $this->db->select( '*, video.id as videoID' );

    $this->db->from( 'tb_video video' );

    $this->db->join('tb_guru guru', 'guru.id=video.guruID');

    $this->db->where('video.status', '0');

    $query = $this->db->get();

    return $query->result();

  }





   function get_pelajaran_for_paket( $id_subab ) {

    $this->db->select( '*' );

    $this->db->from( 'tb_mata-pelajaran mapel' );



    $this->db->join( 'tb_tingkat-pelajaran tipel', 'mapel.id=tipel.mataPelajaranID' );

    $this->db->join( 'tb_bab bab', 'bab.tingkatPelajaranID=tipel.id' );

    $this->db->join( 'tb_subbab subab', 'bab.id=subab.babID' );

    // $this->db->join( 'tb_video video', 'video.subBabID=subab.id' );

    $this->db->where( 'subab.id', $id_subab );

    $query = $this->db->get();

    return $query->result();

  }

  //get nama file untuk menghapus file video di Videoback->function del_file_video

  function get_nameFile($videoID)

  {

   $this->db->select('namaFile');

   $this->db->from('tb_video');

   $this->db->where('id',$videoID);

   $query = $this->db->get();

    return $query->result();

    // $result = $query->result_array();

    // if($query->num_rows() == 1) {

    //   return $result[0];

    // }

    // return $result;

  }



    function get_numbers_all_video() {

    $this->db->select( 'video.id as videoID' );

    $this->db->from( 'tb_video video' );

    $query = $this->db->get();

    return $query->num_rows();

  }

  function get_last_video(){
    $this->db->select( '*' );
    $this->db->from( 'tb_video video' );
    $this->db->order_by('date_created','desc');
    $this->db->limit('2');
    $query = $this->db->get();
    return $query->result_array();
  }

}

?>

