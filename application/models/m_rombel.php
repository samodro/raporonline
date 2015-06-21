<?php
	class M_rombel extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getList_siswaKelas($id_rombel){
			$query=$this->db->query("SELECT `ID_RIWAYAT`, `riwayat_kelas`.ID_ROMBEL, `riwayat_kelas`.ID_SISWA,
				`NAMA_SISWA`, `NIS_SISWA`, AGAMA_SISWA, NISN_SISWA
				FROM `riwayat_kelas` inner join `mst_siswa` inner join `rombongan_belajar` 
				WHERE `riwayat_kelas`.ID_SISWA = `mst_siswa`.ID_SISWA and 
				`rombongan_belajar`.ID_ROMBEL = `riwayat_kelas`.ID_ROMBEL
				and `rombongan_belajar`.ID_ROMBEL  = '$id_rombel' ");
			return $query->result();
		}
                
               /* function getList_siswaKelas($id_rombel){
			$query=$this->db->query("select * from riwayat_kelas rk, mst_siswa ms, rombongan_belajar rb where rk.id_rombel "
                                . "= rb.id_rombel and rk.id_siswa = ms.id_siswa and rb.id_rombel = '$id_rombel' ");
			return $query->result();
		}*/
               
                function getList_MapelKurikulumSiswa($username, $kurikulum){
			$query=$this->db->query("select * from riwayat_kelas rk, "
                                . "mst_siswa ms, rombongan_belajar rb, "
                                . "mst_tahun_ajar mta , mengajar m, mst_kurikulum mk, mst_mapel mm "
                                . "where ms.id_siswa = rk.id_siswa and ms.nisn_siswa = '$username' "
                                . "and rb.id_rombel = rk.id_rombel and mta.id_tahun_ajar = "
                                . "rb.id_tahun_ajar and mta.id_kurikulum = mk.id_kurikulum "
                                . "and m.id_rombel = rk.id_rombel and m.id_rombel = rb.id_rombel "
                                . "and mm.kode_mapel = m.kode_mapel "
                                . "and mk.nama_kurikulum like '%$kurikulum%'");
			return $query->result();
		}
                



		function getIdRombel(){
			$sql='SELECT ID_ROMBEL + 1 as id FROM rombongan_belajar
					ORDER BY ID_ROMBEL DESC
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

		function getIdMengajar(){
			$sql='SELECT ID_MENGAJAR + 1 as id FROM mengajar
					ORDER BY ID_MENGAJAR DESC
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
		
		public function getRombel_ByWaliKelas($username){
			$query=$this->db->query("SELECT `ID_ROMBEL`, `rombongan_belajar`.ID_SEKOLAH, `NAMA_SEKOLAH`,`ID_TAHUN_AJAR`, `TINGKAT_PENDIDIKAN`, `NAMA_ROMBEL`, `rombongan_belajar`.ID_PTK , `NAMA_PTK`, `USERNAME`, `AKSES_LEVEL`
FROM `rombongan_belajar` inner join `mst_ptk`inner join `pengguna` inner join `mst_sekolah`
WHERE `rombongan_belajar`.ID_PTK = `mst_ptk`.ID_PTK and `pengguna`.USERNAME = `mst_ptk`.NIP_PTK
and `rombongan_belajar`.ID_SEKOLAH = `mst_sekolah`.ID_SEKOLAH
				and `USERNAME` = '$username' ");

			
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
                
                public function getRombel_ByPengajar($username)
                {
                    $query=$this->db->query("select distinct rb.* from mengajar m, pengguna p, mst_ptk mp, rombongan_belajar rb 
                        where p.username = mp.nip_ptk and mp.id_ptk = m.id_ptk 
                        and m.id_rombel = rb.id_rombel 
				and `USERNAME` = '$username' ");

                    return $query->result();
			
                }
                
                public function getRombel_ByPengajarMapel($username, $kode_mapel)
                {
                    $query=$this->db->query("select distinct rb.* from mengajar m, pengguna p, mst_ptk mp, rombongan_belajar rb 
                        where p.username = mp.nip_ptk and mp.id_ptk = m.id_ptk 
                        and m.id_rombel = rb.id_rombel 
				and `USERNAME` = '$username' and m.kode_mapel = '$kode_mapel' ");

                    return $query->result();
                }

		public function getMengajar_ByIdSekolah($id_sekolah){
			$query=$this->db->query("SELECT `ID_MENGAJAR`, `mengajar`.ID_ROMBEL, `NAMA_ROMBEL`, `mengajar`.KODE_MAPEL, `NAMA_MAPEL`, `mengajar`.ID_PTK, `NAMA_PTK`, `KKM_NILAI` 
			FROM `mengajar` inner  join `mst_ptk` inner join `mst_mapel` inner join `rombongan_belajar`
			WHERE `mengajar`.ID_ROMBEL = `rombongan_belajar`.ID_ROMBEL and
			`mst_ptk`.ID_PTK = `mengajar`.ID_PTK and
			`mst_mapel`.KODE_MAPEL = `mengajar`.KODE_MAPEL
							and `rombongan_belajar`.ID_SEKOLAH= '$id_sekolah' ");
			return $query->result();
		}
		

		function getDataRombel_ById($id_rombel){
			$sql='SELECT * from rombongan_belajar where ID_ROMBEL ='.$id_rombel;
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
                
                function getDataRombelAll_ById($id_rombel){
			$sql='select distinct * from rombongan_belajar rb, mst_tahun_ajar ta,mst_kurikulum mk '
                                . 'where rb.id_tahun_ajar = ta.id_tahun_ajar and mk.id_kurikulum = ta.id_kurikulum  '
                                . 'and rb.ID_ROMBEL ='.$id_rombel;
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

		function getDataMengajar_ById($id_mengajar){
			$sql='SELECT * from mengajar where ID_MENGAJAR ='.$id_mengajar;
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

		function hapusDataRombel($id_rombel){
			$this->db->where('ID_ROMBEL',$id_rombel);
			$this->db->delete('rombongan_belajar');
		}

		
		function getAll_RombelByIdSekolah($id_sekolah){
			$query=$this->db->query("SELECT `ID_ROMBEL`,`NAMA_ROMBEL`, `rombongan_belajar`.ID_SEKOLAH, 
				`mst_kurikulum`.ID_KURIKULUM, `NAMA_KURIKULUM`, `rombongan_belajar`.ID_TAHUN_AJAR, 
				`NAMA_TAHUN_AJAR`, `SEMESTER`, `TINGKAT_PENDIDIKAN`, `rombongan_belajar`.ID_PTK, `NAMA_PTK` 
				FROM `rombongan_belajar` 
				inner join `mst_tahun_ajar` 
				inner join `mst_kurikulum` 
				inner join `mst_ptk` 
				WHERE `mst_tahun_ajar`.ID_TAHUN_AJAR = `rombongan_belajar`.ID_TAHUN_AJAR 
				and `mst_tahun_ajar`.ID_KURIKULUM = `mst_kurikulum`.ID_KURIKULUM 
				and `mst_ptk`.ID_PTK = `rombongan_belajar`.ID_PTK 
				and `rombongan_belajar`.ID_SEKOLAH = `mst_ptk`.ID_SEKOLAH 
				and `rombongan_belajar`.ID_SEKOLAH= '$id_sekolah' and `mst_ptk`.IS_FUNGSIONAL = 'Guru' ");
			return $query->result();
		}

		function doDelete_rombel($id_rombel){
			$this->db->where('ID_ROMBEL',$id_rombel);
			$this->db->delete('rombongan_belajar');
		}

		function doInsert_rombel($data) {
			$this->db->insert('rombongan_belajar', $data);
		}

		function doInsert_DataMengajar($data) {
			$this->db->insert('mengajar', $data);
		}

		function doEdit_rombel($id_rombel,$data) {
			$id_rombel = $this->input->post('id_rombel');
			$data = array (
				'ID_SEKOLAH' => $this->input->post('id_sekolah'),
			'ID_TAHUN_AJAR' => $this->input->post('id_tahun_ajar'),
			'TINGKAT_PENDIDIKAN' => $this->input->post('tingkat_pendidikan'),
			'NAMA_ROMBEL' => $this->input->post('nama_rombel'),
			'ID_PTK' => $this->input->post('id_ptk')
			);
			$this->db->where('ID_ROMBEL',$id_rombel);
			$this->db->update('rombongan_belajar',$data);
		}
		
		
	}
?>
