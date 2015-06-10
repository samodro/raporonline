<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orangtuasiswa extends CI_Controller 
{

	public $id_pd;
	public $username;
	public $akses_level ; 

	public function __construct() 
	{
		
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pd');
		$this->load->model('m_pengguna');

		$this->id_pd = $this->session->userdata('ID_PENGGUNA');
		$this->username = $this->session->userdata('USERNAME');
		$this->akses_level = $this->session->userdata('AKSES_LEVEL');
		
	}

	/*Peserta Didik fitur*/
	public function index() 
	{
		$this->load->view('siswa/headerSiswa');
		$this->load->view('siswa/menuSiswa');
		$dataSiswa= $this->m_pd->get_data_diri_siswa($this->username);
				
		$this->load->view('siswa/berandaSiswa', $dataSiswa);
		$this->load->view('siswa/footerSiswa');
	}

	
	/*Dinas Pendidikan fitur*/
	public function DataOrangTua()
	{
		$this->load->model('m_ortu');
		$data['judul'] = 'Daftar Peserta Didik';
		$data['daftar'] = $this->m_ortu->getAll_ortu();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/DataOrangTua', $data);
		$this->load->view('dispendik/footer');
	}

	
}

