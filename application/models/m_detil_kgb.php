<?php

/**
 *
 */
class M_detil_kgb extends CI_Model
{
  var $id;
  var $no_surat='';
  var $tanggal ='';
  var $golongan ='';
  var $skp = '';
  var $no_skp='';
  var $file_skp ='';
  var $tgl_skp ='';
  var $tmt_lama ='';
  var $tahun_mk_skp ='';
  var $bulan_mk_skp = '';
  var $tahun_mk='';
  var $bulan_mk ='';
  var $gaji_lama ='';
  var $terbilang_gaji_lama;
  var $gaji_baru ='';
  var $terbilang_gaji_baru;
  var $tmt_baru ='';
  var $tmt_mendatang = '';
  var $no_sk_kgb ='';
  var $file_sk_kgb ='';

  function __construct()
   {
       parent::__construct();
   }

  function show_kgb($nip)
  {
    $this->db->select('c.nama, c.unit, a.nip, b.id, b.no_surat, tanggal,tmt_baru, no_skp, file_skp, file_sk_kgb, no_sk_kgb');
    $this->db->from('kgb a');
    $this->db->join('detil_kgb b', 'b.id = a.no_surat', 'left' );
    $this->db->join('duk c', 'a.nip = c.nip', 'left' );
    $this->db->where('a.nip',$nip);
    return $this->db->get()->result();
  }

