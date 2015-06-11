<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends CI_Controller {
	
	public $id_pd;
	public $username;
	public $akses_level ; 

	public function __construct() {
            parent::__construct();
            
            $this->load->model('m_nilai');
            $this->load->model('m_pd');
            $this->load->model('m_pengguna');
            $this->load->model('m_ptk');
            $this->load->model('m_mengajar');
            $this->load->model('m_rombel');
            $this->load->model('m_mapel');
            $this->load->model('m_penilaian');

            $this->id_pd = $this->session->userdata('ID_PENGGUNA');
            $this->username = $this->session->userdata('USERNAME');
            $this->akses_level = $this->session->userdata('AKSES_LEVEL');            
            
            
	}

	public function index() {
		$this->load->model('m_nilai');
		$data['judul'] = 'Daftar nilai andra';
		$data['daftar'] = $this->m_nilai->rekapAndra();
		$this->load->view('dispendik/header');
		$this->load->view('nilai', $data);
		$this->load->view('dispendik/footer');
	}

	

    public function DataMasterPenilaian_Rapor(){
        
        $this->load->view('dispendik/header');
        $data['listPenilaian'] = $this->m_nilai->getAll_DataMasterPenilaian();
        $this->load->view('dispendik/sidebarDinas');
        $this->load->view('dispendik/DataMasterPenilaian', $data);
        $this->load->view('dispendik/footer');
        
    }

    public function tambahIndikatorPenilaian($kode_penilaian){
        $this->load->view('dispendik/header');
        $data['listPenilaian'] = $this->m_nilai->getAll_IndikatorPenilaian();
        $data['level_penilaian'] = $this->m_nilai->getIdAbsensi_branch($kode_penilaian);
        $data['listMapel'] = $this->m_nilai->getAll_DataMasterPenilaian();
        $data['daftar'] = $this->m_nilai->editDataIndikatorPenilaian($kode_penilaian);
        $this->load->view('dispendik/sidebarDinas');
        $this->load->view('dispendik/DataMasterPenilaian_Add', $data);
        $this->load->view('dispendik/footer');
    }

    public function tambahIndikatorPenilaian_Parent(){
        $this->load->view('dispendik/header');
        $data['listMapel'] = $this->m_mapel->getList_mapel();
        $this->load->view('dispendik/sidebarDinas');
        $this->load->view('dispendik/DataMasterPenilaian_Add_Parent', $data);
        $this->load->view('dispendik/footer');
    }

    public function doInsert_IndikatorPenilaian() {
        $this->load->model('m_nilai','',TRUE);
            $data = array (
            'KODE_PENILAIAN' => $this->input->post('kode_penilaian'),
            'jenjang' => $this->input->post('jenjang'),
            'KODE_MAPEL' => $this->input->post('kode_mapel'),
            'MST_KODE_PENILAIAN' => $this->input->post('mst_kode_penilaian'),
            'INDIKATOR_PENILAIAN' => $this->input->post('indikator_penilaian'),
            'DESKRIPSI_PENILAIAN' => $this->input->post('deskripsi_penilaian'),
            'LEVEL_PENILAIAN' => $this->input->post('level_penilaian'),
            'KATA_KUNCI' => $this->input->post('kata_kunci'),
            'IS_GURU' => $this->input->post('is_guru')
        );
        $this->m_nilai->doInsert_IndikatorPenilaian($data);
        redirect('penilaian/DataMasterPenilaian_Rapor');
    }

    public function doInsert_IndikatorPenilaian_Parent() {
        $this->load->model('m_nilai','',TRUE);
            $data = array (
            'KODE_PENILAIAN' => $this->input->post('kode_penilaian'),
            'jenjang' => $this->input->post('jenjang'),
            'KODE_MAPEL' => $this->input->post('kode_mapel'),
            'INDIKATOR_PENILAIAN' => $this->input->post('indikator_penilaian'),
            'DESKRIPSI_PENILAIAN' => $this->input->post('deskripsi_penilaian'),
            'LEVEL_PENILAIAN' => $this->input->post('level_penilaian'),
            'KATA_KUNCI' => $this->input->post('kata_kunci'),
            'IS_GURU' => $this->input->post('is_guru')
        );
        $this->m_nilai->doInsert_IndikatorPenilaian_Parent($data);
        redirect('penilaian/DataMasterPenilaian_Rapor');
    }

    public function hapusDataMstPenilaian($kode_penilaian) {
        $this->load->model('m_nilai','',TRUE);
        $this->m_nilai->hapusDataMstPenilaian($kode_penilaian);
        redirect('penilaian/DataMasterPenilaian_Rapor');
    }

    public function editDataMstPenilaian($kode_penilaian) {
        $data['listPenilaian'] = $this->m_nilai->getAll_IndikatorPenilaian();
        $data['level_penilaian'] = $this->m_nilai->getIdAbsensi_branch($kode_penilaian);
        $data['listMapel'] = $this->m_nilai->getAll_DataMasterPenilaian();
        $data['daftar'] = $this->m_nilai->editDataIndikatorPenilaian($kode_penilaian);
        $this->load->view('dispendik/header');
        $this->load->view('dispendik/sidebarDinas');
        $this->load->view('dispendik/DataMasterPenilaian_Edit',$data);
        $this->load->view('dispendik/footer');
    }

    public function doEdit_DataIndikatorPenilaian(){
        $this->load->model('m_nilai','',TRUE);
        $kode_penilaian = $this->input->post('kode_penilaian');
        $data = array (
                'KODE_PENILAIAN' => $this->input->post('kode_penilaian'),
            'jenjang' => $this->input->post('jenjang'),
            'KODE_MAPEL' => $this->input->post('kode_mapel'),
            'INDIKATOR_PENILAIAN' => $this->input->post('indikator_penilaian'),
            'DESKRIPSI_PENILAIAN' => $this->input->post('deskripsi_penilaian'),
            'LEVEL_PENILAIAN' => $this->input->post('level_penilaian'),
            'KATA_KUNCI' => $this->input->post('kata_kunci'),
            'IS_GURU' => $this->input->post('is_guru')
            );
        $this->m_nilai->doEdit_DataIndikatorPenilaian($kode_penilaian,$data);
        redirect('penilaian/DataMasterPenilaian_Rapor');
    }

	/* -- PENILAIAN ANTAR TEMAN --*/

	public function getMapelList()
    {
        $pilihMapel = $this->m_nilai->getMapelList();
        header('Content-Type: application/json');
        echo json_encode($pilihMapel);
    }

    public function getKIList($mst_id)
    {
        $pilihKI = $this->m_nilai->getKIList($mst_id, $username, $akses_level);
        header('Content-Type: application/json');
        echo json_encode($pilihKI);
        //filter : JIKA dia sebagai GURU MAPEL : maka berhak menilai 4 aspek ( KI 1 sampai KI 4),
        				// jika dia sebagai SISWA : maka dia hanya berhak menikai 2 aspek (KI 1 - KI 2) aspek sikap

        //kalau is_guru = 1 berarti hak GURU
        //kalau is_guru = 0 berarti siswa
    }

    public function getMetodeList($mst_id)
    {
        $pilihMetode = $this->m_nilai->getMetodeList($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihMetode);
    }

     public function getIndikatorList($mst_id)
    {
        $pilihIndikator = $this->m_nilai->getIndikatorList($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihIndikator);
    }

     public function getKDList($mst_id)
    {
        $pilihKD = $this->m_nilai->getKDList($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihKD);
    }

    public function guruMataPelajaran(){
    	//load view guru mapel
        $this->load->view('ptk/header');
        $this->load->view('ptk/menuGuru');
        $this->load->view('ptk/penilaianGuru');
        $this->load->view('ptk/footer');

    	//$listMengajar = load model m_ptk->getMengajarKelas()
    		// -- u/ menampilkan guru itu mengajar di kelas apa saja

    	//$dataGuru = load model m_ptk->getDataPenilaiGuru()
    		// -- u/ menampilkan detil data penilai 

    	//$kurikulum = load model m_nilai->getKurikulumType()
    		// -- u/ cek KELAS tersebut menggunakan kurikulum apa
    			//if $kurikulum == 2013
    				// $mapel = load model m_ptk/getMengajarMapel($username)
    					// -- u/ mendapatkan guru tersebut mengajar mapel apa
    				// $pilihKI = redirect cntrlr penilaian/getKIList($mst_id, $kurikulum[2013])
    				// $pilihMetode = redirect cntrlr penilaian/getMetodeList($mst_id, $kurikulum[2013])
    				// $pilihIndikator = redirect cntrlr penilaian/getIndikatorList($mst_id, $kurikulum[2013])
    				// $pilihKD = redirect cntrlr penilaian/getKDList($mst_id, $kurikulum[2013])
    			//else
    				// $mapel = load model m_ptk/getMengajarMapel($username)
    				// $pilihKI = redirect cntrlr penilaian/getKIList($mst_id, $kurikulum[2006])
    				// $pilihIndikator = redirect cntrlr penilaian/getIndikatorList($mst_id, $kurikulum[2006])
    				// $pilihKD = redirect cntrlr penilaian/getKDList($mst_id, $kurikulum[2006])

    	//load model m_nilai->getListStudent_inClass()
    		// -- u/mendapatkan list anak 1 kelas
    		// jadi list siswa ini belum akan muncul kalau tipe penilaian blm dipilih

    	//load model m_nilai->doAssesment_ByTeacher()
    		//proses INSERT NILAI
    }

    public function do_assesment_by_student(){
		$this->load->view('siswa/headerSiswa');
		$this->load->view('siswa/menuSiswa');
		
		$data['dataSiswa']= $this->m_pd->get_data_diri_siswa($this->username);

    	//$kurikulum = load model m_nilai->getKurikulumType()
    		// -- u/ cek KELAS tersebut menggunakan kurikulum apa
    			//if $kurikulum == 2013
    				// $listmapel = redirect cntrlr penilaian/getMapelList($kurikulum[2013])
    				// $pilihKI = redirect cntrlr penilaian/getKIList($mst_id, $kurikulum[2013])
    				// $pilihMetode = redirect cntrlr penilaian/getMetodeList($mst_id, $kurikulum[2013])
    				// $pilihIndikator = redirect cntrlr penilaian/getIndikatorList($mst_id, $kurikulum[2013])
    				// $pilihKD = redirect cntrlr penilaian/getKDList($mst_id, $kurikulum[2013])

    	//load model m_nilai->getListStudent_inClass()
    		// -- u/mendapatkan list anak 1 kelas
    		// jadi list siswa ini belum akan muncul kalau tipe penilaian blm dipilih

    	//load model m_nilai->doAssesment_ByTeacher()
    		//proses INSERT NILAI pada setiap KD. jadi jika ada 2 KD yg dipilih,
			//maka record 2 nilai
		

		$this->load->view('siswa/penilaianSiswa', $data);
		$this->load->view('siswa/footerSiswa');//
	}

    public function DataEkskul_siswa(){
        $this->load->view('ptk/header');
        $data['guru'] = $this->m_ptk->getDataDiriWaliKelas($this->username);
        $data['mapel'] = $this->m_mengajar->getMapel($this->username);
        $data['id_rombel']= $this->m_rombel->getRombel_ByWaliKelas($this->username);
        
        $data['rombel'] = $this->m_rombel->getDataRombelAll_ById($data['id_rombel']['ID_ROMBEL']);
        $this->load->view('ptk/menuWaliKelas', $data);
        $data['DaftarSiswa_WaliKelas'] = $this->m_rombel->getList_siswaKelas( $data['id_rombel']['ID_ROMBEL']);        
        $data['listEkskul']=$this->m_penilaian->getListEkskul();
        $this->load->view('ptk/DataEkskul_siswa', $data);
        $this->load->view('ptk/footer');
    }
    
   

    public function DKN_siswa(){
        $this->load->view('ptk/header');
        $data['guru'] = $this->m_ptk->getDataDiriWaliKelas($this->username);
        $data['mapel'] = $this->m_mengajar->getMapel($this->username);
        $data["id_rombel"]= $this->m_rombel->getRombel_ByWaliKelas($this->username);
        $data['rombel'] = $this->m_rombel->getDataRombelAll_ById($data['id_rombel']['ID_ROMBEL']);
        $this->load->view('ptk/menuWaliKelas', $data);
        $data['DaftarSiswa_WaliKelas'] = $this->m_rombel->getList_siswaKelas($data['id_rombel']['ID_ROMBEL']);
        
        $this->load->view('ptk/DKN_siswa', $data);
        $this->load->view('ptk/footer');
    }

    public function DataPrestasi_siswa(){
        $this->load->view('ptk/header');
        $data['guru'] = $this->m_ptk->getDataDiriWaliKelas($this->username);
        $data['mapel'] = $this->m_mengajar->getMapel($this->username);
        $data["id_rombel"]= $this->m_rombel->getRombel_ByWaliKelas($this->username);
        $data['rombel'] = $this->m_rombel->getDataRombelAll_ById($data['id_rombel']['ID_ROMBEL']);
        $this->load->view('ptk/menuWaliKelas', $data);
        $data['DaftarSiswa_WaliKelas'] = $this->m_rombel->getList_siswaKelas($data['id_rombel']['ID_ROMBEL']);
        $this->load->view('ptk/DataPrestasi_siswa', $data);
        $this->load->view('ptk/footer');
    }

    public function DataKenaikanKelas_siswa(){
        $this->load->view('ptk/header');
        $data['guru'] = $this->m_ptk->getDataDiriWaliKelas($this->username);
        $data['mapel'] = $this->m_mengajar->getMapel($this->username);
        $data["id_rombel"]= $this->m_rombel->getRombel_ByWaliKelas($this->username);
        $data['rombel'] = $this->m_rombel->getDataRombelAll_ById($data['id_rombel']['ID_ROMBEL']);
        $this->load->view('ptk/menuWaliKelas', $data);
        $data['DaftarSiswa_WaliKelas'] = $this->m_rombel->getList_siswaKelas($data['id_rombel']['ID_ROMBEL']);
        $this->load->view('ptk/DataKenaikanKelas_siswa', $data);
        $this->load->view('ptk/footer');
    }
    
    public function AkhlakdanKepribadian_siswa(){
        $this->load->view('ptk/header');
        
        
        $data["id_rombel"]= $this->m_rombel->getRombel_ByWaliKelas($this->username);
        $data['rombel'] = $this->m_rombel->getDataRombelAll_ById($data['id_rombel']['ID_ROMBEL']);
        $data["listSiswa"]=$this->m_rombel->getList_siswaKelas($data['id_rombel']['ID_ROMBEL']);
        $data["mapel"] = $this->m_mapel->getDataMapel($this->uri->segment(3));
         
        
         
        $data["guru"] = $this->m_ptk->getDataPtk($this->username);
        
        
        $data["penilaian"] = $this->m_penilaian->getListIndikator_penilaianparent($data["mapel"]["KODE_MAPEL"], $this->uri->segment(5), $this->uri->segment(4)); 
        $data["level"] = $this->uri->segment(5);
        $data["kode"] = $this->uri->segment(4);
        
        
        
        
        $this->load->view('ptk/menuWaliKelas', $data);
        
        $this->load->view('ptk/AkhlakdanKepribadian_Siswa',$data);
        
        
        
        //$this->load->view('ptk/AkhlakdanKepribadian_siswa', $data);
        $this->load->view('ptk/footer');
    }

    /*guru mata pelajaran
    public function PenilainGuruMataPelajaran(){
               
        
        $data["listSiswa"]=$this->m_rombel->getList_siswaKelas($this->uri->segment(3));
        $data["rombel"] = $this->m_rombel->getDataRombelAll_ById($this->uri->segment(3));
        $data["mapel"] = $this->m_mengajar->getMapel($this->username);
       

        $data["guru"] = $this->m_ptk->getDataPtk($this->username);
        $data["level2"] = $this->m_penilaian->getListIndikator_penilaian($data["mapel"]["KODE_MAPEL"], "2"); 
        
        $this->load->view('ptk/header');
        $this->load->view('ptk/menuWaliKelas',$data);
        
        
        $this->load->view('ptk/penilaian_olehGuru',$data);
        $this->load->view('ptk/footer');
    }
    */
    
    /*alternatif*/
    
    public function PenilainGuruMataPelajaran(){
               
        
        $data["listSiswa"]=$this->m_rombel->getList_siswaKelas($this->uri->segment(3));
        $data["rombel"] = $this->m_rombel->getDataRombelAll_ById($this->uri->segment(3));
        $data["mapel"] = $this->m_mengajar->getMapel($this->username);
               
         
        $data["guru"] = $this->m_ptk->getDataPtk($this->username);
        
        
        $data["penilaian"] = $this->m_penilaian->getListIndikator_penilaianparent($data["mapel"]["KODE_MAPEL"], $this->uri->segment(5), $this->uri->segment(4)); 
        $data["level"] = $this->uri->segment(5);
        $data["kode"] = $this->uri->segment(4);
        
        
        $this->load->view('ptk/header');
        
        if($this->akses_level=='wali kelas')
        {
            $this->load->view('ptk/menuWaliKelas',$data);
        }
        else if($this->akses_level=='guru mata pelajaran')
        {
            $this->load->view('ptk/menuguru',$data);
        }
        
        $this->load->view('ptk/penilaian_olehGurunew',$data);
        $this->load->view('ptk/footer');
    }
    
    public function save1Nilai()
    {
        $riwayat = $this->m_nilai->getRiwayat($this->input->post('id_siswa'), $this->input->post('id_rombel'));
        $siswa = $this->m_nilai->getNilaiEkskul($this->input->post('id_siswa'));
        
        if($this->input->post('pilihEkskul1')!='null' || count($siswa)>0)
        {
            if(count($siswa)>0)
            {
                $nilai = $this->m_nilai->getNilaibyKodeandId($siswa[0]["KODE_PENILAIAN"], $this->input->post('id_siswa'));             
                if($this->input->post('pilihEkskul1')=='null')
                {
                    $this->m_nilai->doDelete_nilai($nilai["ID_NILAI"]);
                }
                else
                {
                    $nilai["KODE_PENILAIAN"] = $this->input->post('pilihEkskul1');
                    $nilai["NILAI"] =  $this->input->post('nilaiEkskul1');
                    $this->m_nilai->edit_nilainew($nilai);
                }
            }
            else
            {
                $nilai = $this->m_nilai->getNilaibyKodeandId($this->input->post('pilihEkskul1'), $this->input->post('id_siswa'));             
                if($nilai==null)
                {                
                    $data = array(
                                    'ID_NILAI' => '',
                                    'ID_RIWAYAT' => $riwayat["ID_RIWAYAT"],
                                    'KODE_PENILAIAN' => $this->input->post('pilihEkskul1'),
                                    'TANGGAL' =>  date('Y-m-d'),
                                    'NILAI' => $this->input->post('nilaiEkskul1')
                            );
                    $this->m_nilai->insert_nilai($data);
                }
                else
                {
                    $nilai["NILAI"] =  $this->input->post('nilaiEkskul1');
                    $this->m_nilai->edit_nilainew($nilai);
                }
            }
        }
        
        if($this->input->post('pilihEkskul2')!='null' || count($siswa)>1)
        {
            if(count($siswa)>1)
            {
                $nilai = $this->m_nilai->getNilaibyKodeandId($siswa[1]["KODE_PENILAIAN"], $this->input->post('id_siswa'));             
                if($this->input->post('pilihEkskul2')=='null')
                {
                    $this->m_nilai->doDelete_nilai($nilai["ID_NILAI"]);
                }
                else
                {
                    $nilai["KODE_PENILAIAN"] = $this->input->post('pilihEkskul2');
                    $nilai["NILAI"] =  $this->input->post('nilaiEkskul2');
                    $this->m_nilai->edit_nilainew($nilai);
                }
            }
            else
            {
                $nilai = $this->m_nilai->getNilaibyKodeandId($this->input->post('pilihEkskul2'), $this->input->post('id_siswa'));
                if($nilai==null)
               {
                   $data = array(
                                   'ID_NILAI' => '',
                                   'ID_RIWAYAT' => $riwayat["ID_RIWAYAT"],
                                   'KODE_PENILAIAN' => $this->input->post('pilihEkskul2'),
                                   'TANGGAL' =>  date('Y-m-d'),
                                   'NILAI' => $this->input->post('nilaiEkskul2')
                           );
                   $this->m_nilai->insert_nilai($data);
               }
               else
               {
                   $nilai["NILAI"] =  $this->input->post('nilaiEkskul2');
                   $this->m_nilai->edit_nilainew($nilai);
               }
            }
        }
        
        if($this->input->post('pilihEkskul3')!='null' || count($siswa)>2)
        {
            if(count($siswa)>2)
            {
                $nilai = $this->m_nilai->getNilaibyKodeandId($siswa[2]["KODE_PENILAIAN"], $this->input->post('id_siswa'));             
                if($this->input->post('pilihEkskul3')=='null')
                {
                    $this->m_nilai->doDelete_nilai($nilai["ID_NILAI"]);
                }
                else
                {
                    $nilai["KODE_PENILAIAN"] = $this->input->post('pilihEkskul3');
                    $nilai["NILAI"] =  $this->input->post('nilaiEkskul3');
                    $this->m_nilai->edit_nilainew($nilai);
                }
            }
            else
            {
                $nilai = $this->m_nilai->getNilaibyKodeandId($this->input->post('pilihEkskul3'), $this->input->post('id_siswa'));
                if($nilai==null)
               {
                   $data = array(
                                   'ID_NILAI' => '',
                                   'ID_RIWAYAT' => $riwayat["ID_RIWAYAT"],
                                   'KODE_PENILAIAN' => $this->input->post('pilihEkskul3'),
                                   'TANGGAL' =>  date('Y-m-d'),
                                   'NILAI' => $this->input->post('nilaiEkskul3')
                           );
                   $this->m_nilai->insert_nilai($data);
               }
               else
               {
                   $nilai["NILAI"] =  $this->input->post('nilaiEkskul3');
                   $this->m_nilai->edit_nilainew($nilai);
               }
            }
        }
        
        redirect(base_url().'index.php/penilaian/DataEkskul_siswa');        
        

        
    }
    
    public function saveNilai()
    {
        $listSiswa=$this->m_rombel->getList_siswaKelas($this->input->post('id_rombel'));
        
        foreach ($listSiswa as $a)
        {
            $nilai = $this->m_nilai->getNilaibyKodeandId($this->input->post('kode_penilaian'), $a->ID_SISWA);
            $riwayat = $this->m_nilai->getRiwayat($a->ID_SISWA, $this->input->post('id_rombel'));
            
            if($nilai==null)
            {
                $data = array(
				'ID_NILAI' => '',
				'ID_RIWAYAT' => $riwayat["ID_RIWAYAT"],
                                'KODE_PENILAIAN' => $this->input->post('kode_penilaian'),
				'TANGGAL' =>  date('Y-m-d'),
				'NILAI' => $this->input->post($a->ID_SISWA)
			);
                $this->m_nilai->insert_nilai($data);
            }
            else
            {
                $nilai["NILAI"] =  $this->input->post($a->ID_SISWA);
                $this->m_nilai->edit_nilainew($nilai);
            }
        }
        
        redirect(base_url()."index.php/penilaian/PenilainGuruMataPelajaran/".$this->input->post('id_rombel')."/".$this->input->post('kode')."/".$this->input->post('level'));
    }
    
    public function saveNilaiAkhlak()
    {
        $listSiswa=$this->m_rombel->getList_siswaKelas($this->input->post('id_rombel'));
        
        foreach ($listSiswa as $a)
        {
            $nilai = $this->m_nilai->getNilaibyKodeandId($this->input->post('kode_penilaian'), $a->ID_SISWA);
            $riwayat = $this->m_nilai->getRiwayat($a->ID_SISWA, $this->input->post('id_rombel'));
            
            if($nilai==null)
            {
                $data = array(
				'ID_NILAI' => '',
				'ID_RIWAYAT' => $riwayat["ID_RIWAYAT"],
                                'KODE_PENILAIAN' => $this->input->post('kode_penilaian'),
				'TANGGAL' =>  date('Y-m-d'),
				'NILAI' => $this->input->post($a->ID_SISWA)
			);
                $this->m_nilai->insert_nilai($data);
            }
            else
            {
                $nilai["NILAI"] =  $this->input->post($a->ID_SISWA);
                $this->m_nilai->edit_nilainew($nilai);
            }
        }
        
        redirect(base_url()."index.php/penilaian/AkhlakdanKepribadian_Siswa/61/".$this->input->post('kode')."/".$this->input->post('level'));
    }

    public function getEkskulList1($mst_id)
    {
        $pilihEkskul1 = $this->m_mapel->getList_ekstrakulikuler($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihEkskul1);
    }

    public function getEkskulList2($mst_id)
    {
        $pilihEkskul2 = $this->m_mapel->getList_ekstrakulikuler($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihEkskul2);
    }

    public function getEkskulList3($mst_id)
    {
        $pilihEkskul3 = $this->m_mapel->getList_ekstrakulikuler($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihEkskul3);
    }

    //coba proses setting pengolahan nilai
    /* -- dinas/kepsek --    
	/*1. cek kurikulum kelas tersebut ($id_rombel). dapat value id_kurikulum
      2. mau menilai aspek apa dan mapel apa. 
      3. settingPenilaian($aspek, dan bobotnya). dapat rumus
      -- guru
      4. doPenilaian()
    */
}

