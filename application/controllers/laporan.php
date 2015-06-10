<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller 
{

	public $id_ptk;
	public $username;
	public $akses_level ; 
	public $kota_asal;

	public function __construct() 
	{
		
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_ptk');
		$this->load->model('m_pengguna');
		$this->load->model('m_pd');
		$this->load->model('m_sekolah');

		$this->id_ptk = $this->session->userdata('ID_PENGGUNA');
		$this->kota_asal = $this->session->userdata('KODE_WILAYAH');
		$this->username = $this->session->userdata('USERNAME');
		$this->akses_level = $this->session->userdata('AKSES_LEVEL');
		
	}

	public function index(){
		$this->load->view('lembar_hal1');
		$this->load->view('lembar_hal2_2006');
		$this->load->view('lembar_hal3');
	}

	public function print_rapor_sisipan_2006(){
		$this->load->view('view_rapor_2006_GANJIL');
	}

	public function halaman_depan_2006(){
		$this->load->view('lembar_hal1');
		$this->load->view('lembar_hal2_2006');
		$this->load->view('lembar_hal3');
	}
}

