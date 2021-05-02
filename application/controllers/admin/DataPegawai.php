<?php 

class DataPegawai extends CI_Controller{
		
	public function index()
	{
		$data['title'] = "Data Pegawai";
		$data['pegawai'] = $this->jabatanModel->get_data('data_pegawai')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataPegawai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Pegawai";
		$data['jabatan'] = $this->jabatanModel->get_data('data_pegawai')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formTambahPegawai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$nama_pegawai 		= $this->input->post('nama_pegawai'); 
			$jenis_kelamin 		= $this->input->post('jenis_kelamin');
			$seksi 				= $this->input->post('seksi');
			$tugas 				= $this->input->post('tugas');
			$tmt 				= $this->input->post('tmt');
			$jabatan			= $this->input->post('jabatan');
			$no_hp				= $this->input->post('no_hp');
			$pendidikan 		= $this->input->post('pendidikan');
			$jurusan			= $this->input->post('jurusan');
			$hak_akses			= $this->input->post('hak_akses');
			$username			= $this->input->post('username');
			$password			= md5($this->input->post('password'));
			$photo		 		= $_FILES['photo']['name'];
			if($photo=''){}else{
				$config ['upload_path'] 	= './assets/photo';
				$config ['allowed_types']	= 'jpg|jpeg|png|tiff';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('photo')){
					echo "Photo gagal diupload!";
				}else{
					$photo=$this->upload->data('file_name');
				}
			}

			$data = array(
				'nama_pegawai'			=> $nama_pegawai,
				'jenis_kelamin'			=> $jenis_kelamin,
				'seksi'					=> $seksi,
				'tugas'					=> $tugas,
				'tmt'					=> $tmt,
				'jabatan'				=> $jabatan,
				'no_hp'					=> $no_hp,
				'pendidikan'			=> $pendidikan,
				'jurusan'				=> $jurusan,
				'hak_akses'				=> $hak_akses,
				'username'				=> $username,
				'password'				=> $password,
				'photo'					=> $photo,
			);

			$this->jabatanModel->insert_data($data, 'data_pegawai');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil ditambahkan!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/dataPegawai');
		}
	}

	public function updateData($id)
	{
		$where = array('id_ta' => $id);
		$data['title'] = 'Update Data Pegawai';
		$data['jabatan'] = $this->jabatanModel->get_data('data_jabatan')->result();
		$data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_ta='$id'")->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formUpdatePegawai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		}else{ 
			$id			   		= $this->input->post('id_ta'); 
			$nama_pegawai 		= $this->input->post('nama_pegawai'); 
			$jenis_kelamin 		= $this->input->post('jenis_kelamin');
			$seksi 				= $this->input->post('seksi');
			$tugas 				= $this->input->post('tugas');
			$tmt 				= $this->input->post('tmt');
			$jabatan 			= $this->input->post('jabatan');
			$no_hp				= $this->input->post('no_hp');
			$pendidikan 		= $this->input->post('pendidikan');
			$jurusan			= $this->input->post('jurusan');
			$hak_akses			= $this->input->post('hak_akses');
			$username			= $this->input->post('username');
			$password			= md5($this->input->post('password'));
			$photo		 		= $_FILES['photo']['name'];
			if($photo){
				$config ['upload_path'] 	= './assets/photo';
				$config ['allowed_types']	= 'jpg|jpeg|png|tiff';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('photo')){
					$photo=$this->upload->data('file_name');
					$this->db->set('photo', $photo);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'nama_pegawai'			=> $nama_pegawai,
				'jenis_kelamin'			=> $jenis_kelamin,
				'seksi'					=> $seksi,
				'tugas'					=> $tugas,
				'tmt'					=> $tmt,
				'jabatan'				=> $jabatan,
				'no_hp'					=> $no_hp,
				'pendidikan'			=> $pendidikan,
				'jurusan'				=> $jurusan,
				'hak_akses'				=> $hak_akses,
				'username'				=> $username,
				'password'				=> $password,
				'photo'					=> $photo,
			);

			$where = array(
				'id_ta'  				=> $id
			);

			$this->jabatanModel->update_data('data_pegawai', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil diupdate!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/dataPegawai');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('seksi', 'Seksi', 'required');
		$this->form_validation->set_rules('tugas', 'Tugas', 'required');
		$this->form_validation->set_rules('tmt', 'TMT', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_ta' => $id);
		$this->jabatanModel->delete_data($where, 'data_pegawai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data berhasil dihapus!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/dataPegawai');
	}
}


 ?>	