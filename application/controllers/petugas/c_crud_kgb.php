<?php

/**
 *
 */
class C_crud_kgb extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in')) {
			if ($this->session->userdata('level') != 2) {
				redirect('admin');
			}
		} else {
			redirect('login');
		}
 }

//-----------CREATE-----------------

  function create($nip)
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['title'] = 'Tambah KGB';
    $data['golongan'] = $this->m_golongan->get_golongan();
    $data['no_sk'] = $this->m_detil_kgb->show_last_kgb($nip);
    $data['nip'] = $nip;
    $data['no_surat']= $this->m_detil_kgb->generate_no_sk();
    $this->load->view('petugas/theme/header',$data);
    $this->load->view('petugas/v_create_kgb',$data);
    $this->load->view('petugas/theme/footer');
  }

  function create_process($nip)
  {
    //validasi
    $this->form_validation->set_rules(
      'no_kgb','Nomor Surat',
      'required|is_unique[detil_kgb.no_surat]|exact_length[14]',
      array('is_unique' => '%s sudah ada.')
    );
    $this->form_validation->set_rules('no_sk','Nomor SKP','required',
      array('required' => 'Pilih salah satu.')
    );
    $this->form_validation->set_rules('sk','SK','required');
    $this->form_validation->set_rules('nomor_sk', 'Nomor SK', 'required|is_unique[detil_kgb.no_skp]|exact_length[14]');
    if($this->input->post('no_sk')=='lainnya'){
      if(!isset($_FILES['file_sk']) || $_FILES['file_sk']['error'] == UPLOAD_ERR_NO_FILE)
      {
        $this->form_validation->set_rules('file_sk', 'File SK', 'required');
      }
    }
    $this->form_validation->set_rules('tanggal_sk', 'Tanggal SK', 'required');
    $this->form_validation->set_rules('tmt', 'TMT', 'required');
    $this->form_validation->set_rules('tahun','Tahun','required');
    $this->form_validation->set_rules('bulan','Bulan','required');
    $this->form_validation->set_rules('gaji_lama', 'Gaji Pokok Lama', 'required');
    $this->form_validation->set_rules('tanggal_sk', 'Tanggal SK', 'required');
    $this->form_validation->set_rules('tahun_baru', 'Tahun', 'required');
    $this->form_validation->set_rules('bulan_baru','Bulan','required');
    $this->form_validation->set_rules('golongan','Golongan','required');
    $this->form_validation->set_rules('tmt_baru', 'TMT baru', 'required');
    $this->form_validation->set_rules('tmt_mendatang', 'TMT Mendatang', 'required');
    $this->form_validation->set_rules('gaji_baru', 'Gaji Pokok Baru', 'required');
    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">','</div>');

    if ($this->form_validation->run() === FALSE){
      $data['user'] = $this->session->userdata['nama'];
      $data['title'] = 'Tambah KGB';
      $data['golongan'] = $this->m_golongan->get_golongan();
      $data['no_sk'] = $this->m_detil_kgb->show_last_kgb($nip);
      $data['nip'] = $nip;
      $data['no_surat']= $this->m_detil_kgb->generate_no_sk();
      $this->load->view('petugas/theme/header',$data);
      $this->load->view('petugas/v_create_kgb',$data);
      $this->load->view('petugas/theme/footer');
    }
    else
    {
      if($this->m_detil_kgb->insert_kgb($nip)){
        $id = $this->m_detil_kgb->get_last_id()->id;
        if($this->m_kgb->insert_kgb($nip, $id)){
          $this->session->set_flashdata('sukses','Data KGB berhasil dibuat.');
        }else{
          $this->session->set_flashdata('gagal','Data KGB gagal dibuat.');
        }
        redirect (base_url('kgb/riwayat/').$nip);
      }else{
        $this->session->set_flashdata('gagal','Data KGB gagal dibuat.');
      }
    }
  }

