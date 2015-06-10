<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prestasi extends CI_Controller 
{

	public $id_ptk;
	public $username;
	public $akses_level ; 
	public $kota_asal;

	public function __construct() 
	{
		
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_prestasi');
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
	public function DataJenisPrestasi_Rapor($id_prestasi=""){
        if($id_prestasi=="")
			{
				$selected['ID_PRESTASI'] =  $this->m_prestasi->getIdPrestasi()[0]['id'];
				$selected['JENIS_PRESTASI'] =  "";
			}
			else
				$selected=$this->m_prestasi->getDataJenisPrestasi($id_prestasi);
			$data['selected']=$selected;
			$data['jenisPrestasi'] = $this->m_prestasi->getAll_DataPrestasi();
        $this->load->view('dispendik/header');
        $this->load->view('dispendik/sidebarDinas');
        $this->load->view('dispendik/DataJenisPrestasi_Rapor', $data);
        $this->load->view('dispendik/footer');
    }

    public function editJenisPrestasi(){
		$this->load->model('m_prestasi','',TRUE);
			$id_prestasi = $this->input->post('id_prestasi');
			$jenis_prestasi =$this->input->post('jenis_prestasi');
			$data = array (
				'JENIS_PRESTASI' => $this->input->post('jenis_prestasi')
			);
			$this->m_prestasi->doEdit_jenisPrestasi($data);
	}

	 public function tambahDataJenisPrestasi() {
		$data=array(
		'JENIS_PRESTASI' => $this->input->post('jenis_prestasi')
		);
		$this->m_prestasi->doInsert_jenisPrestasi($data);
		$this->index();
	}

	public function hapusDataJenisPrestasi($id_prestasi) {
		$this->load->model('m_prestasi','',TRUE);
		$this->m_prestasi->doDelete_jenisPrestasi($id_prestasi);
		redirect('prestasi/DataJenisPrestasi_Rapor');
	}


	
}

