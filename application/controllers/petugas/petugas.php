<?php
class Petugas extends MY_Controller{

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('logged_in')) {
			if ($this->session->userdata('level') != 2) {
				redirect('admin');
			}
		} else {
			redirect('login');
		}
	}

	function dashboard(){
		$data['user'] = $this->session->userdata['nama'];
		$data['kgb']= $this->m_detil_kgb->show_kgb_by_month(date('m'),date("Y"));
		$data['count_duk']= $this->m_duk->count();
		$data['count_kgb']= $this->m_kgb->count();
		$data['count_jadwal']= $this->m_detil_kgb->count();
		$this->load->view('petugas/theme/header',$data);
		$this->load->view('petugas/v_dashboard',$data);
		$this->load->view('petugas/theme/footer');
	}
}
?>
