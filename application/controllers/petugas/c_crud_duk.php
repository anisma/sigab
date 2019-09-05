<?php

/**
 *
 */
class C_crud_duk extends CI_Controller
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

  function create($unit)
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['title'] = 'Tambah Pengguna';
    $data['kantor'] = $this->m_kantor->get_kantor($unit);
    $data['unit'] = $unit;
    $this->load->view('petugas/theme/header',$data);
    $this->load->view('petugas/v_create_duk',$data);
    $this->load->view('petugas/theme/footer');
  }

  function create_process($unit)
  {
    //validasi
    $data['user'] = $this->session->userdata['nama'];
    $this->form_validation->set_rules(
      'nip','NIP',
      'trim|required|exact_length[18]|numeric|is_unique[duk.nip]',
      array(
        'is_unique' => 'NIP %s sudah ada.'
    )
    );
    $this->form_validation->set_rules('nama','Nama','required|min_length[3]|max_length[50]');
    $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|min_length[3]|max_length[50]');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|min_length[3]|max_length[50]');
    $this->form_validation->set_rules('kantor', 'Kantor', 'required',
    array('required' => 'Pilih salah satu kantor', )
    );

    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">','</div>');

    if ($this->form_validation->run() === FALSE){
      $this->session->set_flashdata('gagal','Data pegawai gagal ditambahkan.');
      $data['title'] = 'Tambah Pengguna';
      $data['kantor'] = $this->m_kantor->get_kantor($unit);
      $data['unit'] = $unit;
      $this->load->view('petugas/theme/header',$data);
      $this->load->view('petugas/v_create_duk',$data);
      $this->load->view('petugas/theme/footer');
    }
    else
    {
      if($this->m_duk->insert_duk($unit)){
        $this->session->set_flashdata('sukses','Data pegawai berhasil ditambahkan.');
      }else{
        $this->session->set_flashdata('gagal','Data pegawai gagal ditambahkan.');
      }

      if ($unit==1) {
        redirect(base_url('disdikbudpora'));
      }elseif ($unit==2) {
        redirect(base_url('uptd'));
      }else {
        if ($unit==3) {
          redirect(base_url('sekolah'));
        }
      }
    }
  }


//-------------READ----------------

  function read($unit)
  {
    $data['title'] = 'Petugas';
    $data['user'] = $this->session->userdata['nama'];
    $data['duk'] = $this->m_duk->show_duk($unit,'duk');
    $data['unit'] = $unit;
    $data['kantor'] = $this->m_unit->get_unit();
    $this->load->view('petugas/theme/header',$data);
    $this->load->view('petugas/v_read_duk', $data);
    $this->load->view('petugas/theme/footer');
  }

//--------------UPDATE---------------

  function edit($nip, $unit)
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['duk'] = $this->m_duk->show_duk_by_id($nip);
    $data['kantor'] = $this->m_kantor->get_kantor($unit);
    $data['title'] = 'Ubah DUK';
    $this->load->view('petugas/theme/header',$data);
    $this->load->view('petugas/v_update_duk',$data);
    $this->load->view('petugas/theme/footer');
  }

  function update($nip, $unit)
  {
    //validasi
    $data['user'] = $this->session->userdata['nama'];
    $this->form_validation->set_rules('nama','Nama','required|min_length[3]|max_length[50]');
    $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|min_length[3]|max_length[50]');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|min_length[3]|max_length[50]');
    $this->form_validation->set_rules('kantor', 'Kantor', 'required',
    array('required' => 'Pilih salah satu kantor', )
    );

    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">','</div>');

    if ($this->form_validation->run() === FALSE){
      $data['user'] = $this->session->userdata['nama'];
      $data['duk'] = $this->m_duk->show_duk_by_id($nip);
      $data['kantor'] = $this->m_kantor->get_kantor($unit);
      $data['title'] = 'Ubah DUK';
      $this->load->view('petugas/theme/header',$data);
      $this->load->view('petugas/v_update_duk',$data);
      $this->load->view('petugas/theme/footer');
    }else{

      if($this->m_duk->update_duk($nip, $unit)){
        $this->session->set_flashdata('sukses','Data pegawai berhasil diubah.');
      }else{
        $this->session->set_flashdata('gagal','Data pegawai gagal diubah.');
      }
      if ($unit==1) {
        redirect(base_url('disdikbudpora'));
      }elseif ($unit==2) {
        redirect(base_url('uptd'));
      }else {
        if ($unit==3) {
          redirect(base_url('sekolah'));
        }
      }
    }
  }

//--------------DELETE------------------

  function delete($nip,$unit)
  {
    if($this->m_duk->delete_duk($nip,'duk')){
      $this->session->set_flashdata('sukses','Data pegawai berhasil dihapus.');
    }else{
      $this->session->set_flashdata('gagal','Data pegawai gagal dihapus.');
    }
    if ($unit==1) {
      redirect(base_url('disdikbudpora'));
    }elseif ($unit==2) {
      redirect(base_url('uptd'));
    }else {
      if ($unit==3){
        redirect(base_url('sekolah'));
      }
    }
  }
}
?>
