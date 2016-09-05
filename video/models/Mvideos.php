<?php
class Mvideos extends CI_Model
{

  function __construct() {
    $this->load->database();
  }

  //mengambil matapelajaran berdasarkan tingkat dan matapelajaranya
  function get_video_as_bab( $alias_tingkat, $alias_pelajaran ) {
    //select from 5 table di join semuanya
    $this->db->select( 'bab.id as babid,subbab.id as subid,aliasMataPelajaran,judulBab,judulSubBab,aliasTingkat' );
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

  //ambil semua video yang berada dalam 1 sub-bab
  function get_all_subab( $id_sub_bab ) {
    $this->db->select( '*' );
    $this->db->from( 'tb_subbab subbab' );
    $this->db->join( 'tb_video video', 'subbab.id=video.subBabId' );
    $this->db->where( 'subbab.id', $id_sub_bab );
    $query = $this->db->get();
    $this->db->last_query();
    $hasil = $query->result();

    return $query->result();

  }
  //ambil semua video yang dibuat oleh guru
  function get_video_by_teacher( $guru_id ) {
    $this->db->select( '*' );
    $this->db->from( 'tb_video video' );
    $this->db->join( 'tb_guru guru', 'video.guruID=guru.id' );
    $this->db->where( 'guru.id', $guru_id );
    $query = $this->db->get();

    return $query->result();

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
  function get_sub_by_babid($bab_id) {
    $this->db->select( '*' );
    $this->db->from( 'tb_subbab subbab' );
    $this->db->where( 'babID', $bab_id );
    $query = $this->db->get();

    return $query->result();
  }
}
?>
