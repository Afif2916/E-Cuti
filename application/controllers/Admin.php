<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Cuti_models');
        $this->load->model('Pegawai_models');
        $this->load->model('User_models');
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
		$this->load->view('admin/home', $cuti);
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
		$this->load->view('admin/pengajuan_cuti');        
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
          redirect('admin/pengajuan_cuti');
            }
    }

    public function list_pengajuan_cuti()
    {
        $data['pegawai'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'List Pengajuan Cuti';
        $cuti['cuti'] = $this->Cuti_models->tampilCutis();
        $this->load->view('template/header', $data);
		$this->load->view('admin/list_pengajuan_cuti', $cuti);
        $this->load->view('template/footer');
        
        
        

       


    }

    public function tambah_karyawan()
    {
        
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
       

        if($this->form_validation->run() == false) {
        $data['pegawai'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'Pengajuan Cuti';
        
        $this->load->view('template/header', $data);
		$this->load->view('admin/tambah_karyawan');        
        $this->load->view('template/footer');
        

        
       } else {
                $data = [

                    'id_pegawai' => null,
                    'nip' => ($this->input->post('nip')),
                    'nama' => ($this->input->post('nama')),
                    'email' => ($this->input->post('email')),
                    'tgl_lahir' => ($this->input->post('tgl_lahir')),
                    'jabatan' => ($this->input->post('jabatan')),
                    'jumlah_cuti' =>'12'
                    
                    
                ];
                $this->db->insert('pegawai', $data);
                

                $data2 = [
                        'id_user' => null,
                        'id_pegawai' => $this->db->insert_id(),
                        'username' => ($this->input->post('nip')),
                        'password' => password_hash('1234', PASSWORD_DEFAULT),
                        'role' => ($this->input->post('role_id'))
                ];

                $this->db->insert('user', $data2);
                
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Karyawan Sudah Ditambahkan
          </div>' );
          redirect('admin/tambah_karyawan');
          //var_dump($data);
            }
    }

    public function list_data_karyawan()
    {
       
        $data['pegawai'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'List Data Karyawan';
        $pegawai['cuti'] = $this->Pegawai_models->all_data_karyawan();
        

        $this->form_validation->set_rules('email', 'Email', 'required');
        
        if($this->form_validation->run() == false){
        $this->load->view('template/header', $data);
		$this->load->view('admin/list_data_karyawan', $pegawai);
        $this->load->view('template/footer');
        } else {
            $this->Pegawai_models->update_data();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Berhasil Di Update
          </div>' );
          redirect('admin/list_data_karyawan');
        }
    }

    public function profile()
    {
        $data['user'] = $this->Pegawai_models->tampil_profil();
        $data['title'] = 'Profil';
        $this->form_validation->set_rules('email', 'Email', 'required');

        if($this->form_validation->run() == false){
        $this->load->view('template/header', $data);
        $this->load->view('admin/profile', $data);
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
          redirect('admin/profile');

        

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
		    $this->load->view('admin/gantipassword', $user);
            $this->load->view('template/footer');
        } else{
            $cureent_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if(!password_verify($cureent_password, $user['user']['password'])){
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Password Tidak Sesuai
          </div>' );
          redirect('admin/changePassword');
            } else {
                if($cureent_password == $new_password) {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Password Tidak Boleh sama Dengan Password Sebelumnya</div>' );
                         redirect('supervisor/changePassword');
                }else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('id_pegawai', $this->session->userdata('id_pegawai'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                        Update Password Berhasil </div>' );
                         redirect('admin/changePassword');
                }
            }
        }

        
    }

    public function deletePegawai($id = null)
    {
         $this->Pegawai_models->deletePegawai($id);
         $this->Cuti_models->deleteCuti($id);

        
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">  Data Karyawan Telah Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/list_data_karyawan');


        
    }

    


   //fungsi untuk cetak laporan excel
   public function laporan_karyawan_excel()
   {
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
			$sheet->setCellValue('B1', 'NIP');
			$sheet->setCellValue('C1', 'Nama');
			$sheet->setCellValue('D1', 'Email');
			$sheet->setCellValue('E1', 'Tanggal Lahir');
            $sheet->setCellValue('F1', 'Jabatan');
            $sheet->setCellValue('G1', 'Jumlah Cuti');
			
			$pegawai = $this->Pegawai_models->all_data_karyawan();
			$no = 1;
			$x = 2;
			foreach($pegawai as $row)
			{
				$sheet->setCellValue('A'.$x, $no++);
				$sheet->setCellValue('B'.$x, $row->nip);
				$sheet->setCellValue('C'.$x, $row->nama);
				$sheet->setCellValue('D'.$x, $row->email);
				$sheet->setCellValue('E'.$x, $row->tgl_lahir);
                $sheet->setCellValue('F'.$x, $row->jabatan);
                $sheet->setCellValue('G'.$x, $row->jumlah_cuti . 'Hari');
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'data_karyawan';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
    }

    public function laporan_cuti_excel()
   {
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'No');
			$sheet->setCellValue('B1', 'NIP');
			$sheet->setCellValue('C1', 'Nama');
			$sheet->setCellValue('D1', 'Email');
			$sheet->setCellValue('E1', 'Tanggal Lahir');
            $sheet->setCellValue('F1', 'Jabatan');
            $sheet->setCellValue('G1', 'Jumlah Cuti');
            $sheet->setCellValue('H1', 'Jumlah Cuti');
            $sheet->setCellValue('I1', 'ID Cuti');
            $sheet->setCellValue('J1', 'Jenis Cuti');
            $sheet->setCellValue('K1', 'Dari Tanggal');
            $sheet->setCellValue('L1', 'Sampai Tanggal');
            $sheet->setCellValue('M1', 'Alasan Cuti');
            $sheet->setCellValue('N1', 'Status Cuti');
            

			
			$pegawai = $this->Cuti_models->TampilCuti();
			$no = 1;
			$x = 2;
			foreach($pegawai as $row)
			{
				$sheet->setCellValue('A'.$x, $no++);
				$sheet->setCellValue('B'.$x, $row->nip);
				$sheet->setCellValue('C'.$x, $row->nama);
				$sheet->setCellValue('D'.$x, $row->email);
				$sheet->setCellValue('E'.$x, $row->tgl_lahir);
                $sheet->setCellValue('F'.$x, $row->jabatan);
                $sheet->setCellValue('G'.$x, $row->jumlah_cuti . 'Hari');
                $sheet->setCellValue('H'.$x, $row->id_cuti  );
                $sheet->setCellValue('I'.$x, $row->jenis_cuti );
                $sheet->setCellValue('J'.$x, $row->dari_tanggal );
                $sheet->setCellValue('K'.$x, $row->sampai_tanggal );
                $sheet->setCellValue('L'.$x, $row->sampai_tanggal );
                $sheet->setCellValue('M'.$x, $row->alasan_cuti );
                $sheet->setCellValue('N'.$x, $row->status_cuti );
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'data_karyawan';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
    }


    public function updatejumlahcuti()
    {
        $this->Pegawai_models->updatecuti();

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Jumlah Cuti Berhasil di Update
          </div>' );
          redirect('admin/list_data_karyawan');
    }

    
}