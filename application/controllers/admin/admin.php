<?php
class Admin extends MY_Controller
{
	public function __construct()
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

public function index()
	{
	}

	function dashboard(){
		$data['user'] = $this->session->userdata['nama'];
		$this->load->view('admin/theme/header',$data);
		$this->load->view('admin/v_dashboard');
		$this->load->view('admin/theme/footer');
	}
}
?>
