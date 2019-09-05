<?php

/**
 *
 */
class C_crud_kantor extends CI_Controller
{

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

//-----------CREATE-----------------

  function create()
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['title'] = 'Tambah Kantor';
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/v_create_kantor');
    $this->load->view('admin/theme/footer');
  }

  function create_process()
  {
    //validasi
      $this->form_validation->set_rules(
        'kantor','Nama Kantor',
        'trim|required|min_length[6]|max_length[50]|is_unique[kantor.nama_kantor]'
      );
      $this->form_validation->set_rules('unit','Unit','required',
        array('required' => 'Pilih salah satu level')
      );
      $this->form_validation->set_error_delimiters('<div class="invalid-feedback">','</div>');

      if ($this->form_validation->run() === FALSE)
      {
        // die('salah');
        $this->session->set_flashdata('gagal','Kantor gagal ditambahkan.');
        $data['user'] = $this->session->userdata['nama'];
        $data['title'] = 'Tambah Kantor';
        $this->load->view('admin/theme/header',$data);
        $this->load->view('admin/v_create_kantor');
        $this->load->view('admin/theme/footer');
      }
      else
      {
        if($this->m_kantor->insert_kantor()){
          $this->session->set_flashdata('sukses','Kantor berhasil ditambahkan.');
          redirect(base_url('kantor'));
        }else{
          $this->session->set_flashdata('gagal','Kantor gagal ditambahkan.');
          redirect(base_url('kantor'));
        }
      }
  }

//-------------READ----------------

  function read() //read_all
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['kantor'] = $this->m_kantor->show_all_kantor();
    $data['title'] = 'Admin - Kelola Kantor';
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/v_read_kantor', $data);
    $this->load->view('admin/theme/footer');
  }

//--------------UPDATE---------------

  function update($id) //read_by_user
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['kantor'] = $this->m_kantor->show_kantor($id);
    $data['title'] = 'Ubah Pengguna';
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/v_update_kantor',$data);
    $this->load->view('admin/theme/footer');
  }

  function update_process($id)
  {
    $this->form_validation->set_rules(
      'kantor','Nama Kantor',
      'trim|required|min_length[6]|max_length[50]'
    );
    $this->form_validation->set_rules('unit','Unit','required',
      array('required' => 'Pilih salah satu level')
    );
    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">','</div>');

    if ($this->form_validation->run() === FALSE)
    {
      // die('tetpt');
      $data['user'] = $this->session->userdata['nama'];
      $data['kantor'] = $this->m_kantor->show_kantor($id);
      $data['title'] = 'Ubah Pengguna';
      $this->load->view('admin/theme/header',$data);
      $this->load->view('admin/v_update_kantor',$data);
      $this->load->view('admin/theme/footer');
    }else{
      if($this->m_kantor->update_kantor($id)){
        $this->session->set_flashdata('sukses','Kantor berhasil diubah.');
        redirect(kantor);
      }else{
        $this->session->set_flashdata('gagal','Kantor gagal diubah.');
        redirect(kantor);
      }
    }
  }

//--------------DELETE------------------

  function delete($id)
  {
    if($this->m_kantor->delete_kantor($id)){
      $this->session->set_flashdata('sukses','Kantor berhasil dihapus.');
      redirect(kantor);
    }else{
      $this->session->set_flashdata('gagal','kantor gagal dihapus.');
      redirect(kantor);
    }
  }
}
?>
