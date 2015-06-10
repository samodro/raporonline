<?php
	class M_penilaian extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_nilai() {
			$query=$this->db->query("select * from master_deskripsi_nilai order by id_master_deskripsi_nilai asc");
			return $query->result();
		}                                
                
                function getListEkskul() {
                        $query=$this->db->query("select * from mst_mapel mm, mst_penilaian mp where mp.kode_mapel = mm.kode_mapel and kode_penilaian like '8%'");
			return $query->result();
                }
                function getListIndikator_penilaian($kode_mapel, $level){
                        $query = $this->db->query("select * from mst_penilaian where kode_mapel = '$kode_mapel' and level_penilaian = '$level' ");
                        return $query->result();
                }
                
                function getListIndikator_penilaianparent($kode_mapel, $level, $parent){
                        $query = $this->db->query("select * from mst_penilaian where kode_mapel = '$kode_mapel' and level_penilaian = '$level' and kode_jenis_penilaian like '$parent%' ");
                        return $query->result();
                }
                
                function getPenilaian($mapel, $kode_jenis_penilaian)
                {
                    $query = $this->db->query("select * from mst_penilaian where kode_mapel = '$mapel' and kode_jenis_penilaian = '$kode_jenis_penilaian' ");
                    $data=$query->result_array();
                    return $data[0];
                }

		function doInsert_nilai() {
			$data = array(
				'NILAI_DESKRIPSI' => $this->input->post('nilai_deskripsi'),
				'KETERANGAN_DESKRIPSI' => $this->input->post('keterangan_deskripsi')
			);
			return $this->db->insert('MASTER_DESKRIPSI_NILAI', $data);
		}

		function edit_nilai($id_master_deskripsi_nilai) {
				$this->db->where('ID_MASTER_DESKRIPSI_NILAI',$id_master_deskripsi_nilai);
				$query = $this->db->get('MASTER_DESKRIPSI_NILAI');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_nilai() {
			$id_master_deskripsi_nilai = $this->input->post('id_master_deskripsi_nilai');
			$data = array (
				'NILAI_DESKRIPSI' => $this->input->post('nilai_deskripsi'),
				'KETERANGAN_DESKRIPSI' => $this->input->post('keterangan_deskripsi')
			);
			$this->db->where('ID_MASTER_DESKRIPSI_NILAI',$id_master_deskripsi_nilai);
			$this->db->update('MASTER_DESKRIPSI_NILAI',$data);
		}


		function doDelete_nilai($id_master_deskripsi_nilai){
			$this->db->where('ID_MASTER_DESKRIPSI_NILAI',$id_master_deskripsi_nilai);
			$this->db->delete('MASTER_DESKRIPSI_NILAI');
		}

		
	}
?>
