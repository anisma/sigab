<?php

/**
 *
 */
class M_format_surat extends CI_Model
{
  var $id;
  var $nama ='';
  var $pangkat ='';
  var $nip ='';
  var $uu_gaji ='';

  function __construct()
   {
       parent::__construct();
   }

  function show()
  {
    $this->db->select('*');
    $this->db->from('format_surat');
    return $this->db->get()->result();
  }

  function update()
  {
    $this->id='kadin';
    $this->nama = ucwords($this->input->post('nama_kadin'));
    $this->nip = $this->input->post('nip_kadin');
    $this->pangkat = ucwords($this->input->post('pangkat_kadin'));
    $this->uu_gaji = ucwords($this->input->post('uu'));

    $this->db->where('id', 'kadin');
    if($this->db->update('format_surat',$this)){
      return true;
    }else{
      return false;
    }
  }
}
?>
