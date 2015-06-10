<?php
	class M_wilayah extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		public function getKota($id_pengguna){
			$query=$this->db->query("SELECT DISTINCT `pengguna`.kode_wilayah, `NAMA_WILAYAH` 
				from `pengguna` 
				inner join `mst_wilayah` 
				where `mst_wilayah`.kode_wilayah = `pengguna`.kode_wilayah 
					and `id_pengguna`= '$id_pengguna' ");
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

		function getWilayah() {
			$query=$this->db->query("SELECT * from `mst_wilayah` where `LEVEL_WILAYAH`=3 order by kode_wilayah asc");
			return $query->result();
		}

		public function getKecamatanList(){
			$query = $this->db->query("SELECT `KODE_WILAYAH`, `NAMA_WILAYAH` 
										from `mst_wilayah` 
										where `LEVEL_WILAYAH`=2 ");
		   	//return $query->result();
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		public function getDaftarKecamatan(){
			$query = $this->db->query("SELECT `KODE_WILAYAH`, `NAMA_WILAYAH` 
										from `mst_wilayah` 
										where `LEVEL_WILAYAH`=2 ");
		   	return $query->result();
		}

		function doInsert_kecamatan() {
			$data = array(
				'ID_KOTAKAB' => $this->input->post('id_kotakab'),
				'NAMA_KEC' => $this->input->post('nama_kec')
			);
			return $this->db->insert('MASTER_KECAMATAN', $data);
		}

		function edit_kecamatan($id_kec) {
				$this->db->where('ID_KEC',$id_kec);
				$query = $this->db->get('MASTER_KECAMATAN');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_kecamatan() {
			$id_kec = $this->input->post('id_kec');
			$data = array (
				'ID_KOTAKAB' => $this->input->post('id_kotakab'),
				'NAMA_KEC' => $this->input->post('nama_kec')
			);
			$this->db->where('ID_KEC',$id_kec);
			$this->db->update('MASTER_KECAMATAN',$data);
		}


		function doDelete_kecamatan($id_kec){
			$this->db->where('ID_KEC',$id_kec);
			$this->db->delete('MASTER_KECAMATAN');
		}

		
	
	}
?>
