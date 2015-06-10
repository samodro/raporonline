<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ptk extends CI_Controller 
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
                $this->load->model('m_mengajar');
                $this->load->model('m_rombel');

                    
		$this->id_ptk = $this->session->userdata('ID_PENGGUNA');
		$this->kota_asal = $this->session->userdata('KODE_WILAYAH');
		$this->username = $this->session->userdata('USERNAME');
		$this->akses_level = $this->session->userdata('AKSES_LEVEL');
		
	}

	public function berandaGuru(){
		$this->load->view('ptk/header');
		
		
                
                $data['guru'] = $this->m_ptk->getDataDiriGuru($this->username);
                $data['mapel'] = $this->m_mengajar->getMapel($this->username);
               
                $this->load->view('ptk/menuguru',$data);
		$this->load->view('ptk/berandaGuru', $data);
		$this->load->view('ptk/footer');
	}

	public function berandaWaliKelas(){
		$this->load->view('ptk/header');
                
                $data = array();
                
		$data['guru'] = $this->m_ptk->getDataDiriWaliKelas($this->username);
                $data['mapel'] = $this->m_mengajar->getMapel($this->username);
                
		$this->load->view('ptk/menuWaliKelas', $data);
		$this->load->view('ptk/berandaGuru' , $data);
		$this->load->view('ptk/footer');
	}

	public function berandaAdminSekolah(){
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuAdmin');
		$dataPTK= $this->m_ptk->getDataDiriAdminSekolah($this->username);
		$this->load->view('ptk/berandaPihakSekolah' , $dataPTK);
		$this->load->view('ptk/footer');
	}
	
	public function berandaKepalaSekolah(){
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuPihakSekolah');
		$dataPTK= $this->m_ptk->getDataDiriKepsek($this->username);
        $this->load->view('ptk/berandaPihakSekolah', $dataPTK);
		$this->load->view('ptk/footer');
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
	public function DataPTK()
	{
		$data['daftarPTK'] = $this->m_ptk->getAll_ptk();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataPTK', $data);
		$this->load->view('dispendik/footer');
	}

	public function tambahDataPTK(){
		$data['listSekolah'] = $this->m_sekolah->getListSekolah_byKota($this->kota_asal);
		$data['daftarPTK'] = $this->m_ptk->getAll_ptk();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataPTK_Add', $data);
		$this->load->view('dispendik/footer');
	}

	public function doInsert_PTK() {
		$this->load->model('m_ptk','',TRUE);
			$data = array (
			'AGAMA_PTK' => $this->input->post('agama_ptk'),
			'ALAMAT_PTK' => $this->input->post('alamat_ptk'),
			'FOTO_PTK' => $this->input->post('foto_ptk'),
			'ID_SEKOLAH' => $this->input->post('id_sekolah'),
			'IS_FUNGSIONAL' => $this->input->post('is_fungsional'),
			'JK_PTK' => $this->input->post('jk_ptk'),
			'NAMA_PTK' => $this->input->post('nama_ptk'),
			'NIK_PTK' => $this->input->post('nik_ptk'),
			'NIP_PTK' => $this->input->post('nip_ptk'),
			'NOTELP_PTK' => $this->input->post('notelp_ptk'),
			'NUPTK_PTK' => $this->input->post('nuptk_ptk'),
			'TGL_LHR_PTK' => $this->input->post('tgl_lhr_ptk'),
			'TMPT_LHR_PTK' => $this->input->post('tmpt_lhr_ptk')
		);
			$data2 = array (
			'KODE_WILAYAH' => $this->input->post('agama_ptk'),
			'USERNAME' => $this->input->post('username'),
			'AKSES_LEVEL' => $this->input->post('akses_level'),
			'PASSWORD' => $this->input->post('password')
		);
		$this->m_ptk->doInsert_PTK($data);
		$this->m_pengguna->doInsert_PTK($data2);
		redirect('ptk/DataPTK');
	}

	public function doInsert_PTK_ByAdminSekolah() {
		$kode_wilayah = $this->kota_asal;
		$id_sekolah = $this->m_ptk->getDataDiriAdminSekolah($this->username);
		if($this->input->post('is_fungsional') == 'guru mata pelajaran' || 'wali kelas'){
			$is_fungsional = 'Guru';
			$password = 'rapor123456';
			if($this->input->post('nip_ptk') != null){
				$username_pengguna = $this->input->post('nip_ptk');
			}
			else{
				$username_pengguna = $this->input->post('nuptk_ptk');
			}
		}
		elseif ($this->input->post('is_fungsional') == 'administrasi sekolah') {
			$is_fungsional = 'Staf Tata Usaha';
			$password = 'rapor78910';
			$username_pengguna = $this->input->post('nuptk_ptk');
		}
		else{
			$is_fungsional = 'Kepala Sekolah';
			$password = 'rapor987654';
			$username_pengguna = $this->input->post('nip_ptk');
		}
			 
		$this->load->model('m_ptk','',TRUE);
			$data = array (
			'AGAMA_PTK' => $this->input->post('agama_ptk'),
			'ALAMAT_PTK' => $this->input->post('alamat_ptk'),
			'FOTO_PTK' => $this->input->post('foto_ptk'),
			'ID_SEKOLAH' => $id_sekolah['ID_SEKOLAH'],
			'IS_FUNGSIONAL' => $is_fungsional,
			'JK_PTK' => $this->input->post('jk_ptk'),
			'NAMA_PTK' => $this->input->post('nama_ptk'),
			'NIK_PTK' => $this->input->post('nik_ptk'),
			'NIP_PTK' => $this->input->post('nip_ptk'),
			'NOTELP_PTK' => $this->input->post('notelp_ptk'),
			'NUPTK_PTK' => $this->input->post('nuptk_ptk'),
			'TGL_LHR_PTK' => $this->input->post('tgl_lhr_ptk'),
			'TMPT_LHR_PTK' => $this->input->post('tmpt_lhr_ptk')
		);
			
		$data2 = array (
			'KODE_WILAYAH' => $kode_wilayah,
			'USERNAME' => $username_pengguna,
			'AKSES_LEVEL' => $this->input->post('is_fungsional'),
			'PASSWORD' => $password
		);
		$this->m_ptk->doInsert_PTK($data);
		$this->m_pengguna->doInsert_pengguna($data2);
		redirect('ptk/LihatDataPTK');
	}

	public function hapusDataPTK($id_ptk) {
		$this->load->model('m_ptk','',TRUE);
		$this->m_ptk->hapusDataPTK($id_ptk);
		redirect('ptk/DataPTK');
	}

	public function hapusDataPTK_byAdmin($id_ptk) {
		$this->load->model('m_ptk','',TRUE);
		$this->m_ptk->hapusDataPTK($id_ptk);
		redirect('ptk/LihatDataPTK');
	}

	public function editDataPTK($id_ptk) {
		$data['listSekolah'] = $this->m_sekolah->getDaftarSekolah_byKota($this->kota_asal);
		$data['daftar'] = $this->m_ptk->editDataPTK($id_ptk);
		$data['id_ptk'] = $id_ptk;
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataPTK_Edit',$data);
		$this->load->view('dispendik/footer');
	}

	public function editDataPTK_byAdmin($id_ptk) {
		$data['listSekolah'] = $this->m_sekolah->getDaftarSekolah_byKota($this->kota_asal);
		$data['daftar'] = $this->m_ptk->editDataPTK($id_ptk);
		$data['id_ptk'] = $id_ptk;
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('ptk/KelolaDataPTK_Edit' ,$data);
		$this->load->view('dispendik/footer');
	}

	public function doEdit_DataPTK() {
		$this->load->model('m_ptk','',TRUE);
		$id_ptk = $this->input->post('id_ptk');
		$data = array (
				'AGAMA_PTK' => $this->input->post('agama_ptk'),
			'ALAMAT_PTK' => $this->input->post('alamat_ptk'),
			'FOTO_PTK' => $this->input->post('foto_ptk'),
			'ID_SEKOLAH' => $this->input->post('id_sekolah'),
			'IS_FUNGSIONAL' => $this->input->post('is_fungsional'),
			'JK_PTK' => $this->input->post('jk_ptk'),
			'NAMA_PTK' => $this->input->post('nama_ptk'),
			'NIK_PTK' => $this->input->post('nik_ptk'),
			'NIP_PTK' => $this->input->post('nip_ptk'),
			'NOTELP_PTK' => $this->input->post('notelp_ptk'),
			'NUPTK_PTK' => $this->input->post('nuptk_ptk'),
			'TGL_LHR_PTK' => $this->input->post('tgl_lhr_ptk'),
			'TMPT_LHR_PTK' => $this->input->post('tmpt_lhr_ptk')
			);
		$this->m_ptk->doEdit_DataPTK($id_ptk,$data);
		redirect('ptk/DataPTK');
	}
	
	/*fitur Admin Sekolah*/
	public function KelolaDataPTK(){
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuAdmin');

		$this->load->view('ptk/KelolaDataPTK');
		$this->load->view('ptk/footer');
	}

	public function LihatDataPTK(){
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuAdmin');
		$id_sekolah= $this->m_ptk->getDataDiriAdminSekolah($this->username);
		$data['DaftarPTK'] = $this->m_ptk->getList_PtkGuru_BySekolah($id_sekolah['ID_SEKOLAH']);
		$this->load->view('ptk/dataPTK',  $data);
		$this->load->view('ptk/footer');
	}

	/*Admin Sekolah*/
	public function LihatDataPesertaDidik(){
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuAdmin');
		$id_sekolah= $this->m_ptk->getDataDiriPTK($this->username);
		$data['DaftarSiswa'] = $this->m_pd->getList_siswaBySekolah($id_sekolah['ID_SEKOLAH']);
		$this->load->view('ptk/dataPesertaDidik', $data);
		$this->load->view('ptk/footer');
	}

	public function KelolaDataPesertaDidik(){
		
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuAdmin');
		$this->load->view('ptk/kelolaDataPD');
		$this->load->view('ptk/footer');
		
		
	}

	public function tambahPesertaDidik(){
		$this->load->model('m_pd','',TRUE);
		$data = array (
			'NIS_SISWA' => $this->input->post('nis_siswa'),
			'NISN_SISWA' => $this->input->post('nisn_siswa'),
			'NAMA_SISWA' => $this->input->post('nama_siswa'),
			'TMPT_LHR_SISWA' => $this->input->post('tmpt_lhr_siswa'),
			'TGL_LHR_SISWA' => $this->input->post('tgl_lhr_siswa'),
			'JK_SISWA' => $this->input->post('jk_siswa'),
			'AGAMA_SISWA' => $this->input->post('agama_siswa'),
			'ANAK_KE' => $this->input->post('anak_ke'),
			'STATUS_DLM_KELUARGA' => $this->input->post('status_dlm_keluarga'),
			'ALAMAT_SISWA' => $this->input->post('alamat_siswa'),
			'NOTELP_SISWA' => $this->input->post('notelp_siswa'),
			'DITERIMA_PD_KELAS' => $this->input->post('diterima_pd_kls'),
			'DITERIMA_PD_TGL' => $this->input->post('diterima_pd_tgl'),
			'SEKOLAH_ASAL' => $this->input->post('sekolah_asal')
		);		
		$id_sekolah= $this->m_ptk->getDataDiriPTK($this->username);
		var_dump($id_sekolah);
		$this->m_pd->doInsert_PesertaDidik($data, $id_sekolah['ID_SEKOLAH']);
	}


	/*Kepala Sekolah*/
	

	/*guru mata pelajaran*/
        public function PilihRombelGuru(){
            
                $data = array();

                $data["guru"] = $this->m_ptk->getDataPtk($this->username);
                $data["mapel"] = $this->m_mengajar->getMapel($this->username);
                
                $data["rombel"] = $this->m_rombel->getRombel_ByPengajar($this->username);
                        
              
                
		$this->load->view('ptk/header');
                $this->load->view('ptk/menuGuru',$data);
                $this->load->view('ptk/pilihRombel',$data);
                $this->load->view('ptk/footer');
                
	}
        
        /*wali kelas*/
	public function PilihRombel(){
            
                $data = array();

                $data["guru"] = $this->m_ptk->getDataPtk($this->username);
                $data["mapel"] = $this->m_mengajar->getMapel($this->username);
                
                $data["rombel"] = $this->m_rombel->getRombel_ByPengajar($this->username);
                        
              
                
		$this->load->view('ptk/header');
                $this->load->view('ptk/menuWaliKelas',$data);
                $this->load->view('ptk/pilihRombel',$data);
                $this->load->view('ptk/footer');
                
	}
}

