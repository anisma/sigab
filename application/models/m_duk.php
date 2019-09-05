<?php

/**
 *
 */
class M_duk extends CI_Model
{
  var $nip ='';
  var $nama ='';
  var $tempat_lahir ='';
  var $tanggal_lahir ='';
  var $jabatan = '';
  var $unit ='';
  var $kantor ='';

  function __construct()
   {
       parent::__construct();
   }

  function show_duk($unit)
  {
    $this->db->select('nip, nama, tempat_lahir, tanggal_lahir, jabatan, a.unit, b.nama_kantor');
    $this->db->from('duk a');
    $this->db->join('kantor b', 'b.id = a.kantor', 'left' );
    $this->db->where('a.unit',$unit);
    return $this->db->get()->result();
  }

  function insert_duk($unit)
  {
    $this->nip = $this->input->post('nip');
    $this->nama = ucwords($this->input->post('nama'));
    $this->tempat_lahir = ucwords($this->input->post('tempat_lahir'));
    $this->tanggal_lahir = date_format(new DateTime(str_replace('/', '-',$this->input->post('tanggal_lahir'))),'Y-m-d');
    $this->jabatan = ucwords($this->input->post('jabatan'));
    $this->unit = $unit;
    $this->kantor = $this->input->post('kantor');

    if($this->db->insert('duk',$this)){
      return true;
    }else{
      return false;
    }
  }

  function show_duk_by_id($nip)
  {
    $this->db->select('id, nip, nama, tempat_lahir, tanggal_lahir,jabatan, a.unit, nama_kantor');
    $this->db->from('duk a');
    $this->db->join('kantor b', 'b.id = a.unit', 'left' );
    $this->db->where('a.nip',$nip);
    return $this->db->get()->result();
  }

  function update_duk($nip, $unit)
  {
    $this->nip = $nip;
    $this->nama = ucwords($this->input->post('nama'));
    $this->tempat_lahir = ucwords($this->input->post('tempat_lahir'));
    $this->tanggal_lahir = date_format(new DateTime(str_replace('/', '-',$this->input->post('tanggal_lahir'))),'Y-m-d');
    $this->unit =$unit;
    $this->jabatan = ucwords($this->input->post('jabatan'));
    $this->kantor = $this->input->post('kantor');
    $this->db->where('nip', $this->nip);
    if($this->db->update('duk',$this)){
      return true;
    }else{
      return false;
    }
  }

  function delete_duk($nip)
  {
    $this->db->where('nip',$nip);
    if($this->db->delete('duk')){
      return true;
    }else{
      return false;
    }
  }

  function count()
  {
    //all
    $this->db->select('*');
    $this->db->from('duk a');
    $a = $this->db->count_all_results();

    //disdikbudpora
    $this->db->select('*');
    $this->db->from('duk a');
    $this->db->where('a.unit','1');
    $d = $this->db->count_all_results();

    //UPTD
    $this->db->select('*');
    $this->db->from('duk a');
    $this->db->where('a.unit','2');
    $u = $this->db->count_all_results();

    //sekolah$this->db->select('*');
    $this->db->from('duk a');
    $this->db->where('a.unit','3');
    $s = $this->db->count_all_results();

    return array('a' => $a ,'d' => $d , 'u' => $u,'s'=> $s );;
  }
}
?>
