<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kurikulum extends CI_Controller {

	
	public function __construct() {
			parent::__construct();
			$this->load->model('m_tahun_ajar');
			$this->load->model('m_kurikulum');
		}

		public function index() {
			
		}

		/*-- DINAS PENDIDIKAN -- */
		public function DataKurikulum($id_kurikulum=""){
			if($id_kurikulum=="")
			{
				$selected['ID_KURIKULUM'] =  $this->m_kurikulum->getIdKurikulum()[0]['id'];
				$selected['NAMA_KURIKULUM'] =  "";
			}
			else
				$selected=$this->m_kurikulum->getDataKurikulum($id_kurikulum);
			$data['selected']=$selected;
			$data['daftar'] = $this->m_kurikulum->getAll_kurikulum();
			$this->load->view('dispendik/header');
			$this->load->view('dispendik/sidebarDinas');
			$this->load->view('dispendik/datakurikulum', $data);
			$this->load->view('dispendik/footer');
		}

		public function DataTahunAjar($id_tahun_ajar=""){
			if($id_tahun_ajar=="")
			{
				$selected['ID_TAHUN_AJAR'] =  $this->m_kurikulum->getIdTahunAjar()[0]['id'];
				$selected['ID_KURIKULUM'] =  "";
				$selected['SEMESTER'] =  "";
				$selected['NAMA_TAHUN_AJAR'] =  "";
				$selected['TAHUN_AWAL'] =  "";
				$selected['TAHUN_AKHIR'] =  "";
			}
			else
				$selected=$this->m_kurikulum->getDataTahunAjar($id_tahun_ajar);
			$data['selected']=$selected;
			$data['listKurikulum'] = $this->m_kurikulum->getAll_kurikulum();
			$data['listTahunAjar'] = $this->m_kurikulum->getAll_tahunAjar();
			$this->load->view('dispendik/header');
			$this->load->view('dispendik/sidebarDinas');
			$this->load->view('dispendik/DataTahunAjar', $data);
			$this->load->view('dispendik/footer');
		}

		public function tambahDataKurikulum() {
			echo $this->input->post('nama_syarat');
			$data=array(
			'NAMA_KURIKULUM' => $this->input->post('nama_syarat')
			);
			var_dump($data);
			$this->m_kurikulum->doInsert_kurikulum($data);
			echo "<script>alert('Kurikulum berhasil ditambah ! ')</script>";
			$this->index();
		}

		public function tambahDataTahunAjar() {
			$data=array(
			'ID_KURIKULUM' => $this->input->post('id_kurikulum'),
			'SEMESTER' => $this->input->post('semester'),
			'ID_TAHUN_AJAR' => $this->input->post('id_tahun_ajar'),
			'NAMA_TAHUN_AJAR' => $this->input->post('nama_tahun_ajar'),
			'TAHUN_AWAL' => $this->input->post('tahun_awal'),
			'TAHUN_AKHIR' => $this->input->post('tahun_akhir')
			);
			var_dump($data);
			$this->m_kurikulum->doInsert_TahunAjar($data);
			echo "<script>alert('Kurikulum berhasil ditambah ! ')</script>";
			$this->index();
		}

		public function hapusDataKurikulum($id_kurikulum) {
			$this->load->model('m_kurikulum','',TRUE);
			$this->m_kurikulum->doDelete_kurikulum($id_kurikulum);
			redirect('Kurikulum/DataKurikulum');
		}

		public function hapusDataTahunAjar($id_tahun_ajar) {
			$this->load->model('m_tahun_ajar','',TRUE);
			$this->m_kurikulum->doDelete_tahunAjar($id_tahun_ajar);
			redirect('Kurikulum/DataTahunAjar');
		}

		public function editDataKurikulum() {
			$this->load->model('m_kurikulum','',TRUE);
			$id_kurikulum = $this->input->post('nama_syarat');
			$nama_kurikulum =$this->input->post('nama_kurikulum');
			$data = array (
				'NAMA_KURIKULUM' => $this->input->post('nama_syarat')
			);
			$this->m_kurikulum->doEdit_kurikulum($data);
		}

		public function editDataTahunAjar() {
			$this->load->model('m_kurikulum','',TRUE);
			$id_tahun_ajar = $this->input->post('id_tahun_ajar');
			$id_kurikulum =$this->input->post('id_kurikulum');
			$semester = $this->input->post('semester');
			$nama_tahun_ajar = $this->input->post('nama_tahun_ajar');
			$tahun_awal= $this->input->post('tahun_awal');
			$tahun_akhir= $this->input->post('tahun_akhir');
			$data = array (
				'ID_KURIKULUM' => $this->input->post('id_kurikulum'),
				'SEMESTER' => $this->input->post('semester'),
				'NAMA_TAHUN_AJAR' => $this->input->post('nama_tahun_ajar'),
				'TAHUN_AWAL' => $this->input->post('tahun_awal'),
				'TAHUN_AKHIR' => $this->input->post('tahun_akhir')
			);
			$this->m_kurikulum->doEdit_tahunAjar($data);
		}

		public function ManageKurikulum(){
			$this->load->model('m_kurikulum');
			$data['judul'] = 'Daftar Pengguna';
			//$data['daftar'] = $this->m_kurikulum->_getAll();
			$this->load->view('dispendik/header');
			$this->load->view('dispendik/DataMataPelajaran');
			$this->load->view('dispendik/footer');
		}
}

