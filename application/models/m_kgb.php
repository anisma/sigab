<?php

/**
 *
 */
class M_kgb extends CI_Model
{
  var $no_surat='';
  var $nip ='';
  var $id;

  function __construct()
   {
       parent::__construct();
   }


  function insert_kgb($nip, $no_surat)
  {
    $this->nip = $nip;
    $this->no_surat = $no_surat;
    if($this->db->insert('kgb',$this)){
      return true;
    }else{
      return false;
    }
  }

  function count()
  {
    //all
    $this->db->select('*');
    $this->db->from('kgb');
    $all = $this->db->count_all_results();
    return $all;
  }
}
?>
