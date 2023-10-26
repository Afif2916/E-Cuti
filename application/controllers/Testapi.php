<?php
//use Restserver\Libraries\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
//use Restserver\Libraries\RestController;
use chriskacerguis\RestServer\RestController;

class Testapi extends RestController {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data user
    public function index_get() {
        $nip = $this->input->get('nip');
        if ($nip == '') {
            $kontak = $this->db->get('pegawai')->result();
        } else {
            $kontak = $this->db->where('nip', $nip);
            $kontak = $this->db->get('pegawai')->result();
        }
        echo json_encode($kontak);
    }

    //input data user
    public function index_post() {
        $data = array(
            'id_pegawai' => null,
                    'nip' => ($this->input->post('nip')),
                    'nama' => ($this->input->post('nama')),
                    'email' => ($this->input->post('email')),
                    'tgl_lahir' => ($this->input->post('tgl_lahir')),
                    'jabatan' => ($this->input->post('jabatan')),
                    'jumlah_cuti' =>'12'
                    
         );
    
        $response = $this->db->insert('pegawai', $data);
        echo json_encode($response);
    }

    //delete user 

    public function index_delete()
    {
        $nip = $this->input->get('id_pegawai');
        $delete = $this->delete('pegawai', array('id_pegawai' => $nip));

        if ($delete == true) {
            echo 'data terhapus';
        } else {
            echo ' data tidak ada';
        }

      

    }
    //Masukan function selanjutnya disini
    public function anjing(){
        return "bangsat";
    }
    public function index_put()
    {
        $id = $this->put('id_user');
        
        
        $data = [
            'nip' => $this->put('nip'),
            'nama' => $this->put('nama'),
            'password' => $this->put('password')
        ];
    
    $update = $this->db->update('user', $data, ['id_user' => $id]);
    

    if($update == true) {
       $this->response([
         'status' => 200,
         'message' => 'update berhasil'
        ], RestController::HTTP_CREATED);
    }else {
            echo 'gagal';
    }

    

        
     

    }
}
?>