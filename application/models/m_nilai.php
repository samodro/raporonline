<?php
	class M_nilai extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_nilai() {
			$query=$this->db->query("select * from nilai order by id_nilai asc");
			return $query->result();
		}

		function doInsert_nilai() {
			$data = array(
				'ID_PD' => $this->input->post('id_pd'),
				'ID_MASTER_PENILAIAN' => $this->input->post('id_master_penilaian'),
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'TANGGAL' => $this->input->post('tanggal'),
				'NILAI' => $this->input->post('nilai')
			);
			return $this->db->insert('NILAI', $data);
		}

                function insert_nilai($data){
                    $this->db->insert('NILAI', $data);
                }
		function edit_nilai($id_nilai) {
				$this->db->where('ID_NILAI',$id_nilai);
				$query = $this->db->get('NILAI');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}
                                

		function doEdit_nilai() {
			$id_nilai = $this->input->post('id_nilai');
			$data = array (
				'ID_PD' => $this->input->post('id_pd'),
				'ID_MASTER_PENILAIAN' => $this->input->post('id_master_penilaian'),
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'TANGGAL' => $this->input->post('tanggal'),
				'NILAI' => $this->input->post('nilai')
			);
			$this->db->where('ID_NILAI',$id_nilai);
			$this->db->update('NILAI',$data);
		}
                
                function edit_nilainew($data) {			
			$this->db->where('ID_NILAI',$data["ID_NILAI"]);
			$this->db->update('NILAI',$data);
		}


		function doDelete_nilai($id_nilai){
			$this->db->where('ID_NILAI',$id_nilai);
			$this->db->delete('NILAI');
		}

		function rekapAndra()
		{
			$nh	= $this->db->query("SELECT `NAMA_PD`, AVG(`NILAI`) FROM `nilai` join `master_pd` 
				on `master_pd`.ID_PD = `nilai`.ID_PD WHERE `master_pd`.ID_ROMBEL = 2 
				AND `nilai`.ID_MASTER_PENILAIAN LIKE '201310301%' AND `nilai`.ID_PD = 1 
				group by `nilai`.ID_PD")->result();
			$nuts = $this->db->query("SELECT `NAMA_PD`, `NILAI` FROM `nilai` join `master_pd` 
				on `master_pd`.ID_PD = `nilai`.ID_PD WHERE `master_pd`.ID_ROMBEL = 2 A
				ND `nilai`.ID_MASTER_PENILAIAN LIKE '201310302%'")->result(); 
			$nuas = $this->db->query("SELECT `NAMA_PD`, `NILAI` FROM `nilai` join `master_pd` 
				on `master_pd`.ID_PD = `nilai`.ID_PD WHERE `master_pd`.ID_ROMBEL = 2 
				AND `nilai`.ID_MASTER_PENILAIAN LIKE '201310303%'")->result();
			
			$data['nh']=$nh;
			$data['nuts']=$nuts;
			$data['nuas']=$nuas;
			return $data;
		}

		function selectNilai(){
			
		}

		public function getMapelList(){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN`, `INDIKATOR_PENILAIAN` 
										from `master_indikator_penilaian` 
										where `LEVEL_INDIKATOR`=1 and `ID_MASTER_PENILAIAN` LIKE '2013%'");
			
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
			//kurang passing variabel jenis kurikulum
		}

		public function getKIList($mst_id, $person){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN` , `INDIKATOR_PENILAIAN` 
									from `master_indikator_penilaian` 
									where `LEVEL_INDIKATOR`=2 
									and `MAS_ID_MASTER_PENILAIAN` =
            							(SELECT `ID_MASTER_PENILAIAN` 
            								from `master_indikator_penilaian` 
            								where `LEVEL_INDIKATOR`=1 and `ID_MASTER_PENILAIAN`='$mst_id') ") ;
			//filter sebagai guru atau siswa
			//GURU : KI 1, KI 2, KI 3, KI 4
			//SISWA : KI 1, KI 2
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		public function getMetodeList($mst_id){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN` , `INDIKATOR_PENILAIAN` 
									from `master_indikator_penilaian` 
									where `LEVEL_INDIKATOR`=3 
									and `MAS_ID_MASTER_PENILAIAN` =
            							(SELECT `ID_MASTER_PENILAIAN` 
            								from `master_indikator_penilaian` 
            								where `LEVEL_INDIKATOR`=2 and `ID_MASTER_PENILAIAN`='$mst_id') ") ;
			//filter sebagai guru atau siswa
			//GURU : OBSERVASI, JURNAL
			//SISWA : DIRI SENDIRI, ANTAR TEMAN
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		public function getIndikatorList($mst_id){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN` , `INDIKATOR_PENILAIAN` 
									from `master_indikator_penilaian` 
									where `LEVEL_INDIKATOR`=4 
									and `MAS_ID_MASTER_PENILAIAN` =
            							(SELECT `ID_MASTER_PENILAIAN` 
            								from `master_indikator_penilaian` 
            								where `LEVEL_INDIKATOR`=3 and `ID_MASTER_PENILAIAN`='$mst_id') ") ;
			
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		public function getKDList($mst_id){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN` , `INDIKATOR_PENILAIAN` 
									from `master_indikator_penilaian` 
									where `LEVEL_INDIKATOR`=5 
									and `MAS_ID_MASTER_PENILAIAN` =
            							(SELECT `ID_MASTER_PENILAIAN` 
            								from `master_indikator_penilaian` 
            								where `LEVEL_INDIKATOR`=4 and `ID_MASTER_PENILAIAN`='$mst_id') ") ;
			
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		public function getKurikulumType(){
			//tabel db : master_kurikulum, master_tahun_ajar, rombel, mengajar, master_ptk

			/*
			$kelas = $this->input->post('ID_ROMBEL');
			$query = $this->db->query("SELECT `master_kurikulum`.ID_MASTER_KURIKULUM, `NAMA_KURIKULUM`, `master_tahun_ajar`.ID_TAHUN_AJAR, 
										from `master_kurikulum`, `master_tahun_ajar`, `rombel` 
										where `rombel`.ID_TAHUN_AJAR = `master_tahun_ajar`.ID_TAHUN_AJAR 
											and `rombel`.ID_ROMBEL = '$kelas' 
											and `master_tahun_ajar`.ID_MASTER_KURIKULUM = `master_kurikulum`.ID_MASTER_KURIKULUM");
			if($query->num_rows() >0 )
			{
				$data=$query->result_array();
				return $data[0];
			}
			else
			{
				return false;
			}
			*/
		}

		public function getListStudent_inClass(){
			//tabel db : rombel, mengajar, master_pd
		}

		public function doAssesment_ByTeacher(){
			//tabel db : nilai, master_pd, master_indikator_penilaian
			//insert into table nilai
		}


		/*master penilaian*/
		public function getAll_DataMasterPenilaian(){
			$query=$this->db->query("select * from mst_penilaian order by KODE_PENILAIAN asc");
			return $query->result();
		}

		public function getAll_IndikatorPenilaian(){
			$query=$this->db->query("select * from mst_penilaian order by KODE_PENILAIAN asc");
				if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		function editDataIndikatorPenilaian($kode_penilaian) {
				$query=$this->db->query("SELECT `KODE_PENILAIAN`, `jenjang`, `mst_mapel`.KODE_MAPEL, `NAMA_MAPEL`,
					`MST_KODE_PENILAIAN`, `INDIKATOR_PENILAIAN`, `DESKRIPSI_PENILAIAN`, `LEVEL_PENILAIAN`,
					 `KATA_KUNCI`, `IS_GURU` 
					FROM `mst_penilaian` inner join `mst_mapel` 
					WHERE `mst_penilaian`.KODE_MAPEL = `mst_mapel`.KODE_MAPEL
					and `mst_penilaian`.KODE_PENILAIAN = '$kode_penilaian' ");
			$query->result();
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function getIdAbsensi_branch($kode_penilaian){
			$query=$this->db->query("SELECT LEVEL_PENILAIAN + 1 as level_penilaian FROM mst_penilaian
					WHERE KODE_PENILAIAN = '$kode_penilaian'
					LIMIT 1 ");
			$query->result();
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doInsert_IndikatorPenilaian($data) {

			return $this->db->insert('mst_penilaian', $data);
		}

		function doInsert_IndikatorPenilaian_Parent($data) {

			return $this->db->insert('mst_penilaian', $data);
		}

		function hapusDataMstPenilaian($kode_penilaian){
			$this->db->where('KODE_PENILAIAN',$kode_penilaian);
			$this->db->delete('mst_penilaian');
		}

		function doEdit_DataIndikatorPenilaian($kode_penilaian,$data) {
			$this->db->where('KODE_PENILAIAN',$kode_penilaian);
			$this->db->update('mst_penilaian',$data);
		}



                function getNilaibyKodeandId($kode_penilaian, $id_siswa){
			$query=$this->db->query("SELECT  n.* FROM riwayat_kelas rk, "
                                . "rombongan_belajar rb, mst_siswa mt, nilai n "
                                . "where rk.id_siswa = mt.id_siswa and rb.id_rombel = "
                                . "rk.id_rombel and n.id_riwayat = rk.id_riwayat "
                                . "and n.kode_penilaian = '$kode_penilaian' and mt.id_siswa = '$id_siswa' ");
			$data=$query->result_array();
                        if($data!=null)
                            return $data[0];
                        else
                            return null;
		}
                
                 function getNilaiEkskul($id_siswa){
			$query=$this->db->query("SELECT  n.* FROM riwayat_kelas rk, "
                                . "rombongan_belajar rb, mst_siswa mt, nilai n "
                                . "where rk.id_siswa = mt.id_siswa and rb.id_rombel = "
                                . "rk.id_rombel and n.id_riwayat = rk.id_riwayat "
                                . "and n.kode_penilaian like '8%' and mt.id_siswa = '$id_siswa' order by n.id_nilai asc ");
			$data=$query->result_array();
                        if($data!=null)
                            return $data;
                        else
                            return null;
		}
                
                function getRiwayat($id_siswa, $id_rombel){
                    $query=$this->db->query("SELECT * from riwayat_kelas where id_siswa = '$id_siswa' and id_rombel = '$id_rombel'");
			$data=$query->result_array();
                        if($data!=null)
                            return $data[0];
                        else
                            return null;
                }
	}
?>
