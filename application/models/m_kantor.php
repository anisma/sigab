<?php

/**
 *
 */
class M_kantor extends CI_Model
{
  var $id;
  var $unit ='';
  var $nama_kantor ='';

  function __construct()
   {
       parent::__construct();
   }

   function show_all_kantor()
   {
     $query = $this->db->get('kantor');
     return $query->result();
   }

   function show_kantor($id)
   {
     $query = $this->db->get_where('kantor',array('id' => $id));
     return $query->result();
   }

   function insert_kantor()
   {
     $this->unit = $this->input->post('unit');
     $this->nama_kantor = $this->input->post('kantor');

     if($this->db->insert('kantor',$this)){
       return true;
     }else{
       return false;
     }
   }

   function update_kantor($id)
   {
     $this->id = $id;
     $this->unit = $this->input->post('unit');
     $this->nama_kantor = $this->input->post('kantor');
     $this->db->where('id',$id);

     if($this->db->update('kantor',$this)){
       return true;
     }else{
       return false;
     }
   }

   function delete_kantor($id)
   {
     $this->db->where('id',$id);
     if($this->db->delete('kantor')){
       return true;
     }else{
       return false;
     }
   }

   function get_kantor($unit) {
    $this->db->select('*');
    $this->db->from('kantor');
    $this->db->where('unit', $unit);
    $query = $this->db->get();
    return $query->result();
   }
}
?>
