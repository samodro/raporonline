<?php
	class M_prestasi extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getIdPrestasi(){
			$sql='SELECT ID_PRESTASI + 1 as id FROM prestasi
					ORDER BY ID_PRESTASI DESC
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

		function getAll_DataPrestasi() {
			$query=$this->db->query("SELECT * from prestasi order by ID_PRESTASI asc");
			return $query->result();
		}

		function getDataJenisPrestasi($id_prestasi){
			$sql='SELECT * from prestasi where ID_PRESTASI ='.$id_prestasi;
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

		function doEdit_jenisPrestasi() {
			$id_prestasi = $this->input->post('id_prestasi');
			$data = array (
				'JENIS_PRESTASI' => $this->input->post('jenis_prestasi')
			);
			$this->db->where('ID_PRESTASI',$id_prestasi);
			$this->db->update('prestasi',$data);
		}

		function doInsert_jenisPrestasi($data) {
			$this->db->insert('prestasi', $data);
		}

		function doDelete_jenisPrestasi($id_prestasi){
			$this->db->where('ID_PRESTASI',$id_prestasi);
			$this->db->delete('prestasi');
		}
		
	}
?>
