<?php



class User_Models extends CI_Model
{
    public function get_user()
    {
        
        return $this->db->get('user')->result_array();
       
    }

    public function deleteUser($id= null)
    {
        $this->db->delete('user', ['id_user' => $id]);
        return $this->db->affected_rows();
    }

    public function createUser($data2)
    {
        $this->db->insert('user', $data2);
        return $this->db->affected_rows();
    }

    public function updateUser($data, $id)
    {
        $this->db->update('user', $data, ['id_pegawai' => $id]);
        return $this->db->affected_rows();
    }

    public function tampil_user()
    {
        $this->db->select('*');
        $query = $this->db->get_where('user', ['id_pegawai' => $this->session->userdata('id_pegawai')]);
        return $query->row_array();
    }

    public function is_valid() 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if(password_verify($password, $user['password'])) {
            return true;
        }
        
    }
}