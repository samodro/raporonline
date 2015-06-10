<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_sekolah');
		$this->load->model('m_wilayah');
	}

	public function index() {
	}

	/* DINAS PENDIDIKAN */
	public function DataSekolah(){
		$this->load->model('m_sekolah');
		$data['daftar'] = $this->m_sekolah->getAll_DataSekolah();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataSekolah', $data);
		$this->load->view('dispendik/footer');
	}

	public function editDataSekolah($id_sekolah) {
		$data['listWilayah'] = $this->m_wilayah->getDaftarKecamatan();
		$data['daftar'] = $this->m_sekolah->edit_DataSekolah($id_sekolah);
		$data['id_sekolah'] = $id_sekolah;
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataSekolah_Edit',$data);
		$this->load->view('dispendik/footer');
	}

	public function doEdit_DataSekolah() {
		$this->load->model('m_sekolah','',TRUE);
		$id_sekolah = $this->input->post('id_sekolah');
		$data = array (
				'KODE_WILAYAH' => $this->input->post('kode_wilayah'),
				'NSS_SEKOLAH' => $this->input->post('nss'),
				'NPSN_SEKOLAH' => $this->input->post('npsn_sekolah'),
				'NAMA_SEKOLAH' => $this->input->post('nama_sekolah'),
				'ALAMAT_SEKOLAH' => $this->input->post('alamat_sekolah'),
				'NOTELP_SEKOLAH' => $this->input->post('notelp_sekolah')
			);
		$this->m_sekolah->doEdit_DataSekolah($id_sekolah,$data);
		redirect('sekolah/DataSekolah');
	}

	public function tambahDataSekolah() {
		$data['listWilayah'] = $this->m_wilayah->getKecamatanList();
		//$this->load->model('m_sekolah','',TRUE);
        //$this->m_sekolah->doInsert_dataSekolah();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataSekolah_Add', $data);
		$this->load->view('dispendik/footer');
	}

	public function doInsert_DataSekolah() {
		$this->load->model('m_sekolah','',TRUE);
			$data = array (
			'KODE_WILAYAH' => $this->input->post('kode_wilayah'),
			'NSS_SEKOLAH' => $this->input->post('nss_sekolah'),
			'NPSN_SEKOLAH' => $this->input->post('npsn_sekolah'),
			'NAMA_SEKOLAH' => $this->input->post('nama_sekolah'),
			'ALAMAT_SEKOLAH' => $this->input->post('alamat_sekolah'),
			'NOTELP_SEKOLAH' => $this->input->post('notelp_sekolah')
		);
		$this->m_sekolah->doInsert_dataSekolah($data);
		redirect('sekolah/DataSekolah');
	}

	public function hapusDataSekolah($id_sekolah) {
		$this->load->model('m_sekolah','',TRUE);
		$this->m_sekolah->hapusDataSekolah($id_sekolah);
		redirect('sekolah/DataSekolah');
	}
		
}