//-------------READ----------------

  function read($unit)
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['title'] = 'Petugas';
    $data['duk'] = $this->m_duk->show_duk($unit);
    $data['unit'] = $unit;
    $data['kantor'] = $this->m_unit->get_unit();
    $this->load->view('petugas/theme/header',$data);
    $this->load->view('petugas/v_read_kgb', $data);
    $this->load->view('petugas/theme/footer');
  }

  function riwayat($nip)
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['title'] = 'Petugas';
    $data['kgb'] = $this->m_detil_kgb->show_kgb($nip);
    $data['nip'] = $nip;
    $duk = $this->m_duk->show_duk_by_id($nip);
    $data['unit'] = $duk[0]->unit;
    $data['nama'] = $duk[0]->nama;
    $data['modal'] = '';
    if($data['kgb']){
      $data['cek_kgb'] = $this->cek_kgb($data['kgb'][0]->no_skp);
    }
    $this->load->view('petugas/theme/header',$data);
    $this->load->view('petugas/v_riwayat_kgb', $data);
    $this->load->view('petugas/theme/footer');
  }

  function read_kgb($nip, $id)
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['title'] = 'Petugas';
    $data['duk'] = $this->m_duk->show_duk_by_id($nip);
    $data['kgb'] = $this->m_detil_kgb->show_kgb_by_id($id);
    $data['surat'] = $this->m_format_surat->show();
    $data['nip'] = $nip;
    $this->load->view('petugas/theme/header',$data);
    $this->load->view('petugas/v_doc_kgb', $data);
    $this->load->view('petugas/theme/footer');
  }

  function read_jadwal_kgb(){
    $data['title'] = 'Petugas';
    $data['user'] = $this->session->userdata['nama'];
    $this->load->view('petugas/theme/header',$data);
    $this->load->view('petugas/v_jadwal_kgb', $data);
    $this->load->view('petugas/theme/footer');
  }

//--------------UPDATE---------------

  function upload_sk_kgb($id, $nip){
    //validasi
    $this->form_validation->set_rules(
      'no_sk_kgb','Nomor SK',
      'required|is_unique[detil_kgb.no_sk_kgb]|exact_length[14]',
      array('is_unique' => '%s sudah ada.')
    );
    if(!isset($_FILES['file_sk_kgb']) || $_FILES['file_sk_kgb']['error'] == UPLOAD_ERR_NO_FILE)
    {
      $this->form_validation->set_rules('file_sk_kgb','File','required');
    }
    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">','</div>');

    if ($this->form_validation->run() === FALSE){
      $data['user'] = $this->session->userdata['nama'];
      $data['title'] = 'Petugas';
      $data['kgb'] = $this->m_detil_kgb->show_kgb($nip);
      $data['nip'] = $nip;
      $duk = $this->m_duk->show_duk_by_id($nip);
      $data['unit'] = $duk[0]->unit;
      $data['nama'] = $duk[0]->nama;
      if($data['kgb']){
        $data['cek_kgb'] = $this->cek_kgb($data['kgb'][0]->no_skp);
      }
      $data['modal'] = "<script>
              $(window).on('load',function(){
                $('#uModal".$id."').modal('show');
              });
            </script>";
      $this->load->view('petugas/theme/header',$data);
      $this->load->view('petugas/v_riwayat_kgb', $data);
      $this->load->view('petugas/theme/footer');
    }else{
      $this->m_detil_kgb->upload_sk_kgb($id);
      redirect(base_url('kgb/riwayat/').$nip);
    }
  }

  //--------------AJAX------------------
  function getKGBdata($no){
    $data= $this->m_detil_kgb->show_kgb_by_id($no);
    $gol=$data[0]->golongan;
    $mk=$data[0]->tahun_mk;
    $data1= $this->m_gaji->get_gaji($gol, $mk);
    $data2 =array_merge($data, $data1);
    echo json_encode($data2);
  }

  function getKGBByMonth($month, $year){
    $data= $this->m_detil_kgb->show_kgb_by_month($month, $year);
    echo json_encode($data);
  }

  function get_golongan($gol, $mk){
    $data= $this->m_gaji->get_gaji($gol, $mk);
    echo json_encode($data);
  }

  function cek_kgb($no){
    $id= $this->m_detil_kgb->get_kgb_by_no_sk($no);
    return array('id' => $id->id);
  }

  function print_kgb($nip, $id){
    $data['user'] = $this->session->userdata['nama'];
    $data['duk'] = $this->m_duk->show_duk_by_id($nip);
    $data['kgb'] = $this->m_detil_kgb->show_kgb_by_id($id);
    $data['surat'] = $this->m_format_surat->show();
    $data['nama_file'] = $data['kgb'][0]->no_surat;
    $this->load->view('petugas/print', $data);
  }

}
?>
