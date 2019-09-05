<?php

/**
 *
 */
class M_unit extends CI_Model
{
  var $id ='';
  var $unit ='';

  function __construct()
   {
       parent::__construct();
   }

  function get_unit(){
    $query = $this->db->get('unit');
    return $query->result();
  }
}
?>
