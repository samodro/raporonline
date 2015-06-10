<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapel extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_mapel');
	}

	public function index() {
			
	}

	/*-- DINAS PENDIDIKAN -- */
	public function DataMataPelajaran($kode_mapel=""){
		if($kode_mapel=="")
			{
				$selected['KODE_MAPEL'] =  "";
				$selected['NAMA_MAPEL'] =  "";
			}
			else
				$selected=$this->m_mapel->getDataMapel($kode_mapel);
		$data['selected']=$selected;
		$data['listMapel'] = $this->m_mapel->getAll_mapel();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataMataPelajaran' , $data);
		$this->load->view('dispendik/footer');
	}

	public function tambahDataMapel() {
		$data=array(
		'KODE_MAPEL' => $this->input->post('kode_mapel'),
		'NAMA_MAPEL' => $this->input->post('nama_mapel')
		);
		var_dump($data);
		$this->m_mapel->doInsert_mapel($data);
		$this->index();
	}

	public function editDataMapel(){
		$this->load->model('m_mapel','',TRUE);
		$kode_mapel = $this->input->post('kode_mapel');
		$nama_mapel =$this->input->post('nama_mapel');
		$data = array (
			'NAMA_MAPEL' => $this->input->post('nama_mapel')
		);
		$this->m_mapel->doEdit_mapel($data);
	}

	public function hapusDataMapel($kode_mapel) {
		$this->load->model('m_mapel','',TRUE);
		$this->m_mapel->doDelete_mapel($kode_mapel);
		redirect('mapel/DataMataPelajaran');
	}

	/*
	public function DataMuatanLokal($kode_mapel=""){
		if($kode_mapel=="")
			{
				$selected['KODE_MAPEL'] =  $this->m_mapel->getIdMapel()[0]['id'];
				$selected['NAMA_MAPEL'] =  "";
			}
			else
				$selected=$this->m_mapel->getDataMapel($kode_mapel);
		$data['selected']=$selected;
		$data['listMulok'] = $this->m_mapel->getAll_mapel();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataMuatanLokal', $data);
		$this->load->view('dispendik/footer');
	}

	public function DataEkstrakulikuler(){
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/sidebarDinas');
		$this->load->view('dispendik/DataEkstrakulikuler');
		$this->load->view('dispendik/footer');
	}

	*/
	
		
}

