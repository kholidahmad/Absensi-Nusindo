<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Karyawan_model', 'karyawan');
        if ($this->session->userdata('nik') !== null) {
            redirect(base_url().'karyawan');
        }
    }
    
    public function messageAlert($type, $title) {
        $messageAlert = "
        const Toast = Swal.mixin({
            toast: true,
            position: 'midle',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: '".$type."',
            title: '".$title."'
        });
        ";
        return $messageAlert;
    }

    public function login() {
        $this->load->view('admin/Login');
    }

    public function loginKaryawan() {
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('usercode', 'Username', 'required|trim');
        $usercode = $this->input->post('usercode');
        $password = $this->input->post('password');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/Login');
        }else{
            $loginKaryawan = $this->karyawan->loginKaryawan($usercode, $password);
            $cekUsername = $this->karyawan->cekUsercodeImport($usercode);
            $cekPassword = $this->karyawan->cekPasswordLogin($usercode,$password);
            
            if ($cekUsername != null) {
                if($cekPassword != null){
                    $getDataKaryawan = $this->karyawan->getDataKaryawanByNik($usercode);
                    $this->session->set_userdata('id', $getDataKaryawan[0]->id);
                    $this->session->set_userdata('name', $getDataKaryawan[0]->name);
                    $this->session->set_userdata('nik', $getDataKaryawan[0]->nik);
                    $this->session->set_userdata('usercode', $getDataKaryawan[0]->usercode);
                    $this->session->set_userdata('level', $loginKaryawan[0]->level);
                    if( isset($_POST['remember']) ) {
                        // buat cookie
                        setcookie('id', $getDataKaryawan[0]->nik, time()+60);
                        setcookie('key', hash('sha256', $getDataKaryawan[0]->usercode), time()+60);
                    }
                    redirect(base_url().'karyawan');
                }
                else{
                    $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'Password salah!'));
                    redirect();
                }
            }else{
                $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'Username salah!'));
                redirect();
            }
        }
    }
}