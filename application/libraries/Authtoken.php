<?php

namespace Afif\Auth;
use chriskacerguis\RestServer\RestController;
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;
use Firebase\JWT\Key;


defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
require APPPATH . '/libraries/Key.php';
require APPPATH . '/libraries/JWT.php';
require APPPATH . '/libraries/ExpiredException.php';
require APPPATH . '/libraries/BeforeValidException.php';
require APPPATH . '/libraries/SignatureInvalidException.php';
require APPPATH . '/libraries/JWK.php';

class AuthToken extends RestController
{

    public function configToken(){
        $cnf['exp'] = 360000; //milisecond
        $cnf['secretkey'] = '2212336221';
        return $cnf;        
    }
    
    public function authtoken(){
        $secret_key = $this->configToken()['secretkey']; 
        $token = null; 
        $authHeader = $this->input->request_headers()['Authorization'];  
        $arr = explode(" ", $authHeader); 
        $token = $arr[1];        
        if ($token){
            try{
                //$decoded = JWT::decode($jwt, new Key($key, 'HS256'));
                $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));          
                if ($decoded){
                    return 'benar';
                }
            } catch (\Exception $e) {
                $result = array('pesan'=>'Kode Signature Tidak Sesuai');
                return 'salah';
                
            }
        }       
    }

    
}
