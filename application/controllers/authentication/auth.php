<?php defined('BASEPATH') OR exit('No direct script access allowed');
//namespace authentication;

class Auth extends CI_Controller
{
  public function authentication() //cekakun
  {
    //membuat validasi Login
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $query = $this->m_users->cekAkun($username, $password);

    if($query === 1){
      return "User tidak ditemukan!";
    }elseif ($query === 2) {
      return "Username dan password yang Anda masukkan tidak cocok.<br />Silakan periksa dan coba lagi.";
    }else {
      //membuat session dengan nama userdata
      $userData = array(
        'username' => $query->username,
        'level' => $query->level,
        'logged_in' => TRUE,
        'nama' => $query->nama
      );
      $this->session->set_userdata($userData);
      return TRUE;
    }
  }

  public function authorization(){
  //  melakukan pengalihan halaman sesuai dengan levelnya
// $this->session->unset_userdata('level');
    if ($this->session->userdata('level') == 1){redirect('admin');}
    if ($this->session->userdata('level') == 2){redirect('petugas');}

    //proses login dan validasi
    if ($this->input->post('submit'))
    {
      $this->form_validation->set_rules('username','Username','required');
      $this->form_validation->set_rules('password','Password','required');
      $error = $this->authentication();
      if($this->form_validation->run() ===TRUE )
      {
        if($error === TRUE){

          $data = $this->m_users->cekAkun($this->input->post('username'), $this->input->post('password'));
          //jika bernilai TRUE maka alihkan halaman sesuai dengan level user
          if($data->level == 1){ //admin
            redirect('admin');
          }elseif ($data->level == 2) {
            redirect('petugas');
          }
        }else{
          $data['error'] = $error;
          $this->session->set_flashdata('login',$data['error']);
          $this->session->sess_destroy();
        }
      }
    }
    $this->load->view('authentication/v_login');
  }

  public function logout(){
    //Menghapus semua session
    $this->session->sess_destroy();
    redirect('login');
  }
}
