<?php 

class DataJabatan extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses' ) !='1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Anda belum Login!</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
				redirect('welcome');
			}
		}

	public function index()
	{
		$data['title'] = "Data Jabatan";
		$data['jabatan'] = $this->jabatanModel->get_data('data_jabatan')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataJabatan', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Jabatan";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataJabatan', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else {
			$nama			= $this->input->post('nama');
			$id_jabatan		= $this->input->post('id_jabatan');
			$golongan		= $this->input->post('golongan');

			$data = array(

				'nama' => $nama,
				'id_jabatan' => $id_jabatan,
				'golongan' => $golongan,
			);

			$this->jabatanModel->insert_data($data, 'data_jabatan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil ditambahkan!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/dataJabatan');
		}
	}

	public function updateData($id)
	{
		$where = array('id_pejabat' => $id);
		$data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan ='$id'")->result();
		$data['title'] = "Tambah Data Jabatan";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataJabatan', $data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		}else {
			$id_pejabat 	= $this->input->post('id_pejabat');
			$nama			= $this->input->post('nama');
			$id_jabatan		= $this->input->post('id_jabatan');
			$golongan		= $this->input->post('golongan');

			$data = array(

				'nama' 			=> $nama,
				'id_jabatan' 	=> $id_jabatan,
				'golongan' 		=> $golongan,
			);

			$where = array(
				'id_pejabat' => $id_pejabat
			);

			$this->jabatanModel->update_data('data_jabatan', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil diupdate!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/dataJabatan');
		}
	}


	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'required');
		$this->form_validation->set_rules('golongan', 'golongan', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_jabatan' => $id);
		$this->jabatanModel->delete_data($where, 'data_jabatan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data berhasil dihapus!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/dataJabatan');
	}
}

?>