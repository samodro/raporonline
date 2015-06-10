<?php
	class M_ptk extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getDataDiriGuru($username) {
			
			$query=$this->db->query("SELECT * FROM `rombongan_belajar` rb, `mst_sekolah` ms, pengguna p, mst_ptk mp "
                                . "WHERE rb.id_sekolah = ms.id_sekolah and p.username = mp.NIP_PTK "
                                . "and mp.ID_PTK = rb.ID_PTK and p.username = '$username' ");
			if($query->num_rows() >0 )
			{
				$data=$query->result_array();
				return $data[0];
			}
			else
			{
				return false;
			}
		}

		public function getDataDiriKepsek($username){
			$query=$this->db->query("SELECT `ID_PTK`, `NAMA_PTK`, `AKSES_LEVEL`, `mst_ptk`.ID_SEKOLAH,`NAMA_SEKOLAH` 
				FROM `mst_ptk` inner join `pengguna` inner join `mst_sekolah` 
				WHERE `mst_ptk`.NUPTK_PTK = `pengguna`.USERNAME and `mst_ptk`.ID_SEKOLAH = `mst_sekolah`.ID_SEKOLAH and `USERNAME` = '$username' and `mst_ptk`.IS_FUNGSIONAL = 'Kepala Sekolah' ");

			
			if($query->num_rows() >0 )
			{
				$data=$query->result_array();
				return $data[0];
			}
			else
			{
				return false;
			}
		}

		public function getDataDiriAdminSekolah($username){
			$query=$this->db->query("SELECT `ID_PTK`, `NAMA_PTK`, `AKSES_LEVEL`, `mst_ptk`.ID_SEKOLAH,`NAMA_SEKOLAH` 
				FROM `mst_ptk` inner join `pengguna` inner join `mst_sekolah` 
				WHERE `mst_ptk`.NUPTK_PTK = `pengguna`.USERNAME and `mst_ptk`.ID_SEKOLAH = `mst_sekolah`.ID_SEKOLAH and `USERNAME` = '$username' and `mst_ptk`.IS_FUNGSIONAL = 'Staf Tata Usaha'");

			
			if($query->num_rows() >0 )
			{
				$data=$query->result_array();
				return $data[0];
			}
			else
			{
				return false;
			}
		}

		public function getDataDiriWaliKelas($username){
			$query=$this->db->query("SELECT `ID_ROMBEL`, `NAMA_ROMBEL`, `rombongan_belajar`.ID_SEKOLAH, `NAMA_SEKOLAH`,`ID_TAHUN_AJAR`, `TINGKAT_PENDIDIKAN`, `NAMA_ROMBEL`, `rombongan_belajar`.ID_PTK , `NAMA_PTK`, `USERNAME`, `AKSES_LEVEL`
				FROM `rombongan_belajar` inner join `mst_ptk`inner join `pengguna` inner join `mst_sekolah`
				WHERE `rombongan_belajar`.ID_PTK = `mst_ptk`.ID_PTK and `pengguna`.USERNAME = `mst_ptk`.NIP_PTK
				and `rombongan_belajar`.ID_SEKOLAH = `mst_sekolah`.ID_SEKOLAH
				and `USERNAME` = '$username'
				and `mst_ptk`.IS_FUNGSIONAL = 'Guru' ");

			
			if($query->num_rows() >0 )
			{
				$data=$query->result_array();
				return $data[0];
			}
			else
			{
				return false;
			}
		}

                
		function getAll_ptk() {
			$query=$this->db->query("SELECT `ID_PTK`, `mst_ptk`.ID_SEKOLAH, `NAMA_SEKOLAH`, `NIP_PTK`, `NUPTK_PTK`, `NIK_PTK`, 
				`NAMA_PTK`, `JK_PTK`, `TMPT_LHR_PTK`, `TGL_LHR_PTK`, `AGAMA_PTK`, `ALAMAT_PTK`, `NOTELP_PTK`, 
				`FOTO_PTK`, `IS_FUNGSIONAL` 
				FROM `mst_ptk` inner join `mst_sekolah` 
				WHERE  `mst_ptk`.ID_SEKOLAH = `mst_sekolah`.ID_SEKOLAH 
				order by id_ptk asc");
			return $query->result();
		}


		function doInsert_PTK($data) {

			return $this->db->insert('mst_ptk', $data);
		}

		function hapusDataPTK($id_ptk){
			$this->db->where('ID_PTK',$id_ptk);
			$this->db->delete('mst_ptk');
		}

		function editDataPTK($id_ptk) {
				$this->db->where('ID_PTK',$id_ptk);
				$query = $this->db->get('mst_ptk');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}
		
		function doEdit_DataPTK($id_ptk,$data) {
			$this->db->where('ID_PTK',$id_ptk);
			$this->db->update('mst_ptk',$data);
		}



		function getGuru_ByIdSekolah($id_sekolah){
			$query=$this->db->query("SELECT `ID_PTK`, `NIP_PTK`, `NUPTK_PTK`, `NAMA_PTK` 
				FROM `mst_ptk` inner join `mst_sekolah` 
				WHERE `mst_ptk`.ID_SEKOLAH = `mst_sekolah`.ID_SEKOLAH and `mst_ptk`.ID_SEKOLAH = '$id_sekolah' and `mst_ptk`.IS_FUNGSIONAL = 'Guru'  ");
			return $query->result();
		}

		function getMengajarKelas(){
			// tabel db : mengajar, master_ptk, pengguna
		}

		function getDataPenilaiGuru(){
			// tabel db : mengajar, master_ptk, rombongan_belajar, master_mapel, mst_tahun_ajar
		}

		function getMengajarMapel(){
			//tabel db : mengajar, master_ptk, master_mapel
		}

		function getList_PtkGuru_BySekolah($id_sekolah){
			$query=$this->db->query("SELECT `ID_PTK`, `NIP_PTK`, `NUPTK_PTK`, `NAMA_PTK` 
				FROM `mst_ptk` inner join `mst_sekolah` 
				WHERE `mst_ptk`.ID_SEKOLAH = `mst_sekolah`.ID_SEKOLAH and `mst_ptk`.ID_SEKOLAH = '$id_sekolah' ");
			return $query->result();
		}
                
                function getDataPtk($username){
			$query=$this->db->query("select * from mst_ptk where nip_ptk = '$username'");	
                        if($query->num_rows() >0 )
			{
				$data=$query->result_array();
				return $data[0];
			}
			else
			{
				return false;
			}                      
		}
	}
?>
