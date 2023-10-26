<?php


class Pegawai_models extends CI_Model
{

    public function tampil_profil()
    {
        $this->db->select('*');
        $query = $this->db->get_where('pegawai', ['nip' => $this->session->userdata('username')]);
        return $query->row_array();
    }

    public function data_cuti()
    {
        $this->db->select('*');
        $query = $this->db->get_where('cuti_pegawai', ['id_pegawai' => $this->session->userdata('id_pegawai')]);
        return $query->result();
        
    
    }

    public function all_data_karyawan()
    {
        $this->db->select('*');
        $query = $this->db->get_where('pegawai');
        return $query->result();
    }

    public function createPegawai($data)
    {
        $this->db->insert('pegawai', $data);
        return $this->db->affected_rows();
    }

    public function createUser($data2)
    {
        $this->db->insert('user', $data2);
        return $this->db->affected_rows();
    }

    public function get_pegawai($id = null)
    {
        if ($id === null){
        return $this->db->get('pegawai')->result_array();
        } else {
            return $this->db->get_where('pegawai', ['id_pegawai' => $id])->result_array();
        };
    }

    public function deletePegawai($id=null)
    {
        $this->db->delete('pegawai', ['id_pegawai' => $id]);
        return $this->db->affected_rows();
    }

    public function get_pegawai_id($customer_id){
        $query = $this->db->get_where('pegawai', array('id_pegawai' => $customer_id));
        return $query;
    }

    public function getById($id) {
        return $this->db->get_where('pegawai', ['id_pegawai' => $id])->row();
    }

    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
    }

    function update_data()
    {
		$data = [
            'email' => $this->input->post('email'),
            'jabatan' => $this->input->post('jabatan'),
            'nip' => $this->input->post('nip'),
            'tgl_lahir' => $this->input->post('tgl_lahir')
        ]; 

        $this->db->where('id_pegawai', $this->input->post('id_pegawai'));
        $this->db->update('pegawai', $data);
	}	

    
    public function fetch_data()
    {
    $this->db->order_by("id_pegawai", "DESC");
    $query = $this->db->get("pegawai");
     return $query->result();
    }

    public function updatecuti()
    {
        $sql = "UPDATE pegawai SET jumlah_cuti='12'";
        $this->db->query($sql);  
    }

    public function pegawaiSelect($username)
    {
        $this->db->select('*');
        $query = $this->db->get_where('pegawai', ['nip' => $username]);
        return $query->row_array();
    }
    



    

   
    





}   