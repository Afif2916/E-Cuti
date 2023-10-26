<?php


class Auth_models extends CI_Model
{
    private $_table = "user";

    public function login($username, $password)
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['nip' => $nip])->row_array();

          //user dan password benar
        if($user) {
       
            //cek password
            if($password == $user['password']) {
                $data =[
                    'nip' => $user['nip']];
                $this->session->set_userdata($data);
                redirect('auth');

           } else {
               $this->session->set_flashdata ('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
            redirect('auth');
            }


        } else {
            $this->session->set_flashdata ('message', '<div class="alert alert-danger" role="alert">Username/Nip tidak terdaftar!</div>');
            redirect('auth');
        }
    }

}





?>