  function show_last_kgb($nip)
  {
    $this->db->select('b.id, b.no_surat, tanggal');
    $this->db->from('kgb a');
    $this->db->join('detil_kgb b', 'b.id = a.no_surat', 'left' );
    $this->db->where('a.nip',$nip);
    $this->db->limit(1);
    $this->db->order_by('b.id','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  function show_kgb_by_id($no)
  {
    $this->db->select('b.*, c.pangkat');
    $this->db->from('kgb a');
    $this->db->join('detil_kgb b', 'b.id = a.no_surat', 'left' );
    $this->db->join('golongan c', 'c.id = b.golongan', 'left' );
    $this->db->where('a.no_surat',$no);
    return $this->db->get()->result();
  }

  function show_kgb_by_month($month, $year){
    $this->db->select('a.id,tmt_mendatang,tgl_skp, tanggal, c.nip, nama, nama_kantor');
    $this->db->from('kgb a');
    $this->db->join('detil_kgb b', 'b.id = a.no_surat', 'left' );
    $this->db->join('duk c', 'c.nip = a.nip', 'left' );
    $this->db->join('kantor d', 'd.id = c.unit', 'left' );
    $this->db->where('MONTH(b.tmt_mendatang)',$month);
    $this->db->where('YEAR(b.tmt_mendatang)',$year);
    $this->db->not_like('YEAR(b.tanggal)',$year);
    return $this->db->get()->result();
  }

  function insert_kgb($nip)
  {
    $this->no_surat = $this->input->post('no_kgb');
    $this->tanggal = date('Y-m-d');
    $this->golongan = $this->input->post('golongan');
    $this->skp = ucwords($this->input->post('sk'));
    $this->no_skp = $this->input->post('nomor_sk');
    $this->tgl_skp = date_format(new DateTime(str_replace('/', '-',$this->input->post('tanggal_sk'))),'Y-m-d');
    $this->tmt_lama = date_format(new DateTime(str_replace('/', '-',$this->input->post('tmt'))),'Y-m-d');
    $this->tahun_mk_skp= $this->input->post('tahun');
    $this->bulan_mk_skp = $this->input->post('bulan');
    $this->tahun_mk = $this->input->post('tahun_baru');
    $this->bulan_mk = $this->input->post('bulan_baru');;
    $this->gaji_lama= $this->input->post('gaji_lama');
    $this->terbilang_gaji_lama= ucfirst($this->input->post('t_gaji_lama'));
    $this->gaji_baru = $this->input->post('gaji_baru');
    $this->terbilang_gaji_baru= ucfirst($this->input->post('t_gaji_baru'));
    $this->tmt_baru = date_format(new DateTime(str_replace('/', '-',$this->input->post('tmt_baru'))),'Y-m-d');
    $this->tmt_mendatang = date_format(new DateTime(str_replace('/', '-',$this->input->post('tmt_mendatang'))),'Y-m-d');
    $this->file_sk_kgb = 'no_file';

    // //Upload file SKP
    $config['upload_path']="./upload/skp/";
    $config['allowed_types'] = 'jpg|png|pdf|jpeg';
    $config['max_size'] = 2048;
    $config['overwrite'] = true;
    $config['file_name'] = str_replace(str_split('\\/:*?"<>|'), '-', $this->no_skp).".".pathinfo($_FILES['file_sk']['name'], PATHINFO_EXTENSION);

    if($this->input->post('no_sk')=='lainnya'){
      if(!isset($_FILES['file_sk']) || $_FILES['file_sk']['error'] == UPLOAD_ERR_NO_FILE) {
        $this->session->set_flashdata('gagal','File belum dipilih.');
        return false;
      } else {
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if($this->upload->do_upload("file_sk")){
          $data = array('upload_data' => $this->upload->data());
          $file= $data['upload_data']['file_name'];
          $this->file_skp= $file;
          if($this->db->insert('detil_kgb',$this)){
            return true;
          }else{
            return false;
          }
        }else{
          $this->session->set_flashdata('upload_error',$this->upload->display_errors('<div class="invalid-feedback">','</div>'));
          $this->session->set_flashdata('post_data', $this->input->post());
          redirect('tambah_kgb/'.$nip, 'refresh');
        }
      }
    }else{
      if(!isset($_FILES['file_sk']) || $_FILES['file_sk']['error'] == UPLOAD_ERR_NO_FILE) {
        $this->file_skp='no_file';
        if($this->db->insert('detil_kgb',$this)){
          return true;
        }else{
          return false;
        }
      }
    }
  }

  function upload_sk_kgb($id){
    // //Upload file SK
    $config['upload_path']="./upload/sk_kgb/";
    $config['allowed_types'] = 'jpg|png|pdf|jpeg';
    $config['max_size'] = 2048;
    $config['overwrite'] = true;
    $config['file_name'] = str_replace(str_split('\\/:*?"<>|'), '-', $this->input->post('no_sk_kgb')).".".pathinfo($_FILES['file_sk_kgb']['name'], PATHINFO_EXTENSION);

    if(!isset($_FILES['file_sk_kgb']) || $_FILES['file_sk_kgb']['error'] == UPLOAD_ERR_NO_FILE) {
      $this->session->set_flashdata('gagal','File belum dipilih.');
    }else{
      $this->load->library('upload',$config);
      $this->upload->initialize($config);

      if($this->upload->do_upload("file_sk_kgb")){
        $data = array('upload_data' => $this->upload->data());
        $file= $data['upload_data']['file_name'];
        $data_update = array('file_sk_kgb' => $file, 'no_sk_kgb'=> $this->input->post('no_sk_kgb'));
        $this->db->where('id', $id);
        if($this->db->update('detil_kgb', $data_update)){
          return true;
        }else{
          return false;
        }
      }else{
        die($this->upload->display_errors('<p>','</p>'));
      }
    }
  }

  function get_last_id(){
    $this->db->select('id');
    $this->db->from('detil_kgb');
    $this->db->limit(1);
    $this->db->order_by('id','DESC');
    $query = $this->db->get();
    return $query->row();
  }

  function generate_no_sk(){
    $this->db->select('no_surat');
    $this->db->from('detil_kgb');
    $this->db->limit(1);
    $this->db->order_by('id','DESC');
    $result = $this->db->get()->row();

    if(isset($result)){
      $res = $this->db->select("no_surat")->from("detil_kgb")->like("no_surat", date('Y'))->get()->row();
      if(isset($res)){
        $no_surat = substr($result->no_surat, 6, 3);
        $no = str_pad($no_surat + 1, 3, 0, STR_PAD_LEFT);
        $no_surat = '822.2/'.$no.'/'. date('Y');
      }else{
        $no_surat = '822.2/001/'. date('Y');
      }
    }else {
      $no_surat = '';
    }
    return $no_surat;
  }

  function get_kgb_by_no_sk($no_skp){
    $this->db->select('id');
    $this->db->from('detil_kgb');
    $this->db->where('no_skp',$no_skp);
    return $this->db->get()->row();
  }

  function count()
  {
    //all
    $this->db->select('*');
    $this->db->from('detil_kgb');
    $this->db->where('MONTH(tmt_mendatang)',date('m'));
    $this->db->where('YEAR(tmt_mendatang)',date('Y'));
    $a = $this->db->count_all_results();

    //disdikbudpora
    $this->db->select('tmt_mendatang');
    $this->db->from('kgb a');
    $this->db->join('detil_kgb b', 'b.id = a.no_surat', 'left' );
    $this->db->join('duk c', 'a.nip = c.nip', 'left' );
    $this->db->where('unit','1');
    $this->db->where('MONTH(tmt_mendatang)',date('m'));
    $this->db->where('YEAR(tmt_mendatang)',date('Y'));
    $d = $this->db->count_all_results();

    //uptd
    $this->db->select('tmt_mendatang');
    $this->db->from('kgb a');
    $this->db->join('detil_kgb b', 'b.id = a.no_surat', 'left' );
    $this->db->join('duk c', 'a.nip = c.nip', 'left' );
    $this->db->where('unit','2');
    $this->db->where('MONTH(tmt_mendatang)',date('m'));
    $this->db->where('YEAR(tmt_mendatang)',date('Y'));
    $u = $this->db->count_all_results();

    //sekolah
    $this->db->select('tmt_mendatang');
    $this->db->from('kgb a');
    $this->db->join('detil_kgb b', 'b.id = a.no_surat', 'left' );
    $this->db->join('duk c', 'a.nip = c.nip', 'left' );
    $this->db->where('unit','3');
    $this->db->where('MONTH(tmt_mendatang)',date('m'));
    $this->db->where('YEAR(tmt_mendatang)',date('Y'));
    $s = $this->db->count_all_results();

    return array('a' => $a ,'d' => $d , 'u' => $u,'s'=> $s );;
  }
}
?>
