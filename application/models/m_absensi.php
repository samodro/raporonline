<?php
	class M_absensi extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_DataAbsensi() {
			$query=$this->db->query("SELECT * from mst_absensi order by ID_ABSENSI asc");
			return $query->result();
		}

		function getIdAbsensi(){
			$sql='SELECT ID_ABSENSI + 1 as id FROM mst_absensi
					ORDER BY ID_ABSENSI DESC
					LIMIT 1';
			$query = $this->db->query($sql);
			 if($query->num_rows() >0 )
			{
				$data=$query->result_array();
				return $data;
			}
			else
			{
				return false;
			}
		}

		function getDataAbsensi($id_absensi){
			$sql='SELECT * from mst_absensi where ID_ABSENSI ='.$id_absensi;
			$query = $this->db->query($sql);
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

		function doInsert_absensi($data) {
			$this->db->insert('mst_absensi', $data);
		}

		function doEdit_absensi() {
			$id_absensi = $this->input->post('id_absensi');
			$data = array (
				'JENIS_ABSENSI' => $this->input->post('jenis_absensi'),
				'KETERANGAN_ABSENSI' => $this->input->post('keterangan_absensi')
			);
			$this->db->where('ID_ABSENSI',$id_absensi);
			$this->db->update('mst_absensi',$data);
		}

		function doDelete_absensi($id_absensi){
			$this->db->where('ID_ABSENSI',$id_absensi);
			$this->db->delete('mst_absensi');
		}

		function doInsert_kehadiranSiswa($data, $id_rombel, $id_riwayat) {
			$this->db->insert('kehadiran_siswa', $data,  $id_riwayat);
		}

		function getKehadiranSiswa_ByRombel($id_rombel){
			$query=$this->db->query("SELECT `ID_KEHADIRAN`, `riwayat_kelas`.ID_ROMBEL, `kehadiran_siswa`.ID_RIWAYAT, `riwayat_kelas`.ID_SISWA, `NAMA_SISWA`, `kehadiran_siswa`.ID_ABSENSI, `JENIS_ABSENSI`, `JUMLAH` 
				FROM `kehadiran_siswa` inner join `mst_absensi` inner join `riwayat_kelas`inner join `mst_siswa` inner join `rombongan_belajar`
				WHERE `kehadiran_siswa`.ID_ABSENSI = `mst_absensi`.ID_ABSENSI
				and `riwayat_kelas`.ID_RIWAYAT = `kehadiran_siswa`.ID_RIWAYAT
				and `riwayat_kelas`.ID_SISWA = `mst_siswa`.ID_SISWA
				and `rombongan_belajar`.ID_ROMBEL = `riwayat_kelas`.ID_ROMBEL
				and `rombongan_belajar`.ID_ROMBEL  = '$id_rombel' ");
			return $query->result();
			
		}
	}
?>
