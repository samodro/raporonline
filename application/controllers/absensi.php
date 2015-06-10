<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absensi extends CI_Controller 
{

	public $id_p;
	public $username;
	public $akses_level ; 
	public $kota_asal;

	public function __construct() 
	{
		
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_absensi');
		$this->load->model('m_pengguna');
		$this->load->model('m_rombel');

		$this->id_ptk = $this->session->userdata('ID_PENGGUNA');
		$this->kota_asal = $this->session->userdata('KODE_WILAYAH');
		$this->username = $this->session->userdata('USERNAME');
		$this->akses_level = $this->session->userdata('AKSES_LEVEL');
		
	}

	public function index() 
	{
		
	}

	/*Dinas Pendidikan fitur*/
	public function DataMasterAbsensi_Rapor($id_absensi=""){
        if($id_absensi=="")
			{
				$selected['ID_ABSENSI'] =  $this->m_absensi->getIdAbsensi()[0]['id'];
				$selected['JENIS_ABSENSI'] =  "";
				$selected['KETERANGAN_ABSENSI'] =  "";
			}
			else
				$selected=$this->m_absensi->getDataAbsensi($id_absensi);
			$data['selected']=$selected;
			$data['jenisAbsensi'] = $this->m_absensi->getAll_DataAbsensi();
        $this->load->view('dispendik/header');
        $this->load->view('dispendik/sidebarDinas');
        $this->load->view('dispendik/DataAbsensiRapor', $data);
        $this->load->view('dispendik/footer');
    }

    public function tambahDataAbsensi() {
		$data=array(
		'JENIS_ABSENSI' => $this->input->post('jenis_absensi'),
		'KETERANGAN_ABSENSI' => $this->input->post('keterangan_absensi')
		);
		$this->m_absensi->doInsert_absensi($data);
		$this->index();
	}

	public function hapusDataAbsensi($id_absensi) {
		$this->load->model('m_absensi','',TRUE);
		$this->m_absensi->doDelete_absensi($id_absensi);
		redirect('absensi/DataMasterAbsensi_Rapor');
	}

	public function editDataAbsensi(){
		$this->load->model('m_absensi','',TRUE);
			$id_absensi = $this->input->post('id_absensi');
			$jenis_absensi =$this->input->post('jenis_absensi');
			$keterangan_absensi = $this->input->post('keterangan_absensi');
			$data = array (
				'JENIS_ABSENSI' => $this->input->post('jenis_absensi'),
				'KETERANGAN_ABSENSI' => $this->input->post('keterangan_absensi')
			);
			$this->m_absensi->doEdit_absensi($data);
	}
    /*wali kelas*/
    public function kehadiran_siswa(){
        $this->load->view('ptk/header');
       	$id_rombel= $this->m_rombel->getRombel_ByWaliKelas($this->username);
       	$data['jenisAbsensi'] = $this->m_absensi->getAll_DataAbsensi();
		$this->load->view('ptk/menuWaliKelas', $id_rombel);
		//$data['DaftarSiswa_WaliKelas'] = $this->m_rombel->getList_siswaKelas($id_rombel['ID_ROMBEL']);
        $this->load->view('ptk/kehadiran_siswa', $data);
        $this->load->view('ptk/footer');
    }

    public function tambahDataAbsensi_siswa($id_kehadiran) {
    	$this->load->model('m_absensi','',TRUE);
		$data=array(
		'ID_RIWAYAT' => $this->input->post('id_riwayat'),
		'ID_ABSENSI' => $this->input->post('id_absensi'),
		'JUMLAH' => $this->input->post('jumlah')
		);
		$this->m_absensi->doInsert_kehadiranSiswa($data, $anakRombel['ID_RIWAYAT']);
		redirect('absensi/kehadiran_siswa');
	}

	
}

