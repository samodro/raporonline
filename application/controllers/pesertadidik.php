<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesertadidik extends CI_Controller 
{

	public $id_pd;
	public $username;
	public $akses_level ; 
	public $kota_asal;

	public function __construct() 
	{
		
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pd');
		$this->load->model('m_pengguna');
		$this->load->model('m_sekolah');
		$this->load->model('m_ptk');
		$this->load->model('m_rombel');

		$this->id_pd = $this->session->userdata('ID_PENGGUNA');
		$this->kota_asal = $this->session->userdata('KODE_WILAYAH');
		$this->username = $this->session->userdata('USERNAME');
		$this->akses_level = $this->session->userdata('AKSES_LEVEL');
		
	}

	/*Dinas Pendidikan fitur*/
	public function DataPesertaDidik()
	{
		$data['daftar'] = $this->m_pd->getAll_DataSiswa();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataPesertaDidik', $data);
		$this->load->view('dispendik/footer');
	}

	public function hapusDataPesertaDidik($id_siswa) {
		$this->load->model('m_pd','',TRUE);
		$this->m_pd->hapusDataPesertaDidik($id_siswa);
		redirect('pesertadidik/DataPesertaDidik');
	}

	public function hapusPesertaDidik($id_siswa) {
		$this->load->model('m_pd','',TRUE);
		$this->m_pd->hapusDataPesertaDidik($id_siswa);
		redirect('ptk/LihatDataPesertaDidik');
	}

	public function tambahDataPesertaDidik() {
		$data['listSekolah'] = $this->m_sekolah->getListSekolah_byKota($this->kota_asal);
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataPesertaDidik_Add', $data);
		$this->load->view('dispendik/footer');
	}

	public function doInsert_PesertaDidik() {
		$this->load->model('m_pd','',TRUE);
			$data = array (
			'ID_SEKOLAH' => $this->input->post('id_sekolah'),
			'NIS_SISWA' => $this->input->post('nis_siswa'),
			'NISN_SISWA' => $this->input->post('nisn_siswa'),
			'NAMA_SISWA' => $this->input->post('nama_siswa'),
			'ALAMAT_SISWA' => $this->input->post('alamat_siswa'),
			'NOTELP_SISWA' => $this->input->post('notelp_siswa'),
			'JK_SISWA' => $this->input->post('jk_siswa'),
			'TMPT_LHR_SISWA' => $this->input->post('tmpt_lhr_siswa'),
			'TGL_LHR_SISWA' => $this->input->post('tgl_lhr_siswa'),
			'AGAMA_SISWA' => $this->input->post('agama_siswa'),
			'STATUS_DLM_KELUARGA' => $this->input->post('status_dlm_keluarga'),
			'ANAK_KE' => $this->input->post('anak_ke'),
			'DITERIMA_PD_KELAS' => $this->input->post('diterima_pd_kelas'),
			'DITERIMA_PD_TGL' => $this->input->post('diterima_pd_tgl'),
			'SEKOLAH_ASAL' => $this->input->post('sekolah_asal'),
			'FOTO_SISWA' => $this->input->post('foto_siswa')
		);
		$this->m_pd->doInsert_dataPesertaDidik($data);
		redirect('pesertadidik/DataPesertaDidik');
	}

	public function editDataPesertaDidik($id_siswa) {
		$data['listSekolah'] = $this->m_sekolah->getDaftarSekolah_byKota($this->kota_asal);
		$data['daftar'] = $this->m_pd->edit_DataPesertaDidik($id_siswa);
		$data['id_siswa'] = $id_siswa;
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataPesertaDidik_Edit',$data);
		$this->load->view('dispendik/footer');
	}

	public function doEdit_DataPesertaDidik() {
		$this->load->model('m_pd','',TRUE);
		$id_siswa = $this->input->post('id_siswa');
		$data = array (
				'ID_SEKOLAH' => $this->input->post('id_sekolah'),
			'NIS_SISWA' => $this->input->post('nis_siswa'),
			'NISN_SISWA' => $this->input->post('nisn_siswa'),
			'NAMA_SISWA' => $this->input->post('nama_siswa'),
			'ALAMAT_SISWA' => $this->input->post('alamat_siswa'),
			'NOTELP_SISWA' => $this->input->post('notelp_siswa'),
			'JK_SISWA' => $this->input->post('jk_siswa'),
			'TMPT_LHR_SISWA' => $this->input->post('tmpt_lhr_siswa'),
			'TGL_LHR_SISWA' => $this->input->post('tgl_lhr_siswa'),
			'AGAMA_SISWA' => $this->input->post('agama_siswa'),
			'STATUS_DLM_KELUARGA' => $this->input->post('status_dlm_keluarga'),
			'ANAK_KE' => $this->input->post('anak_ke'),
			'DITERIMA_PD_KELAS' => $this->input->post('diterima_pd_kelas'),
			'DITERIMA_PD_TGL' => $this->input->post('diterima_pd_tgl'),
			'SEKOLAH_ASAL' => $this->input->post('sekolah_asal'),
			'FOTO_SISWA' => $this->input->post('foto_siswa')
			);
		$this->m_pd->doEdit_DataPesertaDidik($id_siswa,$data);
		redirect('pesertadidik/DataPesertaDidik');
	}


	/*Peserta Didik fitur*/
	public function index() 
	{
		$this->load->view('siswa/headerSiswa');
		$this->load->view('siswa/menuSiswa');
		$data["siswa"]= $this->m_pd->get_data_diri_siswa($this->username);
				
		$this->load->view('siswa/berandaSiswa', $data);
		$this->load->view('siswa/footerSiswa');
	}	

	/*Pihak Sekolah fitur*/
	

	

	
	
}

