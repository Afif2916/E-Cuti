<?php





use chriskacerguis\RestServer\RestController;
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;
use Firebase\JWT\Key;
use Afif\Auth\AuthToken;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
require APPPATH . '/libraries/Key.php';
require APPPATH . '/libraries/JWT.php';
require APPPATH . '/libraries/ExpiredException.php';
require APPPATH . '/libraries/BeforeValidException.php';
require APPPATH . '/libraries/SignatureInvalidException.php';
require APPPATH . '/libraries/JWK.php';


class Auth extends RestController {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Cuti_models', 'cuti');
        $this->load->model('Pegawai_models');
        $this->load->model('Cuti_models');
        $this->load->model('User_models', 'user');

        
    }

    public function configToken(){
        $cnf['exp'] = 360000; //milisecond
        $cnf['secretkey'] = '2212336221';
        return $cnf;        
    }

    public function login_post(){   
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
                
        $exp = time() + 3600;
        $token = array(
            "iss" => 'apprestservice',
            "aud" => 'pengguna',
            "iat" => time(),
            "nbf" => time() + 10,
            "exp" => $exp,
            "data" => array(
                "username" => $username,
                "password" => $password
            )
        );       
    if($user) {

        if(password_verify($password, $user['password'])) {
                $jwt = JWT::encode($token, $this->configToken()['secretkey'], 'HS256');
                $output = [
                        'status' => 200,
                        'message' => 'Berhasil login',
                        "token" => $jwt,                
                        "expireAt" => $token['exp']
                    ];  
                $data2 = $this->Pegawai_models->pegawaiSelect($username);    
                $data = array('kode'=>'200', 'token'=>$jwt, 'exp'=>$exp, 'data'=>array($data2) );
                $this->response(
                    $data,
                    200 );
                 }
        else {
            $output = [
                'status' => 200,
                'message' => 'Gagal Login',         
                
            ];
            $this->response([
                'status' => false,
                'data' => 'Gagal Login Cek Kembali Password dan Username'
            ]);
            }    
        } else {
            $output = [
                'status' => 200,
                'message' => 'Gagal Login',         
                
            ];
            $this->response([
                'status' => false,
                'data' => 'Gagal Login Cek Kembali Password dan Username'
            ]);
        }
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
