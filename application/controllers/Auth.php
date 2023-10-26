<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    

	public function index()
	{
        $this->form_validation->set_rules('username', 'Username', 'trim|required' );
        $this->form_validation->set_rules('password', 'Password', 'trim|required' );
        
        if($this->form_validation->run() == false) {
        $data['title'] = 'Login Page';
        $this->load->view('template/header', $data);
		$this->load->view('auth/login');
        $this->load->view('template/footer');
        } else {
            $this->_login();
        }
	}

    public function _login()
    {
        //$this->load->model('auth_models');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
    



        //user dan password benar
        if($user) {

            //cek password
            if(password_verify($password, $user['password'])) {
                $data =[
                    'id_pegawai' => $user['id_pegawai'],
                    'username' => $user['username'],
                    'role' => $user['role']];
                $this->session->set_userdata($data);
                switch($user['role']) {
                    case $user['role'] == 1:
                        redirect('supervisor');
                        break;
                    case $user['role'] == 2:
                        redirect('admin');
                        break;
                    case $user['role'] == 3:
                        redirect('user');
                        break;    
                }
                

            } else {
                $this->session->set_flashdata ('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
            redirect('auth');
            }


        } else {
            $this->session->set_flashdata ('message', '<div class="alert alert-danger" role="alert">Username/Nip tidak terdaftar!</div>');
            redirect('auth');
        }
        
    }

    public function logout()
    {
        $this->session->unset_userdata('nip');
        

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Andah telah Logout</div>');
        redirect('auth');
    }


    

  
}
