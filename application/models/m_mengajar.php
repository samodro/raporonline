<?php
	class M_mengajar extends CI_Model {

		function getMapel($username){
			$sql="select * from mst_ptk mp, pengguna p, mengajar m, mst_mapel mm "
                                . "where p.username = mp.nip_ptk and mp.id_ptk = m.id_ptk "
                                . "and mm.kode_mapel = m.kode_mapel and "
                                . "p.username = '$username'";
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
                
                function getMapel2($username){
			$sql="select distinct * from mst_ptk mp, pengguna p, mengajar m, mst_mapel mm "
                                . "where p.username = mp.nip_ptk and mp.id_ptk = m.id_ptk "
                                . "and mm.kode_mapel = m.kode_mapel and "
                                . "p.username = '$username'";
			$query = $this->db->query($sql);
                        return $query->result();
		}
	}
?>
