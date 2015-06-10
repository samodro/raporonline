<?php
	class M_mapel extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_mapel() {
			$query=$this->db->query("select * from mst_mapel order by kode_mapel asc");
			return $query->result();
		}

		function getList_mapel() {
			$query=$this->db->query("select * from mst_mapel order by KODE_MAPEL asc");
			if($query ->num_rows > 0) 
			return $query->result();
			else
			return null;
		}

		function getList_ekstrakulikuler() {
			$query=$this->db->query("SELECT `KODE_MAPEL`, `NAMA_MAPEL` FROM `mst_mapel` WHERE `KODE_MAPEL` LIKE '8%'");
			return $query->result();
		}

		/*
		function getIdMapel(){
			$sql='SELECT KODE_MAPEL + 1 as id FROM mst_mapel
					ORDER BY KODE_MAPEL DESC
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
		*/

		function getDataMapel($kode_mapel){
			$sql="SELECT * from mst_mapel where KODE_MAPEL ='".$kode_mapel."'";
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

		function doInsert_mapel($data) {
			$this->db->insert('mst_mapel', $data);
		}

		function doEdit_mapel() {
			$kode_mapel = $this->input->post('kode_mapel');
			$data = array (
				'NAMA_MAPEL' => $this->input->post('nama_mapel')
			);
			$this->db->where('KODE_MAPEL',$kode_mapel);
			$this->db->update('mst_mapel',$data);
		}

		function doDelete_mapel($kode_mapel){
			$this->db->where('KODE_MAPEL',$kode_mapel);
			$this->db->delete('mst_mapel');
		}
		
	}
?>
