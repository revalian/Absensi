<?php 

class ChangePassword extends CI_Controller {
	
	
	public function index()
	{
		$data['title'] = "Change Password";
		$this->load->view('templates_pegawai/header', $data);
		$this->load->view('templates_pegawai/sidebar');
		$this->load->view('pegawai/formChangePassword', $data);
		$this->load->view('templates_pegawai/footer');
	}

	public function changePasswordAksi()
	{
		$passBaru = $this->input->post('passBaru');
		$ulangPass = $this->input->post('ulangPass');


		$this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
		$this->form_validation->set_rules('ulangPass', 'ulangi password', 'required');

		if($this->form_validation->run() != FALSE) {
			$data = array('password' => md5($passBaru));
			$id = array('id_ta' => $this->session->userdata('id_ta'));
			$this->jabatanModel->update_data('data_pegawai', $data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Password berhasil diubah!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('welcome');
		}else{
			$data['title'] = "Change Password";
			$this->load->view('templates_pegawai/header', $data);
			$this->load->view('templates_pegawai/sidebar');
			$this->load->view('pegawai/formChangePassword', $data);
			$this->load->view('templates_pegawai/footer');
		}
	}
}

?>