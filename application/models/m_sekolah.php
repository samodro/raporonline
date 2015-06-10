<?php
	class M_sekolah extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_DataSekolah() {
			$query=$this->db->query("SELECT * FROM `mst_sekolah` order by id_sekolah asc");
			return $query->result();
		}

		function doInsert_dataSekolah($data) {

			return $this->db->insert('mst_sekolah', $data);
		}

		function edit_DataSekolah($id_sekolah) {
			$query=$this->db->query("SELECT `ID_SEKOLAH`, `mst_sekolah`.KODE_WILAYAH, `NAMA_WILAYAH`, `NPSN_SEKOLAH`, 
				`NSS_SEKOLAH`, `NAMA_SEKOLAH`, `ALAMAT_SEKOLAH`, `NOTELP_SEKOLAH` 
				FROM `mst_sekolah`inner join `mst_wilayah` 
				WHERE `mst_wilayah`.KODE_WILAYAH = `mst_sekolah`.KODE_WILAYAH
				and `mst_sekolah`.ID_SEKOLAH = '$id_sekolah' ");
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_DataSekolah($id_sekolah,$data) {
			$this->db->where('ID_SEKOLAH',$id_sekolah);
			$this->db->update('mst_sekolah',$data);
		}


		function hapusDataSekolah($id_sekolah){
			$this->db->where('ID_SEKOLAH',$id_sekolah);
			$this->db->delete('mst_sekolah');
		}

		function getListSekolah_byKota($asalKota){
			$query=$this->db->query("SELECT `ID_SEKOLAH`, `KODE_WILAYAH`, `NPSN_SEKOLAH`, `NSS_SEKOLAH`, 
				`NAMA_SEKOLAH`, `ALAMAT_SEKOLAH`, `NOTELP_SEKOLAH`, `WEB_SEKOLAH` 
				FROM `mst_sekolah` 
				WHERE `KODE_WILAYAH` LIKE '$asalKota%'");
			
			if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
			
			
		}

		function getDaftarSekolah_byKota($asalKota){
			$query=$this->db->query("SELECT `ID_SEKOLAH`, `KODE_WILAYAH`, `NPSN_SEKOLAH`, `NSS_SEKOLAH`, 
				`NAMA_SEKOLAH`, `ALAMAT_SEKOLAH`, `NOTELP_SEKOLAH`, `WEB_SEKOLAH` 
				FROM `mst_sekolah` 
				WHERE `KODE_WILAYAH` LIKE '$asalKota%'");
			
		
			
			return $query->result();
		}
	
	}
?>
