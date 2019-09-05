<?php

/**
 *
 */
class M_gaji extends CI_Model
{
  var $id;
  var $golongan ='';
  var $masa_kerja ='';
  var $gaji_pokok ='';

  function __construct()
   {
       parent::__construct();
   }

  function show_gaji()
  {
    $this->db->select('*');
    $this->db->from('gaji a');
    $this->db->join('golongan b', 'b.id = a.golongan', 'left' );
    return $this->db->get()->result();
  }

  function delete_all()
  {
    if ($this->db->empty_table('gaji')) {
      return true;
    }
    return false;
  }

  public function upload_file($filename){

    $config['upload_path'] = './upload/excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = 5000;
    $config['overwrite'] = true;
    $config['file_name'] = $filename;

    $this->load->library('upload',$config); // Load librari upload
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if(!isset($_FILES['filename']) || $_FILES['filename']['error'] == UPLOAD_ERR_NO_FILE) {
      $this->session->set_flashdata('gagal','File belum dipilih.');
    }else{
      if($this->upload->do_upload('filename')){ // Lakukan upload dan Cek jika proses upload berhasil
        // Jika berhasil :
        $this->session->set_flashdata('sukses','File berhasil diupload.');
        $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        return $return;
      }else{
        // Jika gagal :
        $this->session->set_flashdata('gagal','File gagal diupload.');
        $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        // return $return;
      }
    }
  }

  public function insert_multiple($data){
    $this->db->insert_batch('gaji', $data);
  }

  function get_gaji($gol, $mk) {
   $this->db->select('gaji_pokok');
   $this->db->from('gaji');
   $this->db->where('golongan', $gol);
   $this->db->where('masa_kerja', $mk);
   $query = $this->db->get();
   return $query->result();
  }
}
?>
