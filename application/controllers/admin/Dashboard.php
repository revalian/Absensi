<?php 

class Dashboard extends CI_Controller{

	
	
	public function index()
	{
		$data['title'] = "Dashboard";
		$pegawai = $this->db->query("SELECT * FROM data_pegawai");
		$admin = $this->db->query("SELECT * FROM data_pegawai WHERE seksi = 'Admin'");
		$jabatan = $this->db->query("SELECT * FROM data_jabatan");
		$kegiatan = $this->db->query("SELECT * FROM data_kegiatan");
		$data['pegawai'] = $pegawai->num_rows();
		$data['admin'] = $admin->num_rows();
		$data['jabatan'] = $jabatan->num_rows();
		$data['kegiatan'] = $kegiatan->num_rows();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}
		
}

?>