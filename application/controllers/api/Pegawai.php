<?php

use Afif\Auth\AuthToken;
use chriskacerguis\RestServer\RestController;
use Firebase\JWT\JWT;

defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH . 'libraries/RestController.php';
//require APPPATH . 'libraries/Format.php';
require APPPATH . 'controllers/api/Auth.php';



class Pegawai extends Auth
{
    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Pegawai_models', 'pegawai');
        $this->load->model('User_models', 'user');
        if ($this->authtoken() == 'salah'){
            return $this->response(array('kode'=>'401', 'pesan'=>'signature tidak sesuai', 'data'=>[]), '401');
            die();
             }
        }
       
    


    public function index_post()
    {
        {
           
            $data = [
    
                'id_pegawai' => null,
                'nip' => ($this->input->post('nip')),
                'nama' => ($this->input->post('nama')),
                'email' => ($this->input->post('email')),
                'tgl_lahir' => ($this->input->post('tgl_lahir')),
                'jabatan' => ($this->input->post('jabatan')),
                'jumlah_cuti' =>'12'
                
                
            ];
            
          
    
            if ($this->pegawai->createPegawai($data)  > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'Data Pegawai Berhasil ditambahkan'
                ], RestController::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => false,
                    'data' => 'Data Pegawai Gagal Ditambahkan'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    public function Showbyid_get()
    { 
        { 
            $id = $this->get('id');
            if ($id === null){
            $pegawai = $this->pegawai->get_pegawai();
            }
            else {
                $pegawai = $this->pegawai->get_pegawai($id);
            }
    
    
            if($pegawai) {
                $this->response([
                    'status' => true,
                    'data' => $pegawai
                ], RestController::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'data' => 'id tidak Ditemukan'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    

    
}