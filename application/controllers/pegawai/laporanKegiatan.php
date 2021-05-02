<?php 

class LaporanKegiatan extends CI_Controller{

	public function index()
	{
		$data['title'] = "Laporan Kegiatan";

    	if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun'] !='')){
    		$bulan = $_GET['bulan'];
    		$tahun = $_GET['tahun'];
    		$bulantahun = $bulan.$tahun;
    	}else{
    		$bulan = date('m');
    		$tahun = date('Y');
    		$bulantahun = $bulan.$tahun;
    	}

		$data['kegiatan'] = $this->db->query("SELECT data_kegiatan.*, data_pegawai.nama_pegawai, data_pegawai.id_ta 
			FROM data_kegiatan
			INNER JOIN data_pegawai ON data_kegiatan.id_ta = data_pegawai.id_ta
			WHERE month(data_kegiatan.tanggal) = '$bulan' AND year(data_kegiatan.tanggal) = '$tahun'
			ORDER BY data_pegawai.nama_pegawai ASC")->result();

		$this->load->view('templates_pegawai/header', $data);
		$this->load->view('templates_pegawai/sidebar');
		$this->load->view('pegawai/dataLaporan', $data);
		$this->load->view('templates_pegawai/footer');
	}

	public function cetakKegiatan()
	{
		$data['title'] = "Cetak Data Kegiatan";
		$data['nama_pegawai'] = $this->session->userdata('nama_pegawai');
		$data['id_ta'] = $this->session->userdata('id_ta');
    	if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun'] !='')){
    		$bulan = $_GET['bulan'];
    		$tahun = $_GET['tahun'];
    		$bulantahun = $bulan.$tahun;
    	}else{
    		$bulan = date('m');
    		$tahun = date('Y');
    		$bulantahun = $bulan.$tahun;
    	}

		$data['kegiatan'] = $this->db->query("SELECT data_kegiatan.*, data_pegawai.nama_pegawai, data_pegawai.id_ta 
			FROM data_kegiatan
			INNER JOIN data_pegawai ON data_kegiatan.id_ta = data_pegawai.id_ta
			WHERE month(data_kegiatan.tanggal) = '$bulan' AND year(data_kegiatan.tanggal) = '$tahun'
			ORDER BY data_pegawai.nama_pegawai ASC")->result();

		$this->load->view('templates_pegawai/header', $data);
		$this->load->view('pegawai/cetakDataKegiatan', $data);
		
	}
}

 ?>