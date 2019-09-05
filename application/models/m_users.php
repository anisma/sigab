<?php

/**
 *
 */
class M_users extends CI_Model
{
  var $username = '';
  var $nama = '';
  var $password ='';
  var $level = '';

  function __construct()
   {
       parent::__construct();
   }

   public function cekAkun($username, $password)
   {
     //cari username lalu lakukan validasi
     $this->db->where('username', $username);
     $result = $this->db->get('user')->row();

     //jika bernilai 1 maka user tidak ditemukan
     if (!$result) return 1;

     //jika bernilai 2 maka password salah
     $hash = $result->password;
     if (md5($password) != $hash) return 2;

     return $result;
   }

  function show_all_users()
  {
    $query = $this->db->get('user');
    return $query->result();
  }

  function insert_user()
  {
    $this->username = $this->input->post('uname');
    $this->nama = ucwords($this->input->post('nama'));
    $this->password = md5($this->input->post('pass'));
    $this->level = $this->input->post('level');

    if($this->db->insert('user',$this)){
      return true;
    }else{
      return false;
    }
  }

  function show_user($username)
  {
    $query = $this->db->get_where('user',array('username' => $username));
    return $query->result();
  }

  function update_user()
  {
    $this->username = $this->input->post('username');
    $this->nama = ucwords($this->input->post('nama'));
    $this->password = md5($this->input->post('password'));
    $this->level = $this->input->post('level');
    $this->db->where('username',$this->username);

    if($this->db->update('user',$this)){
      return true;
    }else{
      return false;
    }
  }

  function delete_user($username)
  {
    $this->db->where('username',$username);
    if($this->db->delete('user')){
      return true;
    }else{
      return false;
    }
  }
}
?>
