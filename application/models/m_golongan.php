<?php

/**
 *
 */
class M_golongan extends CI_Model
{
  var $id ='';
  var $golongan='';
  var $pangkat='';

  function __construct()
   {
       parent::__construct();
   }

   function get_golongan() {
    $this->db->select('*');
    $this->db->from('golongan');
    $query = $this->db->get();
    return $query->result();
   }

}
?>
