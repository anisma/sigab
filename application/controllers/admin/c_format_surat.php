<?php

/**
 *
 */
class C_format_surat extends CI_Controller
{
  private $filename = "import_data";
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('level') != 1) {
        redirect('petugas');
      }
    } else {
      redirect('login');
    }


 }


//-------------READ----------------

  function read() //read_all
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['surat'] = $this->m_format_surat->show();
    $data['title'] = 'Admin';
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/v_read_format_surat', $data);
    $this->load->view('admin/theme/footer');
  }

//--------------UPDATE---------------

  function update()
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['surat'] = $this->m_format_surat->show();
    $data['title'] = 'Format Surat ';
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/v_update_format_surat',$data);
    $this->load->view('admin/theme/footer');
  }

  function update_process()
  {
    $this->form_validation->set_rules('nama_kadin','Nama','required');
    $this->form_validation->set_rules('pangkat_kadin','pangkat_kadin','required|min_length[3]|max_length[50]',
      array('required' => 'Pilih salah satu level')
    );
    $this->form_validation->set_rules('nip_kadin','NIP','required|min_length[3]|max_length[50]|numeric');
    $this->form_validation->set_rules('uu','Acuhan Gaji','required|min_length[3]|max_length[50]');
    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">','</div>');

    if ($this->form_validation->run() === FALSE)
    {
      $data['user'] = $this->session->userdata['nama'];
      $data['surat'] = $this->m_format_surat->show();
      $data['title'] = 'Format Surat ';
      $this->load->view('admin/theme/header',$data);
      $this->load->view('admin/v_update_format_surat',$data);
      $this->load->view('admin/theme/footer');
    }else{
      if($this->m_format_surat->update()){
        $this->session->set_flashdata('sukses','Format surat berhasil diubah.');
      }else{
        $this->session->set_flashdata('gagal','Format surat gagal diubah.');

      }
      redirect(base_url(format_surat));
    }
  }

}
?>
