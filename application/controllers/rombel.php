<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rombel extends CI_Controller 
{

	public $id_ptk;
	public $username;
	public $akses_level ; 
	public $kota_asal;

	public function __construct() 
	{
		
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pengguna');
		$this->load->model('m_rombel');
		$this->load->model('m_kurikulum');
		$this->load->model('m_ptk');
		$this->load->model('m_mapel');
                $this->load->model('m_mengajar');

		$this->id_ptk = $this->session->userdata('ID_PENGGUNA');
		$this->kota_asal = $this->session->userdata('KODE_WILAYAH');
		$this->username = $this->session->userdata('USERNAME');
		$this->akses_level = $this->session->userdata('AKSES_LEVEL');
		
	}

	public function kelolaRombel($id_rombel=""){
		$id_sekolah= $this->m_ptk->getDataDiriKepsek($this->username);
		 if($id_rombel=="")
			{
				$selected['ID_ROMBEL'] =  $this->m_rombel->getIdRombel()[0]['id'];
				$selected['ID_SEKOLAH'] =  $id_sekolah['ID_SEKOLAH'];
				$selected['ID_TAHUN_AJAR'] = "" ;
				$selected['TINGKAT_PENDIDIKAN'] =  "";
				$selected['NAMA_ROMBEL'] =  "";
				$selected['ID_PTK'] =  "";
			}
			else
				$selected=$this->m_rombel->getDataRombel_ById($id_rombel);
			$data['selected']=$selected;
			$data['listRombel'] = $this->m_rombel->getAll_RombelByIdSekolah($id_sekolah['ID_SEKOLAH']);
		$this->load->view('ptk/header');
		$data['listTahunAjar'] = $this->m_kurikulum->getAll_tahunAjar();
		$data['listGuru'] = $this->m_ptk->getGuru_ByIdSekolah($id_sekolah['ID_SEKOLAH']);
		$this->load->view('ptk/menuPihakSekolah');
		$this->load->view('ptk/kelolaRombel', $data);
		$this->load->view('ptk/footer');
	}

	public function PengaturanTugasGuru($id_mengajar=""){
		$id_sekolah= $this->m_ptk->getDataDiriKepsek($this->username);

		 if($id_mengajar=="")
			{
				$selected['ID_MENGAJAR'] =  $this->m_rombel->getIdMengajar()[0]['id'];
				$selected['ID_ROMBEL'] =  "";
				$selected['KODE_MAPEL'] = "" ;
				$selected['ID_PTK'] =  "";
				$selected['KKM_NILAI'] =  "";
			}
			else
				$selected=$this->m_rombel->getDataMengajar_ById($id_mengajar);
			$data['selected']=$selected;
		$data['listRombel'] = $this->m_rombel->getAll_RombelByIdSekolah($id_sekolah['ID_SEKOLAH']);
		$data['listMapel'] = $this->m_mapel->getAll_mapel();
		$data['listGuru'] = $this->m_ptk->getGuru_ByIdSekolah($id_sekolah['ID_SEKOLAH']);
		$data['listMengajar'] = $this->m_rombel->getMengajar_ByIdSekolah($id_sekolah['ID_SEKOLAH']);
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuPihakSekolah');
		$this->load->view('ptk/PengaturanTugasGuru', $data);
		$this->load->view('ptk/footer');
	}

	public function hapusDataRombel($id_rombel) {
		$this->load->model('m_rombel','',TRUE);
		$this->m_rombel->doDelete_rombel($id_rombel);
		redirect('rombel/kelolaRombel');
	}

	public function tambahDataRombel() {
		$data=array(
		'ID_SEKOLAH' => $this->input->post('id_sekolah'),
		'ID_TAHUN_AJAR' => $this->input->post('id_tahun_ajar'),
		'TINGKAT_PENDIDIKAN' => $this->input->post('tingkat_pendidikan'),
		'NAMA_ROMBEL' => $this->input->post('nama_rombel'),
		'ID_PTK' => $this->input->post('id_ptk')
		);
		var_dump($data);
		$this->m_rombel->doInsert_rombel($data);
		echo "<script>alert('Kelas berhasil ditambah ! ')</script>";
		$this->index();
	}

	public function tambahDataMengajar() {
		$data=array(
		'ID_MENGAJAR' => $this->input->post('id_mengajar'),
		'ID_ROMBEL' => $this->input->post('id_rombel'),
		'KODE_MAPEL' => $this->input->post('kode_mapel'),
		'ID_PTK' => $this->input->post('id_ptk')
		);
		var_dump($data);
		$this->m_rombel->doInsert_DataMengajar($data);
		$this->index();
	}

	public function editDataRombel() {
		$this->load->model('m_rombel','',TRUE);
		$id_rombel = $this->input->post('id_rombel');
		$id_tahun_ajar =$this->input->post('id_tahun_ajar');
		$tingkat_pendidikan = $this->input->post('tingkat_pendidikan');
		$nama_rombel = $this->input->post('nama_rombel');
		$id_sekolah = $this->input->post('id_sekolah');
		$ID_PTK= $this->input->post('id_ptk');
		$data = array (
			'ID_SEKOLAH' => $this->input->post('id_sekolah'),
			'ID_TAHUN_AJAR' => $this->input->post('id_tahun_ajar'),
			'TINGKAT_PENDIDIKAN' => $this->input->post('tingkat_pendidikan'),
			'NAMA_ROMBEL' => $this->input->post('nama_rombel'),
			'ID_PTK' => $this->input->post('id_ptk')
		);
		$this->m_rombel->doEdit_rombel($data);
	}

	public function DataRombel(){
		$id_sekolah= $this->m_ptk->getDataDiriAdminSekolah($this->username);
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuAdmin');
		$data['listRombel'] = $this->m_rombel->getAll_RombelByIdSekolah($id_sekolah['ID_SEKOLAH']);
		$this->load->view('ptk/kelolaDataRombel', $data);
		$this->load->view('ptk/footer');
	}

	public function kelolaDataRombel(){
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuAdmin');
		$this->load->view('ptk/kelolaRombel_byAdmin');
		$this->load->view('ptk/footer');
	}

	/*Wali Kelas*/
	public function WaliKelas(){
		$this->load->view('ptk/header');
		$id_rombel= $this->m_rombel->getRombel_ByWaliKelas($this->username);
		
		$data['DaftarSiswa_WaliKelas'] = $this->m_rombel->getList_siswaKelas($id_rombel['ID_ROMBEL']);
                $data['guru'] = $this->m_ptk->getDataDiriWaliKelas($this->username);
                
                $data['mapel'] = $this->m_mengajar->getMapel($this->username);
                $this->load->view('ptk/menuWaliKelas', $data);
		$this->load->view('ptk/DaftarSiswa_WaliKelas', $data);
		$this->load->view('ptk/footer');
	}

	
	
}

