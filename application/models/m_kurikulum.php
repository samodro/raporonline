<?php
	class M_kurikulum extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_kurikulum() {
			$query=$this->db->query("select * from mst_kurikulum order by id_kurikulum asc");
			return $query->result();
		}

		function getAll_tahunAjar() {
			$query=$this->db->query("SELECT `ID_TAHUN_AJAR`, `mst_tahun_ajar`.ID_KURIKULUM, `NAMA_KURIKULUM` , `SEMESTER`, `NAMA_TAHUN_AJAR`, `TAHUN_AWAL`, `TAHUN_AKHIR`
			 FROM `mst_tahun_ajar` inner join `mst_kurikulum` 
				WHERE `mst_tahun_ajar`.ID_KURIKULUM = `mst_kurikulum`.ID_KURIKULUM 
				order by id_tahun_ajar asc");
			return $query->result();
		}

		function getIdKurikulum(){
			$sql='SELECT ID_KURIKULUM + 1 as id FROM mst_kurikulum
					ORDER BY ID_KURIKULUM DESC
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

		function getIdTahunAjar(){
			$sql='SELECT ID_TAHUN_AJAR + 1 as id FROM mst_tahun_ajar
					ORDER BY ID_TAHUN_AJAR DESC
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

		function getDataKurikulum($id_kurikulum){
			$sql='SELECT * from mst_kurikulum where ID_KURIKULUM ='.$id_kurikulum;
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

		function getDataTahunAjar($id_tahun_ajar){
			$sql='SELECT * from mst_tahun_ajar where ID_TAHUN_AJAR ='.$id_tahun_ajar;
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

		function doInsert_kurikulum($data) {
			$this->db->insert('mst_kurikulum', $data);
		}

		function doInsert_TahunAjar($data) {
			$this->db->insert('mst_tahun_ajar', $data);
		}

		function edit_kurikulum($id_master_kurikulum) {
				$this->db->where('ID_MASTER_KURIKULUM',$id_master_kurikulum);
				$query = $this->db->get('MASTER_KURIKULUM');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}


		function doEdit_kurikulum() {
			$id_master_kurikulum = $this->input->post('nama_syarat');
			$data = array (
				'NAMA_KURIKULUM' => $this->input->post('nama_kurikulum')
			);
			$this->db->where('ID_KURIKULUM',$id_master_kurikulum);
			$this->db->update('MST_KURIKULUM',$data);
		}

		function doEdit_tahunAjar() {
			$id_tahun_ajar = $this->input->post('id_tahun_ajar');
			$data = array (
				'ID_KURIKULUM' => $this->input->post('id_kurikulum'),
				'SEMESTER' => $this->input->post('semester'),
				'NAMA_TAHUN_AJAR' => $this->input->post('nama_tahun_ajar'),
				'TAHUN_AWAL' => $this->input->post('tahun_awal'),
				'TAHUN_AKHIR' => $this->input->post('tahun_akhir')
			);
			$this->db->where('ID_TAHUN_AJAR',$id_tahun_ajar);
			$this->db->update('mst_tahun_ajar',$data);
		}


		function doDelete_kurikulum($id_master_kurikulum){
			$this->db->where('ID_KURIKULUM',$id_master_kurikulum);
			$this->db->delete('MST_KURIKULUM');
		}

		function doDelete_tahunAjar($id_tahun_ajar){
			$this->db->where('ID_TAHUN_AJAR',$id_tahun_ajar);
			$this->db->delete('mst_tahun_ajar');
		}
	
	}
?>
