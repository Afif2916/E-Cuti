<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Cuti_models');
        $this->load->model('User_models');
        $this->load->model('Pegawai_models');
        if(!$this->session->userdata('username')){
                redirect('auth');
        }
        if($this->session->userdata('role') != 1){
            redirect('index');}
    }

    public function index()
    {
        $data['pegawai'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'Dashboard';
        $cuti['cuti'] = $this->Cuti_models->tampilCutis();
        $this->load->view('template/header', $data);
		$this->load->view('supervisor/home', $cuti);
        $this->load->view('template/footer');
        

        
    }


    public function pengajuan_cuti()
    {
        
        $this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'required');
        $this->form_validation->set_rules('lama_cuti', 'Lama Cuti', 'required');
        $this->form_validation->set_rules('alasan_cuti', 'Alasan Cuti', 'required');
        

        if($this->form_validation->run() == false) {
        $data['pegawai'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'Pengajuan Cuti';
        $this->load->view('template/header', $data);
		$this->load->view('supervisor/pengajuan_cuti');        
        $this->load->view('template/footer');
        

        
       } else {
                
                 $pegawai= $this->Pegawai_models->tampil_profil();
 
                $cuti = [

                    'id_cuti' => null,
                    'id_pegawai' => $pegawai['id_pegawai'],
                    'jenis_cuti' => ($this->input->post('jenis_cuti')),
                    'lama_cuti' => ($this->input->post('lama_cuti')),
                    'dari_tanggal' => ($this->input->post('dari_tanggal')),
                    'sampai_tanggal' => ($this->input->post('sampai_tanggal')),
                    'alasan_cuti' => ($this->input->post('alasan_cuti')),
                    'status_cuti' => 'Belum disetujui'
                    
                    
                ];
                $this->Cuti_models->insert_cuti($cuti);
                
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Cuti sudah dikirim
          </div>' );
          redirect('supervisor/pengajuan_cuti');
         
            }
    }

    public function list_pengajuan_cuti()
    {
        $data['pegawai'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'List Pengajuan Cuti';
        $cuti['cuti'] = $this->Cuti_models->tampilCutis();
        $this->load->view('template/header', $data);
		$this->load->view('supervisor/list_pengajuan_cuti', $cuti);
        $this->load->view('template/footer');

        



    }

    public function appr_cuti()
    {
        $data['user'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'List Pengajuan Cuti';
        $cuti['cuti'] = $this->Cuti_models->all_data_cuti();
        $this->load->view('template/header', $data);
		$this->load->view('supervisor/appr_cuti', $cuti);
        $this->load->view('template/footer');

    }


    public function disetujui($id = null)
    {
         $this->Cuti_models->disetujui($id);
       

        
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('supervisor/appr_cuti');


        
    }


    public function ditolak($id = null)
    {
        $this->Cuti_models->ditolak($id);

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">  Data Telah Ditolak<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('supervisor/appr_cuti');
    }

    public function data_pengajuan_cuti()
    {
        $data['user'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'List Pengajuan Cuti';
        $cuti['cuti'] = $this->Cuti_models->all_data_cuti();
        $this->load->view('template/header', $data);
        $this->load->view('supervisor/data_pengajuan_cuti', $cuti);
        $this->load->view('template/footer');
    }

    public function profile()
    {
        $data['user'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'Profil';
        $this->form_validation->set_rules('email', 'Email', 'required');

        if($this->form_validation->run() == false){
        $this->load->view('template/header', $data);
        $this->load->view('supervisor/profile', $data);
        $this->load->view('template/footer');
        } else {
           
            $email = $this->input->post('email');
            $jabatan = $this->input->post('jabatan');
            $nip = $this->input->post('nip');

            
            $this->db->set('email', $email);
            $this->db->set('jabatan', $jabatan);
            $this->db->where('nip', $nip);
            $this->db->update('pegawai');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Berhasil Di Update
          </div>' );
          redirect('supervisor/profile');

        

        }
    } 

    public function changePassword()
    {
        $data['pegawai'] = $this->Pegawai_models->tampil_profil();
        $user['user'] = $this->User_models->tampil_user();
        $data['title'] = 'Ganti password';
        $cuti['cuti'] = $this->Pegawai_models->data_cuti();

        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Ulangi Password', 'required|matches[new_password]');

        if($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
		    $this->load->view('supervisor/gantipassword', $user);
            $this->load->view('template/footer');
        } else{
            $cureent_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if(!password_verify($cureent_password, $user['user']['password'])){
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Password Tidak Sesuai
          </div>' );
          redirect('supervisor/changePassword');
            } else {
                if($cureent_password == $new_password) {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Password Tidak Boleh sama Dengan Password Sebelumnya</div>' );
                         redirect('supervisor/changePassword');
                }else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nip', $this->session->userdata('nip'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                        Update Password Berhasil </div>' );
                         redirect('supervisor/changePassword');
                }
            }
        }

        
    }
  
    

}

