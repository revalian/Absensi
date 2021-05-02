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