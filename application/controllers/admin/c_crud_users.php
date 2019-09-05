<?php

/**
 *
 */
class C_crud_users extends CI_Controller
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
    $data['title'] = 'Tambah Pengguna';
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/v_create_user');
    $this->load->view('admin/theme/footer');
  }

  function create_process()
  {
    //validasi
      $this->form_validation->set_rules(
        'uname','Username',
        'trim|required|min_length[6]|max_length[15]|is_unique[user.username]|alpha_numeric'
      );
      $this->form_validation->set_rules('nama','Nama','trim|min_length[3]|max_length[50]|required');
      $this->form_validation->set_rules('pass','Password','trim|min_length[6]|max_length[15]|required');
      $this->form_validation->set_rules('level','Level','required',
        array('required' => 'Pilih salah satu level')
      );
      $this->form_validation->set_error_delimiters('<div class="invalid-feedback">','</div>');

      if ($this->form_validation->run() === FALSE)
      {
        // die('salah');
        $this->session->set_flashdata('gagal','User gagal ditambahkan.');
        $data['user'] = $this->session->userdata['nama'];
        $data['title'] = 'Tambah Pengguna';
        $this->load->view('admin/theme/header',$data);
        $this->load->view('admin/v_create_user');
        $this->load->view('admin/theme/footer');
      }
      else
      {
        if($this->m_users->insert_user()){
          $this->session->set_flashdata('sukses','User berhasil ditambahkan.');
          redirect(base_url('user'));
        }else{
          $this->session->set_flashdata('gagal','User gagal ditambahkan.');
          redirect(base_url('user'));
        }
      }
  }

//-------------READ----------------

  function read() //read_all
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['users'] = $this->m_users->show_all_users();
    $data['title'] = 'Admin';
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/v_read_users', $data);
    $this->load->view('admin/theme/footer');
  }

//--------------UPDATE---------------

  function update($username) //read_by_user
  {
    $data['user'] = $this->session->userdata['nama'];
    $data['users'] = $this->m_users->show_user($username);
    $data['title'] = 'Ubah Pengguna';
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/v_update_user',$data);
    $this->load->view('admin/theme/footer');
  }

  function update_process($username)
  {
    $this->form_validation->set_rules('nama','Nama','trim|min_length[3]|max_length[50]|required');
    $this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[50]|required');
    $this->form_validation->set_rules('level','Level','required',
      array('required' => 'Pilih salah satu level')
    );
    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">','</div>');

    if ($this->form_validation->run() === FALSE)
    {
      // die('tetpt');
      $data['user'] = $this->session->userdata['nama'];
      $data['users'] = $this->m_users->show_user($username);
      $data['title'] = 'Ubah Pengguna';
      $this->load->view('admin/theme/header',$data);
      $this->load->view('admin/v_update_user',$data);
      $this->load->view('admin/theme/footer');
    }else{
      if($this->m_users->update_user()){
        $this->session->set_flashdata('sukses','User berhasil diubah.');
        redirect(user);
      }else{
        $this->session->set_flashdata('gagal','User gagal diubah.');
        redirect(user);
      }
    }
  }

//--------------DELETE------------------

  function delete($username)
  {
    if($this->m_users->delete_user($username)){
      $this->session->set_flashdata('sukses','User berhasil dihapus.');
      redirect(user);
    }else{
      $this->session->set_flashdata('gagal','User gagal dihapus.');
      redirect(user);
    }
  }
}
?>
