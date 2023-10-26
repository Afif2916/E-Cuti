<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
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

    }

    public function index()
    {
        $data['pegawai'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'Dashboard';
        $cuti['cuti'] = $this->Cuti_models->tampilCutis();
        $this->load->view('template/header', $data);
		$this->load->view('karyawan/home', $cuti);
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
		$this->load->view('karyawan/pengajuan_cuti', $data);        
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
          redirect('user/pengajuan_cuti');
            }

       
    }

    public function list_pengajuan_cuti()
    {
        $data['user'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'List Pengajuan Cuti';
        $cuti['cuti'] = $this->Cuti_models->tampilCutis();
        $this->load->view('template/header', $data);
		$this->load->view('karyawan/list_pengajuan_cuti', $cuti);
        $this->load->view('template/footer');


        

    }

    public function profile()
    {
        $data['user'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'Profil';
        $this->form_validation->set_rules('email', 'Email', 'required');

        if($this->form_validation->run() == false){
        $this->load->view('template/header', $data);
        $this->load->view('karyawan/profile', $data);
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
          redirect('user/profile');

        

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
		    $this->load->view('karyawan/gantipassword', $user);
            $this->load->view('template/footer');
        } else{
            $cureent_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if(!password_verify($cureent_password, $user['user']['password'])){
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Password Tidak Sesuai
          </div>' );
          redirect('user/changePassword');
            } else {
                if($cureent_password == $new_password) {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Password Tidak Boleh sama Dengan Password Sebelumnya</div>' );
                         redirect('user/changePassword');
                }else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nip', $this->session->userdata('nip'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                        Update Password Berhasil </div>' );
                         redirect('user/changePassword');
                }
            }
        }

        
    }

    
}