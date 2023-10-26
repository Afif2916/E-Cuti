<?php


class Cuti_models extends CI_Model
{

    private $_table = 'cuti_pegawai';

    
    public function data_cuti()
    {
        $this->db->select('*');
        $query = $this->db->get_where('cuti_pegawai', ['id_pegawai' => $this->session->userdata('id_pegawai')]);
        return $query->result();
        
    
    }

    public function all_data_cuti()
    {
        return $this->db->from('pegawai as g1')
          ->join('cuti_pegawai as g2', 'g1.id_pegawai=g2.id_pegawai', 'g1.id_pegawai=g2.id_pegawai')
          ->get()
          ->result();
    }

    public function find($id)
	{
		if (!$id) {
			return;
		}

		$query = $this->db->where($this->_table, array('id_cuti' => $id));
		return $query->row();
	}

  

    public function insert_cuti($cuti)
    {
      $this->db->insert('cuti_pegawai', $cuti);
    }

    public function disetujui($id)
    {
        
        $sql="UPDATE cuti_pegawai, pegawai SET cuti_pegawai.status_cuti='Disetujui', 
        pegawai.jumlah_cuti=pegawai.jumlah_cuti - cuti_pegawai.lama_cuti WHERE cuti_pegawai.id_cuti=$id AND pegawai.id_pegawai=cuti_pegawai.id_pegawai";
        
        
        $this->db->trans_start();
        $this->db->query($sql); 
        $this->db->trans_complete();    


    }

    public function ditolak($id)
    {
        $sql="UPDATE cuti_pegawai SET status_cuti='Ditolak' WHERE id_cuti=$id";

        $this->db->trans_start();
        $this->db->query($sql); 
        $this->db->trans_complete();    
    }

    public function get_cuti($id = null)
    {
        if ($id === null){
        return $this->db->get('cuti_pegawai')->result_array();
        } else {
            return $this->db->get_where('cuti_pegawai', ['id_pegawai' => $id])->result_array();
        };
    }

    public function deleteCuti($id =null)
    {
        $this->db->delete('cuti_pegawai', ['id_pegawai' => $id]);
        return $this->db->affected_rows();
    }

    function TampilCuti($id = null) 
    {
        
        
        if ($id === null){
        return $this->db->from('pegawai as g1')
          ->join('cuti_pegawai as g2', 'g1.id_pegawai=g2.id_pegawai')
          ->get()
          ->result();
        } else {
            return $this->db->from('pegawai as g1')
          ->join('cuti_pegawai as g2', 'g1.id_pegawai=g2.id_pegawai')
          ->where( ['id_cuti' => $id])
          ->get()
          ->result();
        }
    }  

    function TampilCutibynippegawai($id = null) 
    {
        
        
        if ($id === null){
        return $this->db->from('pegawai as g1')
          ->join('cuti_pegawai as g2', 'g1.id_pegawai=g2.id_pegawai')
          ->get()
          ->result();
        } else {
            return $this->db->from('pegawai as g1')
          ->join('cuti_pegawai as g2', 'g1.id_pegawai=g2.id_pegawai')
          ->where( ['nip' => $id])
          ->get()
          ->result();
        }
    }  

    function TampilCutibyStatus($status = null) 
    {
        
        
        if ($status === null){
        return $this->db->from('pegawai as g1')
          ->join('cuti_pegawai as g2', 'g1.id_pegawai=g2.id_pegawai')
          ->get()
          ->result();
        } else {
            return $this->db->from('pegawai as g1')
          ->join('cuti_pegawai as g2', 'g1.id_pegawai=g2.id_pegawai')
          ->where( ['status_cuti' => $status])
          ->get()
          ->result();
        }
    }  

    public function deleteCutibyId($id =null)
    {
        $this->db->delete('cuti_pegawai', ['id_cuti' => $id]);
        return $this->db->affected_rows();
    }

    public function updateCuti($data, $id)
    {
        
        $this->db->where('id_cuti', $id);
        $this->db->update('cuti_pegawai','pegawai', $data);

        return $this->db->affected_rows();
    }


    public function tampilCutis()
    {
        return $this->db->from('pegawai as g1')
          ->join('cuti_pegawai as g2', 'g1.id_pegawai=g2.id_pegawai', 'g1.id_pegawai=g2.id_pegawai')
          ->where(['g1.id_pegawai' => $this->session->userdata('id_pegawai')])
          ->get()
          ->result();
    }
    






}   