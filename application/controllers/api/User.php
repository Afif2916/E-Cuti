<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';


class User extends RestController
{
    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('User_models', 'user');
        
    }


    public function index_get()
    { 
        $id = $this->get('id');
        if ($id === null){
        $user = $this->user->get_user();
        }
        else {
            $user = $this->user->get_user($id);
        }


        if($user) {
            $this->response([
                'status' => true,
                'data' => $user
            ], RestController::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'data' => 'id tidak Ditemukan'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id_user');

        if($id === null){
            $this->response([
                'status' => false,
                'data' => 'Tolong Masukan ID'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->user->deleteUser($id) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'User sudah Di Hapus'
                ], RestController::HTTP_NOT_FOUND);
            } else {
                //idnotfound
                $this->response([
                    'status' => false,
                    'data' => 'ID tidak Ditemukan'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {

       
        $data2 = [
            'id_user' => null,
            'id_pegawai' => $this->db->insert_id(),
            'username' => $this->input->post('nip'),
            'password' => '1234',
            'role' => '3'
    ];

        if ($this->user->createUser($data2) > 0) {
            $this->response([
                'status' => true,
                'message' => 'User Berhasil ditambahkan'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'data' => 'User Gagal Ditambahkan'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $data = [
            
           
            'nama' => $this->put('nama'),
            'password' => $this->put('password'),
            
    ];

    if ($this->user->updateUser($data) > 0) {
        $this->response([
            'status' => true,
            'message' => 'User Berhasil diupdate'
        ], RestController::HTTP_CREATED);
    }else {
        $this->response([
            'status' => false,
            'message' => 'User Gagal diupdate'
        ], RestController::HTTP_BAD_REQUEST);
    }
    }

    public function Login_post()
    {
        //$this->load->model('auth_models');
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['nip' => $nip])->row_array();
        



        //user dan password benar
        if($user) {

            //cek password
            if(password_verify($password, $user['password'])) {
                $data =[
                    'id_pegawai' => $user['id_pegawai'],
                    'nip' => $user['nip'],
                    'role' => $user['role']];
                $this->session->set_userdata($data);
                switch($user['role']) {
                    case $user['role'] == 1:
                        $this->response([
                            'status' => true,
                            'data' => 'Login Berhasil'
                        ], RestController::HTTP_OK);
                        break;
                    case $user['role'] == 2:
                        $this->response([
                            'status' => true,
                            'data' => 'Login Berhasil'
                        ], RestController::HTTP_OK);
                        break;
                    case $user['role'] == 3:
                        $this->response([
                            'status' => true,
                            'data' => 'Login Berhasil'
                        ], RestController::HTTP_OK);
                        break;    
                }
                

            } else {
                $this->response([
                    'status' => false,
                    'data' => 'Tolong Masukan Password'
                ], RestController::HTTP_BAD_REQUEST);
            }


        } else {
            $this->response([
                'status' => false,
                'data' => 'NIP tidak Terdaftar'
            ], RestController::HTTP_NOT_FOUND);
        }
        
    }

    
}
?>