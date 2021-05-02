<?php 

class DataKegiatan extends CI_Controller{


	public function index() 
	{
		$data['title'] = "Data Kegiatan";
		$data['kegiatan'] = $this->jabatanModel->get_data('data_kegiatan')->result();
		$this->load->view('templates_pegawai/header', $data);
		$this->load->view('templates_pegawai/sidebar');
		$this->load->view('pegawai/dataKegiatan', $data);
		$this->load->view('templates_pegawai/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Input Kegiatan";
		$data['nama_pegawai'] = $this->session->userdata('nama_pegawai');
		$data['id_ta'] = $this->session->userdata('id_ta');
		$data['jabatan'] = $this->jabatanModel->get_data('data_kegiatan')->result();
		$this->load->view('templates_pegawai/header', $data);
		$this->load->view('templates_pegawai/sidebar');
		$this->load->view('pegawai/formInputData', $data);
		$this->load->view('templates_pegawai/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$id_ta			= $this->input->post('id_ta');
			// $id_pejabat		= $this->input->post('id_pejabat');
			$nama_pegawai	= $this->input->post('nama_pegawai');
			$jabatan		= $this->input->post('jabatan');
			$tanggal		= $this->input->post('tanggal');
			$keg			= $this->input->post('kegiatan');
			$foto_keg		= $_FILES['foto_keg']['name'];
			$keterangan		= $this->input->post('keterangan');
			if(empty($foto_keg)){}else{
				$config ['upload_path']		= './assets/photo';
				$config ['allowed_types']	= 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('foto_keg')){
					echo "Photo gagal diupload!";
					$error = array('error' => $this->upload->display_errors());
					
				}else{
					$foto_keg = $this->upload->data('file_name');
				}
			}

			$data = array(
				'id_ta'		    => $id_ta,
				// 'id_pejabat'	=> $id_pejabat,
				'nama_pegawai'	=> $nama_pegawai,
				'jabatan'		=> $jabatan,
				'tanggal'		=> $tanggal,
				'keg'			=> $keg,
				'foto_keg'		=> $foto_keg,
				'keterangan'	=> $keterangan,
			);
			// echo json_encode($data);
			$this->jabatanModel->insert_data($data, 'data_kegiatan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil ditambahkan!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('pegawai/dataKegiatan');
		}
	}

	public function updateData($id)
	{
		$where = array('id_tr' => $id);
		$data['title'] = "Update Data Kegiatan";
		$data['nama_pegawai'] = $this->session->userdata('nama_pegawai');
		$data['id_ta'] = $this->session->userdata('id_ta');
		$data['kegiatan'] = $this->jabatanModel->get_data_per_id('data_kegiatan',$where)->row();
		$this->load->view('templates_pegawai/header', $data);
		$this->load->view('templates_pegawai/sidebar');
		$this->load->view('pegawai/formUpdateKegiatan', $data);
		$this->load->view('templates_pegawai/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();
		$id				= $this->input->post('id_tr');
		if($this->form_validation->run() == FALSE) {			
			echo "salah";
		}else{ 
			
			$id_ta			= $this->input->post('id_ta');
			// $id_pejabat		= $this->input->post('id_pejabat');
			$nama_pegawai	= $this->input->post('nama_pegawai');
			$jabatan		= $this->input->post('jabatan');
			$tanggal		= $this->input->post('tanggal');
			$keg			= $this->input->post('kegiatan');
			$foto_keg_lama  = $this->input->post('foto_keg_lama');
			$foto_keg		= $_FILES['foto_keg']['name'];
			$keterangan		= $this->input->post('keterangan');

			if(empty($foto_keg)){
				$foto_keg = $foto_keg_lama;
			}else{
				$config ['upload_path']		= './assets/photo';
				$config ['allowed_types']	= 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('foto_keg')){
					echo "Photo gagal diupload!";
					$error = array('error' => $this->upload->display_errors());
				}else{
					$foto_keg = $this->upload->data('file_name');
				}
				unlink('./assets/photo/'.$foto_keg_lama);
			}

			$data = array(
				'id_ta'		    => $id_ta,
				// 'id_pejabat'	=> $id_pejabat,
				'nama_pegawai'	=> $nama_pegawai,
				'jabatan'		=> $jabatan,
				'tanggal'		=> $tanggal,
				'keg'			=> $keg,
				'foto_keg'		=> $foto_keg,
				'keterangan'	=> $keterangan,
			);			

			$where = array(
				'id_tr'  => $id
			);

			$this->jabatanModel->update_data('data_kegiatan', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil diupdate!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('pegawai/dataKegiatan');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_ta', 'Id TA', 'required');
		// $this->form_validation->set_rules('id_pejabat', 'Id Pejabat', 'required');
		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required');
		// $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
		// $this->form_validation->set_rules('foto_keg', 'Foto Kegiatan', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_tr' => $id);
		$this->jabatanModel->delete_data($where, 'data_kegiatan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data berhasil dihapus!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('pegawai/dataKegiatan');
	}
}

?>
