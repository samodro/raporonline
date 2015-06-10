<?php
	class M_pd extends CI_Model {

		public function __construct() {
			$this->load->database();
			
		}

		function getAll_DataSiswa() {
			$query=$this->db->query("SELECT `ID_SISWA`, `mst_siswa`.ID_SEKOLAH, `NAMA_SEKOLAH`, `ID_ORTU`, `NIS_SISWA`, 
				`NISN_SISWA`, `NAMA_SISWA`, `ALAMAT_SISWA`, `NOTELP_SISWA`, `JK_SISWA`, `TMPT_LHR_SISWA`, 
				`TGL_LHR_SISWA`, `AGAMA_SISWA`, `STATUS_DLM_KELUARGA`, `ANAK_KE`, `DITERIMA_PD_KELAS`, 
				`DITERIMA_PD_TGL`, `SEKOLAH_ASAL`, `FOTO_SISWA` 
				FROM `mst_siswa` inner join `mst_sekolah` 
				WHERE `mst_siswa`.ID_SEKOLAH = `mst_sekolah`.ID_SEKOLAH
				order by id_siswa asc");
			return $query->result();
		}
                
                

		function hapusDataPesertaDidik($id_siswa){
			$this->db->where('ID_SISWA',$id_siswa);
			$this->db->delete('mst_siswa');
		}

		function doInsert_dataPesertaDidik($data) {

			return $this->db->insert('mst_siswa', $data);
		}

		function edit_DataPesertaDidik($id_siswa) {
				$this->db->where('ID_SISWA',$id_siswa);
				$query = $this->db->get('mst_siswa');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_DataPesertaDidik($id_siswa,$data) {
			$this->db->where('ID_SISWA',$id_siswa);
			$this->db->update('mst_siswa',$data);
		}


		function doDelete_pd($id_pd){
			$this->db->where('ID_PD',$id_pd);
			$this->db->delete('mst_siswa');
		}

		function getDetailById($id_pd)
		{
			$id_pd = $this->input->post('id_pd');
			$data = array (
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'ID_KEHADIRAN' => $this->input->post('id_kehadiran'),
				'ID_ORTU' => $this->input->post('id_ortu'),
				'ID_WALI' => $this->input->post('id_wali'),
				'NIS' => $this->input->post('nis'),
				'NISN' => $this->input->post('nisn'),
				'NAMA_PD' => $this->input->post('nama_pd'),
				'ALAMAT_PD' => $this->input->post('alamat_pd'),
				'NO_TELP_PD' => $this->input->post('no_telp_pd'),
				'FOTO_PD' => $this->input->post('foto_pd'),
				'JK_PD' => $this->input->post('jk_pd'),
				'TMPT_LHR_PD' => $this->input->post('tmpt_lhr_pd'),
				'TGL_LHR_PD' => $this->input->post('tgl_lhr_pd'),
				'STATUS_DLM_KELUARGA' => $this->input->post('status_dlm_keluarga'),
				'AGAMA_PD' => $this->input->post('agama_pd'),
				'ANAK_KE' => $this->input->post('anak_ke'),
				'DITERIMA_PD_KELAS' => $this->input->post('diterima_pd_kelas'),
				'DITERIMA_PD_TGL' => $this->input->post('diterima_pd_tgl'),
				'SEKOLAH_ASAL' => $this->input->post('sekolah_asal')
			);
		}

		function get_data_diri_siswa($username) {
			
			$query=$this->db->query("SELECT `mst_siswa`.ID_SEKOLAH, `NAMA_SEKOLAH`, 
											`rombongan_belajar`.ID_ROMBEL, `NAMA_ROMBEL`, 
											`rombongan_belajar`.ID_TAHUN_AJAR, `SEMESTER`, `NAMA_TAHUN_AJAR`, 
											`NAMA_SISWA`, `AKSES_LEVEL`  
									from `mst_sekolah`, 
										 `mst_siswa` , 
										 `rombongan_belajar`, 
										 `mst_tahun_ajar`,
										 `pengguna`
									where `mst_sekolah`.ID_SEKOLAH = `rombongan_belajar`.ID_SEKOLAH 
											and `rombongan_belajar`.ID_TAHUN_AJAR = `mst_tahun_ajar`.ID_TAHUN_AJAR
											and `mst_siswa`.nisn_siswa = '$username' and `mst_siswa`.nisn_siswa = `pengguna`.USERNAME ");
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

		function getDetail($id_pd)
		{
			$this->db->where('ID_PD',$id_pd);
				$query = $this->db->get('mst_siswa');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function getList_siswaBySekolah($id_sekolah){
			$query=$this->db->query("SELECT `ID_SISWA`, `NIS_SISWA`, `NISN_SISWA`, `NAMA_SISWA`
				FROM `mst_siswa` inner join `mst_sekolah`
				WHERE `mst_siswa`.ID_SEKOLAH = `mst_sekolah`.ID_SEKOLAH
				and `mst_siswa`.ID_SEKOLAH  = '$id_sekolah' ");
			return $query->result();
		}
                
                /*
                function getList_siswaByRombel($id_rombel){
			$query=$this->db->query("SELECT * from rombongan_belajar rb, riwayat_kelas rk, mst_siswa ms "
                                . "             where rb.id_rombel = rk.id_rombel and rk.id_siswa = ms.id_siswa and rb.id_rombel = '$id_rombel'");
			return $query->result();
		}*/

		function doInsert_PesertaDidik($data, $id_sekolah) {
			$query=$this->db->query("INSERT INTO `mst_siswa` (`ID_SISWA`, `ID_SEKOLAH`, `ID_ORTU`, `NIS_SISWA`, 
				`NISN_SISWA`, `NAMA_SISWA`, `ALAMAT_SISWA`, `NOTELP_SISWA`, `JK_SISWA`, `TMPT_LHR_SISWA`, 
				`TGL_LHR_SISWA`, `AGAMA_SISWA`, `STATUS_DLM_KELUARGA`, `ANAK_KE`, `DITERIMA_PD_KELAS`, 
				`DITERIMA_PD_TGL`, `SEKOLAH_ASAL`, `FOTO_SISWA`) 
			VALUES '$data' WHERE `ID_SEKOLAH` = '$id_sekolah' ");
			return $query->result();
		}

	}
?>
