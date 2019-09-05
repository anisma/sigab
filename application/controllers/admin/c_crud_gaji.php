<?php

/**
 *
 */
class C_crud_gaji extends CI_Controller
{
  private $filename = "import_data";
  function __construct()
  {
    parent::__construct();
    require_once APPPATH.'third_party/PHPExcel.php';
    $this->excel = new PHPExcel();

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
    $data['gaji'] = $this->m_gaji->show_gaji();
    $data['title'] = 'Admin';
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/v_read_gaji', $data);
    $this->load->view('admin/theme/footer');
  }

  function delete_all()
  {
    if($this->m_gaji->delete_all()){
      $this->session->set_flashdata('sukses','Semua data berhasil dihapus.');
      redirect(gaji);
    }else{
      $this->session->set_flashdata('gagal','Semua data gagal dihapus.');
      redirect(gaji);
    }

  }

//---------------IMPORT DATA-----------
public function import(){
  $data =array();
  if(isset($_POST['upload_file'])){
    $upload = $this->m_gaji->upload_file($this->filename);

    if($upload['result'] == "success"){
      $excelreader = new PHPExcel_Reader_Excel2007();
      $loadexcel = $excelreader->load('./upload/excel/'.$this->filename.'.xlsx');
      $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

      $numrow = 1;

      $data=[];
      foreach($sheet as $row){
        if($numrow > 1){
          array_push($data, [
            'id'=>$row['A'], // Insert data id dari kolom A di excel
            'golongan'=>$row['B'], // Insert data golongan dari kolom B di excel
            'masa_kerja'=>$row['C'], // Insert data masa kerja dari kolom C di excel
            'gaji_pokok'=>$row['D'] // Insert data gaji pokok dari kolom D di excel
          ]);
        }

        $numrow++;
      }
      $this->m_gaji->insert_multiple($data);
      $this->session->set_flashdata('sukses','File berhasil diupload.');
      redirect(gaji);

    }else{ // Jika proses upload gagal
      redirect(gaji);
    }
  }
  }

}
?>
