<?php

use Afif\Auth\AuthToken;

defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH . '/libraries/RestController.php';
//require APPPATH . '/libraries/Format.php';
//require APPPATH . '/libraries/Key.php';
//require APPPATH . '/libraries/JWT.php';
//require APPPATH . '/libraries/ExpiredException.php';
//require APPPATH . '/libraries/BeforeValidException.php';
//require APPPATH . '/libraries/SignatureInvalidException.php';
//require APPPATH . '/libraries/JWK.php';
require APPPATH . 'controllers/api/Auth.php';



use chriskacerguis\RestServer\RestController;
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;
use Firebase\JWT\Key;

class Cuti_Pegawai extends Auth

{

   

    
    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Cuti_models', 'cuti');
        $this->load->model('Pegawai_models');
        $this->load->model('User_models', 'user');
        $this->load->library('form_validation');
        if ($this->authtoken() == 'salah'){
            return $this->response(array('kode'=>'401', 'pesan'=>'signature tidak sesuai', 'data'=>[]), '401');
            die();
        }
    }

   

    

    public function Showbyid_get()
    {
        
         
            $id = $this->get('id');
            if ($id === null){
            $cuti = $this->cuti->TampilCuti();
            }
            else {
                $cuti = $this->cuti->TampilCuti($id);
              
            }
    
    
            if($cuti) {
                $this->response([
                    'status' => true,
                    'data' => $cuti
                ], RestController::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'data' => $cuti
                ], RestController::HTTP_NOT_FOUND);
            }
        
    }

    public function Showbynippegawai_get()
    {
        
         
            $id = $this->get('nip');
            if ($id === null){
            $cuti = $this->cuti->TampilCutinipidpegawai();
            }
            else {
                $cuti = $this->cuti->TampilCutibynippegawai($id);
              
            }
    
    
            if($cuti) {
                $this->response([
                    'status' => true,
                    'data' => $cuti
                ], RestController::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'data' => $cuti
                ], RestController::HTTP_NOT_FOUND);
            }
        
    }

    public function Showbystatus_get()
    {
        
         
            $status = $this->get('status');
            if ($status === null){
            $cuti = $this->cuti->TampilCutibyStatus();
            }
            else {
                $cuti = $this->cuti->TampilCutibyStatus($status);
              
            }
    
    
            if($cuti) {
                $this->response([
                    'status' => true,
                    'data' => $cuti
                ], RestController::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'data' => $cuti
                ], RestController::HTTP_NOT_FOUND);
            }
        
    }

    public function pengajuan_cuti_post()
    {
        if ($this->form_validation->run() == false) {
            
        $data2 = [
            'id_cuti' => null,
            'id_pegawai' => $this->input->post('id_pegawai'),
            'jenis_cuti' => $this->input->post('jenis_cuti'),
            'lama_cuti' => $this->input->post('lama_cuti'),
            'dari_tanggal' => $this->input->post('dari_tanggal'),
            'sampai_tanggal' =>$this->input->post('sampai_tanggal'),
            'alasan_cuti' => $this->input->post('alasan_cuti'),
            'status_cuti' => 'Belum Disetujui'
                ];
                $this->Cuti_models->insert_cuti($data2);
            $this->response([
                'status' => true,
                'message' => $data2
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'data' => 'Cuti gagal Diajukan'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
    

    public function index_delete()
    {
        $id = $this->delete('id');

        if($id === null){
            $this->response([
                'status' => false,
                'data' => 'Tolong Masukan ID'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->Cuti_models->deleteCutibyId($id) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Data Cuti Di Hapus'
                ], RestController::HTTP_NOT_FOUND);
            } else {
                //idnotfound
                $this->response([
                    'status' => false,
                    'data' => 'Data Cuti Tidak Ditemukan'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_put()
    {
        $data = [
            
           
            'alasan_cuti' => $this->put('alasan_cuti'),
            'status_cuti' => $this->put('status_cuti')
            
    ];

    if ($this->cuti->updateUser($data) > 0) {
        $this->response([
            'status' => true,
            'message' => 'Data Cuti diupdate'
        ], RestController::HTTP_CREATED);
    }else {
        $this->response([
            'status' => false,
            'message' => 'Data Cuti diupdate'
        ], RestController::HTTP_BAD_REQUEST);
    }
    }


    
}