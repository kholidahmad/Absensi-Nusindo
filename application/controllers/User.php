<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('info');
        $this->load->library('form_validation');
        $this->load->helper('code');

        // $this->load->helper('tgl');
        $this->load->model('Karyawan_model', 'karyawan');
        if ($this->session->userdata('nik') == null) {
            redirect(base_url().'auth/login');
        }elseif ($this->session->userdata('level') == 'admin') {
            $data['user'] = $this->session->userdata('nik');
            redirect(base_url().'karyawan');
        }

        $nik= $this->session->userdata('nik');
        $nama= $this->session->userdata('name');
        $tgl = date('d');
        $bulannow = date('Y-m');
        $periodea = date('m');
        $periodeb = $periodea-1;
        $periodec = $periodeb.'/'.date('Y');
        // $gethadir = $this->karyawan->getDataHadirByNIK($nik);
        $dataKar = $this->karyawan->getDataKaryawanById($nik);
        $cekreset = $this->karyawan->cekHistoryResetKar('admin', $bulannow);
        $cekresetuser = $this->karyawan->cekHistoryResetKar2($nik,$nama, $bulannow);
        $dataReset = array(
            'hadir' => 0,
            'datang_tepat' => 0,
            'datang_terlambat' => 0,
            'pulang_awal' => 0,
            'pulang_tepat' => 0,
            'pulang_terlambat' => 0
        );
        // $databackuphadir = array(
        //     'nik' => $nik,
        //     'periode' => $periodec,
        //     'hadir' => $gethadir[0]->hadir,
        //     'datang_tepat' => $gethadir[0]->datang_tepat,
        //     'datang_terlambat' => $gethadir[0]->datang_terlambat,
        //     'pulang_awal' => $gethadir[0]->pulang_awal,
        //     'pulang_tepat' => $gethadir[0]->pulang_tepat,
        //     'pulang_terlambat' => $gethadir[0]->pulang_terlambat
        // );
            // var_dump($cekresetuser);die;
        if($tgl >= '01' && $cekreset == null && $cekresetuser == null){
            // backup_absen($nik, $databackuphadir);
            autoreset_absen_kar($nik, $dataReset);
            $this->karyawan->addHistoryResetKar($nik, $nama, 'Reset', date('Y-m'));
        } 
        // END auto reset absen

        // auto reset Izin
        $dataIzinKar = $this->karyawan->getIzin_belum($nik);
        // var_dump($dataIzinKar);die;
        if($dataIzinKar != null){
            $today = strtotime(date('dMy'));
            $ke_tgl = strtotime($dataIzinKar[0]->to_tgl);
            if($today > $ke_tgl){
                autoreset_izin($nik, 'sisa', 'selesai');
            }
        }
        
    }

    public function messageAlert($type, $title) {
        $messageAlert = "
        const Toast = Swal.mixin({
            toast: true,
            position: 'midle',
            showConfirmButton: false,
            timer: 5000
        });

        Toast.fire({
            type: '".$type."',
            title: '".$title."'
        });
        ";
        return $messageAlert;
    }
    public function pesanGagal($text){
        $pesanGagal = "
           const gagal = Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '$text',
                        footer: ''
                        });
        ";
        return $pesanGagal;
    }
    public function pesanBerhasil($title){
        $pesanBerhasil = "
           const berhasil = Swal.fire({
                    position: 'midle',
                    icon: 'success',
                    title: '$title',
                    showConfirmButton: false,
                    timer: 1500
                    });

        ";
        return $pesanBerhasil;
    }

    public function index() {
        // $addHistory = $this->karyawan->addHistory($this->session->userdata('name'), $this->session->userdata('name').' Telah melakukan login', date('d/m/Y'));
        $data['halaman'] = $this->uri->segment('1');
        $nik = $this->session->userdata('nik');
        $tgl = date('d F Y');
        $dataKaryawan = $this->karyawan->getDataKaryawanById($this->session->userdata('nik'));
        $data['cekabsen'] = $this->karyawan->cekHistoryAbsenKar($nik, $tgl);
        $data['cekabsenPulang'] = $this->karyawan->cekHistoryPulang($nik, $tgl);
        $data['cekHistoryShift'] = $this->karyawan->cekHistoryShift($nik, $tgl);
        $data['cekHistoryPulangShift'] = $this->karyawan->cekHistoryPulangShift($nik, $tgl);
        $data['namakaryawan'] = $this->session->userdata('name');
        $data['dataKaryawan'] = info();
        $data['settingAbsensi'] = $getSettingAbsensi = $this->karyawan->getSettingAbsensi();
        $data['settingPulang'] = $getSettingAbsensi = $this->karyawan->getSettingPulang();
        $data['absensiKaryawan'] = $this->karyawan->getAbsensiKaryawanById($nik);
        $data['historyAbsen'] = $this->karyawan->getHistoryKaryawanByNIK($nik);
        $data['dataIzinKar'] = $this->karyawan->getAllDataIzinKar($nik);
        $data['ceksedangizin'] = $this->karyawan->ceksedangizin($nik);
        // $sedangizin = $this->karyawan->ceksedangizin($nik);
        // var_dump($data['ceksedangizin'][0]->to_tgl);die;
        // $data['dari_tgl'] = strtotime($sedangizin[0]->from_tgl);
        // $data['ke_tgl'] = strtotime($sedangizin[0]->to_tgl);
        // $historyAbsen = $this->karyawan->getHistoryKaryawanByNIK($nik);
        // $x = $historyAbsen[0]->tanggal;
        // $y = tgl_indo($tglAbsen);
        // $jam = 
        // var_dump($y);die;

        $this->load->view('user/Dashboard', $data);
    }

     public function userEdit() {
        $data['dataKaryawan'] = info();
        $nik = $this->session->userdata('nik');
        // $idabsen = $this->uri->segment(4);
        $cekId = $this->karyawan->getDataKaryawanById($nik);
        if ($cekId[0]->id) {
            $dataKaryawan = $this->karyawan->getDataKaryawanById($nik);
            $data['dataKar'] = $dataKaryawan;
            $data['cabang'] = $this->karyawan->getCabang();
            $data['getUser'] = $this->karyawan->getDataUser($nik);
            $data['divisi'] = $this->karyawan->getDivisi();
            $data['bagian'] = $this->karyawan->getBagian();
            $data['absensiKaryawan'] = $this->karyawan->getAbsensiKaryawanById($nik);
        
            $data['jmlIzin'] = notif();
            $data['halaman'] = $this->uri->segment('2');
            $this->load->view('user/EditUser', $data);
        }else{
            redirect();
        }
    }

    public function changeDataKar() {
        $this->form_validation->set_rules('e_nik', 'NIK', 'callback_nik_check|required|trim|max_length[20]');
        $this->form_validation->set_rules('e_name', 'Nama', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('e_usercode', 'Username', 'callback_username_check|required|trim|max_length[50]');
        $this->form_validation->set_rules('e_password', 'Password', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('e_tentang', 'Tentang', 'trim|max_length[50]');
        $nik = $this->input->post('nik');
        $e_nik = $this->input->post('e_nik');
        $upload = $this->karyawan->uploadImage();
        $name = $this->input->post('e_name');

        $datakar = array(
            'nik' => $e_nik,
            'name' => $name,
            'cabang' => $this->input->post('e_cabang'), 
            'divisi' => $this->input->post('e_divisi'), 
            'bagian' => $this->input->post('e_bagian'), 
            'email' => $this->input->post('e_email'),
            'handphone' => $this->input->post('e_handphone'),
            'tentang' => $this->input->post('e_tentang')
            // 'image_name' => $upload['file']['file_name']
        );

        $userKar = array(
            'nik' => $this->input->post('e_nik'),
            'usercode' => $this->input->post('e_usercode'),
            'password' => $this->input->post('e_password')
        );

        if ($this->form_validation->run() == false) {
            $data['dataKaryawan'] = info();
            $nik = $this->session->userdata('nik');
            $cekId = $this->karyawan->getDataKaryawanById($nik);
            
                $dataKaryawan = $this->karyawan->getDataKaryawanById($nik);
                $data['dataKar'] = $dataKaryawan;
                $data['getUser'] = $this->karyawan->getDataUser($nik);
                $data['divisi'] = $this->karyawan->getDivisi();
                $data['bagian'] = $this->karyawan->getBagian();
                $data['cabang'] = $this->karyawan->getCabang();
                $data['absensiKaryawan'] = $this->karyawan->getAbsensiKaryawanById($nik);
            
                $data['jmlIzin'] = notif();
                $data['halaman'] = $this->uri->segment('2');
                $this->load->view('user/EditUser', $data);
        }else{
            $this->session->set_userdata('nik', $e_nik);
            $this->session->set_userdata('usercode', $this->input->post('e_usercode'));
            $changeInfo = $this->karyawan->changeInfoKaryawanById($nik, $datakar);
            $changeUserdata = $this->karyawan->changeUserById($nik, $userKar);

            if ($changeInfo && $changeUserdata) {
                $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil Update Data'));
                redirect(base_url().'user');
            }else{
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Update Data'));
                redirect(base_url().'user/changeDataKar');    
            }
        }        
    }

    public function nik_check($nik){
        $old_nik = $this->session->userdata('nik');
        $cek = $this->karyawan->cekNIK($nik, $old_nik);
        if ($cek != null ){
            $this->form_validation->set_message('nik_check', '{field}: '.$nik.' sudah terdaftar!');
            return FALSE;
        }elseif($nik == $old_nik){
            return TRUE;
        }else{
            return TRUE;
        }
    }
    public function username_check($username){
        $datauser = $this->karyawan->getDataUser($this->session->userdata('nik'));
        $old_username = $datauser[0]->usercode;
        $cekUsername = $this->karyawan->cekUsercode($username, $old_username);
        if ($cekUsername != null){
            $this->form_validation->set_message('username_check', '{field}: '.$username.' sudah terdaftar!');
            return FALSE;
        }elseif($username == $old_username){
            return TRUE;
        }else{
            return TRUE;
        }
    }

    public function absenKaryawan() {
        $lok = $this->input->post('lokasi');
        $nik = $this->input->post('nik');
        // $nik = $this->uri->segment('3');
        $cekId = $this->karyawan->getDataKaryawanById($nik);
        $nama= $this->session->userdata('name');
        $tgl = date('d F Y');
        $cekabsen = $this->karyawan->cekHistoryAbsenKar($nik, $tgl);
        $hariini = strtotime('today');
        $tglini = date('dMy');
        $hini = date('l');
        $tgllibur = $this->karyawan->cekHariLibur($tglini);
        $hariabsen = $this->karyawan->cekHariAbsen($hini);
        // var_dump($hariabsen);die;
        if ($cekId[0]->nik) {
            $getSettingAbsensi = $this->karyawan->getSettingAbsensi();
            $start = $getSettingAbsensi[0]->mulai_absen;
            $end = $getSettingAbsensi[0]->selesai_absen;
            if($hariabsen != null){
                if($tgllibur == null){
                    if (!(strtotime($start) <= time())) {
                        $this->session->set_flashdata('pesanGagal',$this->pesanGagal('Waktu absen belum dimulai'));
                        redirect(base_url().'user');
                    }elseif (!(time() >= strtotime($end))){
                        if ($cekabsen != null) {
                            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Anda sudah absen'));
                            redirect(base_url().'user');
                        }else{
                            // $absenHarian = $this->karyawan->absenHarian($nik);
                            $tambahKehadiran = $this->karyawan->updateAbsensiKaryawan($nik, 'hadir', '+', '1');
                            $tambahDatang = $this->karyawan->updateDatang($nik, 'datang_tepat', '+', '1');
                            $tambahHistory = $this->karyawan->addHistoryKar($cekId[0]->nik, 'Absen Datang', date('l'), date('F'), date('Y'), date('d F Y'), date('h:i:s A'), $lok, 'tepat waktu');
                            if ($tambahKehadiran && $tambahHistory && $tambahDatang ) {
                                $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Absen berhasil'));
                                redirect(base_url().'user');
                            }else{
                                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen'));
                                redirect(base_url().'user');
                            }
                        }
                    }else{
                        if ($cekabsen != null) {
                            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Anda sudah absen'));
                            redirect(base_url().'user');
                        }else{
                            // $absenHarian = $this->karyawan->absenHarian($nik);
                            $tambahKehadiran = $this->karyawan->updateAbsensiKaryawan($nik, 'hadir', '+', '1');
                            $tambahDatang = $this->karyawan->updateDatang($nik, 'datang_terlambat', '+', '1');
                            $tambahHistory = $this->karyawan->addHistoryKar($cekId[0]->nik,'Absen Datang', date('l'), date('F'), date('Y'), date('d F Y'), date('h:i:s A'),  $lok, 'diluar waktu');
                            if ($tambahKehadiran && $tambahHistory && $tambahDatang) {
                                $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Absen berhasil'));
                                redirect(base_url().'user');
                            }else{
                                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen'));
                                redirect(base_url().'user');
                            }
                        }
                    }
                }else{
                    $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Hari libur'));
                    redirect(base_url().'user');
                }  
            }else{
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Hari libur'));
                redirect(base_url().'user');
            }
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen / Pengguna tidak ada'));
            redirect(base_url().'user');
        }
    }

    public function absenPulang() {
        $lok = $this->input->post('lokasi');
        $nik = $this->input->post('nik');
        // $nik = $this->uri->segment('3');
        $tgl = date('d F Y');
        $cekId = $this->karyawan->getDataKaryawanById($nik);
        $cekabsen = $this->karyawan->cekHistoryAbsenKar($nik, $tgl);
        $cekabsenPulang = $this->karyawan->cekHistoryPulang($nik, $tgl);

        if ($cekId[0]->nik) {
            $getSettingAbsensi = $this->karyawan->getSettingPulang();
            $start = $getSettingAbsensi[0]->mulai_absen;
            $end = $getSettingAbsensi[0]->selesai_absen;
            if ($cekabsen != null) {
                if (!(strtotime($start) <= time())) {
                    if ($cekabsenPulang != null) {
                        $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Anda sudah absen pulang'));
                        redirect(base_url().'user');
                    }else{
                        // $absenHarian = $this->karyawan->absenHarian($nik);
                        $tambahPulang = $this->karyawan->updatePulang($cekId[0]->nik, 'pulang_awal', '+', '1');
                        $tambahHistory = $this->karyawan->addHistoryKar($cekId[0]->nik,  'Absen Pulang', date('l'), date('F'), date('Y'), date('d F Y'), date('h:i:s A'), $lok, 'lebih awal');
                        if ($tambahHistory && $tambahPulang) {
                            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Absen Pulang berhasil'));
                            redirect(base_url().'user');
                        }else{
                            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen pulang'));
                            redirect(base_url().'user');
                        }
                    }
                }elseif (!(time() >= strtotime($end))) {
                
                    if ($cekabsenPulang != null) {
                        $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Anda sudah absen pulang'));
                        redirect(base_url().'user');
                    }else{
                        // $absenHarian = $this->karyawan->absenHarian($nik);
                        $tambahPulang = $this->karyawan->updatePulang($cekId[0]->nik, 'pulang_tepat', '+', '1');
                        $tambahHistory = $this->karyawan->addHistoryKar($cekId[0]->nik, 'Absen Pulang', date('l'), date('F'), date('Y'), date('d F Y'), date('h:i:s A'),  $lok, 'tepat waktu');
                        if ($tambahHistory && $tambahPulang) {
                            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Absen Pulang berhasil'));
                            redirect(base_url().'user');
                        }else{
                            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen pulang'));
                            redirect(base_url().'user');
                        }
                    }
                }else{
                    if ($cekabsenPulang != null) {
                        $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Anda sudah absen pulang'));
                        redirect(base_url().'user');
                    }else{
                        // $absenHarian = $this->karyawan->absenHarian($nik);
                        $tambahPulang = $this->karyawan->updatePulang($cekId[0]->nik, 'pulang_terlambat', '+', '1');
                        $tambahHistory = $this->karyawan->addHistoryKar($cekId[0]->nik, 'Absen Pulang', date('l'), date('F'), date('Y'), date('d F Y'), date('h:i:s A'),  $lok, 'diluar waktu');
                        if ($tambahHistory && $tambahPulang) {
                            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Absen Pulang berhasil'));
                            redirect(base_url().'user');
                        }else{
                            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen pulang'));
                            redirect(base_url().'user');
                        }
                    }
                }
            }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Anda Belum Absen Datang'));
            redirect(base_url().'user');
            }
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen'));
            redirect(base_url().'user');
        }
    }

    public function absen_shift_datang() {
        $nik = $this->uri->segment('3');
        $cekId = $this->karyawan->getDataKaryawanById($nik);
        $tgl = date('d F Y');
        $cekabsen = $this->karyawan->cekHistoryShift($nik, $tgl);
        $hariini = strtotime('today');
        $tglini = date('dMy');
        $hini = date('l');
        $tgllibur = $this->karyawan->cekHariLibur($tglini);
        $hariabsen = $this->karyawan->cekHariLibur2($hini);

        // var_dump($hariabsen);die;
        if ($cekId[0]->nik) {
            if($hariabsen == null){
                if($tgllibur == null){
                    if ($cekabsen != null) {
                        $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Anda sudah absen'));
                        redirect(base_url().'user');
                    }else{
                        $tambahKehadiran = $this->karyawan->updateAbsensiKaryawan($nik, 'hadir', '+', '1');
                        $tambahDatang = $this->karyawan->updateDatang($nik, 'shift', '+', '1');
                        $tambahHistory = $this->karyawan->addHistoryKar($cekId[0]->nik, 'Absen Shift Datang', date('l'), date('F'), date('Y'), date('d F Y'), date('h:i:s A'),'');
                        if ($tambahKehadiran && $tambahHistory && $tambahDatang ) {
                            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Absen berhasil'));
                            redirect(base_url().'user');
                        }else{
                            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen'));
                            redirect(base_url().'user');
                        }
                    }
                }else{
                    $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Hari libur'));
                    redirect(base_url().'user');
                }  
            }else{
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Hari libur'));
                redirect(base_url().'user');
            }
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen / Pengguna tidak ada'));
            redirect(base_url().'user');
        }
    }

    public function absen_shift_pulang() {
        $nik = $this->uri->segment('3');
        $tgl = date('d F Y');
        $cekId = $this->karyawan->getDataKaryawanById($nik);
        $cekabsen = $this->karyawan->cekHistoryShift($nik, $tgl);
        $cekabsenPulang = $this->karyawan->cekHistoryPulangShift($nik, $tgl);

        if ($cekId[0]->nik) {
            if ($cekabsen != null) {
                if ($cekabsenPulang != null) {
                    $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Anda sudah absen shift pulang'));
                    redirect(base_url().'user');
                }else{
                    $tambahHistory = $this->karyawan->addHistoryKar($cekId[0]->nik, 'Absen Shift Pulang', date('l'), date('F'), date('Y'), date('d F Y'), date('h:i:s A'), '');
                    if ($tambahHistory) {
                        $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Absen Shift Pulang berhasil'));
                        redirect(base_url().'user');
                    }else{
                        $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen pulang'));
                        redirect(base_url().'user');
                    }
                }
            }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Anda belum Absen Shift Datang'));
            redirect(base_url().'user');
            }
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal untuk absen'));
            redirect(base_url().'user');
        }
    }

    // public function tidakHadir(){
    //     $day = date('d/m/Y');
    //     $nik = $this->session->userdata('nik');
    //     $dataKaryawan = $this->karyawan->getDataKaryawanById($this->session->userdata('nik'));
    //     $data['cekabsen'] = $this->karyawan->cekHistoryAbsenKar($nik, $day);
    //     if()
    // }

    public function permohonanIzin() {
        $i = 0;
            while ($i == 0) {
                $kodeizin = createKodeIzin();
                $code = $this->karyawan->cekKodeIzin($kodeizin);
                if ($code == null) {
                    $i += 1;
                } else {
                    $i += 0;
                }
            }
        $data['userr'] = $this->session->userdata();
        $nik = $this->session->userdata('nik');
        $query = "SELECT * FROM data_karyawan WHERE nik=$nik;";
        $data['halaman'] = $this->uri->segment('2');
        $data['datakar'] = $this->db->query($query)->row_array();
        $data['dataKaryawan'] = info();
        $data['kodeizin'] = $kodeizin;
        $data['cekInputsedangizin'] = $this->karyawan->cekInputsedangizin($nik);
        $data['cekInputizin'] = $this->karyawan->cekInputizin($nik);
        // var_dump($data['cekInputsedangizin']);die;
        $this->load->view('user/Permohonan_izin', $data);
    }
    public function Izin_saya() {
        $data['userr'] = $this->session->userdata();
        $nik = $this->session->userdata('nik');
        $query = "SELECT * FROM data_karyawan WHERE nik=$nik;";
        $data['halaman'] = $this->uri->segment('2');
        $data['datakar'] = $this->db->query($query)->row_array();
        $data['dataIzin'] = $this->karyawan->getAllDataIzinKar($nik);
        $data['dataKaryawan'] = info();
        $this->load->view('user/Izin_saya', $data);
    }
    public function Riwayat_absen() {
        $data['userr'] = $this->session->userdata();
        $nik = $this->session->userdata('nik');
        $query = "SELECT * FROM data_karyawan WHERE nik=$nik;";
        $data['halaman'] = $this->uri->segment('2');
        $data['datakar'] = $this->db->query($query)->row_array();
        $data['historyAbsen'] = $this->karyawan->getHistoryKaryawanByNIK($nik);
        $data['dataKaryawan'] = info();
        $this->load->view('user/Riwayat_absen', $data);
    }

    public function Semua_izin(){
        $data['userr'] = $this->session->userdata();
        $nik = $this->session->userdata('nik');
        $query = "SELECT * FROM data_karyawan WHERE nik=$nik;";
        $data['datakar'] = $this->db->query($query)->row_array();
        $data['sakit'] = $this->karyawan->getIzinSakit();
        $data['pribadi'] = $this->karyawan->getIzinPribadi();
        $data['libur'] = $this->karyawan->getIzinLibur();
        $data['tahunan'] = $this->karyawan->getIzinTahunan();
        $data['dataKaryawan'] = info();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('user/Semua_izin', $data);
    }
    
    public function hapusIzin(){ 
        $kode_izin = $this->input->post('kode_izin');
        $hps = $this->karyawan->hapusIzinById($kode_izin);
        
        if($hps){
            $output['msg'] = 'success';
            echo json_encode($output);
        }
        
    }
    public function batalIzinKarFile(){ 
        $id = $this->input->post('id');
        $file = $this->input->post('file');
        $hps = $this->karyawan->hapusIzinById($id);
        $hpsizinkar = $this->karyawan->hapusIzinById($id);
        $hpsFile = unlink(FCPATH . 'doc/' . $file);
        if($hps && $hpsizinkar &&  $hpsFile){
            $output['msg'] = 'success';
            echo json_encode($output);
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Hapus'));
            redirect(base_url().'user/permohonanIzin');
        } 
    }
    public function batalIzinKar(){ 
        $id = $this->input->post('id');
        $hps = $this->karyawan->hapusIzinById($id);
        $hpsizinkar = $this->karyawan->hapusIzinById($id);
        if($hps && $hpsizinkar){
            $output['msg'] = 'success';
            echo json_encode($output);
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Hapus'));
            redirect(base_url().'user/permohonanIzin');
        } 
    }
    

    public function addIzin(){
        $this->form_validation->set_rules('from', 'tanggal Dari', 'required|trim');
        $this->form_validation->set_rules('to', 'tanggal Sampai', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        $this->form_validation->set_rules('keterangan_izin', 'Keterangan Izin', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('tipe', 'Tipe Izin', 'required|trim');
        $dataizin = array(
            'kode_izin' => $this->input->post('kode_izin'),
            'nik' => $this->input->post('nik'),
            'from_tgl' => $this->input->post('alternate'),
            'to_tgl' => $this->input->post('alternate1'),
            'lama' => $this->input->post('lama'),
            'tipe' => $this->input->post('tipe'),
            'keterangan_izin' => $this->input->post('keterangan_izin'),
            'status_izin' => 'on progress',
            'sisa'=> 'belum'
        );
        
         $upload_file = $_FILES['lampiran_izin']['name'];

        if($upload_file){
            
            $config['allowed_types'] = 'pdf|doc|docx|xlsx|jpeg|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './doc/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('lampiran_izin')) {
                $new_file = $this->upload->data('file_name');
                $this->db->set('lampiran_izin', $new_file);
            } else {
                echo $this->upload->display_errors();
            }
        
            if($this->form_validation->run() == false){
                $data['userr'] = $this->session->userdata();
                $nik = $this->session->userdata('nik');
                $query = "SELECT * FROM data_karyawan WHERE nik=$nik;";
                $data['datakar'] = $this->db->query($query)->row_array();
                $data['dataKaryawan'] = info();
                $data['cekInputsedangizin'] = $this->karyawan->cekInputsedangizin($nik);
                $data['cekInputizin'] = $this->karyawan->cekInputizin($nik);
                $data['halaman'] = $this->uri->segment('2');
                $i = 0;
                while ($i == 0) {
                    $kodeizin = createKodeIzin();
                    $code = $this->karyawan->cekKodeIzin($kodeizin);
                    if ($code == null) {
                        $i += 1;
                    } else {
                        $i += 0;
                    }
                }
                $data['kodeizin'] = $kodeizin;
                $this->load->view('user/Permohonan_izin', $data);
            }else{
                $insertIzin = $this->karyawan->tambah_izin($dataizin);
                $this->db->set('lampiran_izin', $new_file);
                // $insertIzinKar = $this->karyawan->tambah_izinKar($dataizin);
                
                if($insertIzin){
                    $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil mengajukan Izin'));
                redirect('user/Izin_saya');
                }else{
                    $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal mengajukan Izin'));
                redirect('user/permohonanIzin');
                }
                
            }
        }else{
            
            if($this->form_validation->run() == false){
                $data['userr'] = $this->session->userdata();
                $nik = $this->session->userdata('nik');
                $query = "SELECT * FROM data_karyawan WHERE nik=$nik;";
                $data['datakar'] = $this->db->query($query)->row_array();
                $data['cekInputsedangizin'] = $this->karyawan->cekInputsedangizin($nik);
                $data['cekInputizin'] = $this->karyawan->cekInputizin($nik);
                $data['dataKaryawan'] = info();
                $data['halaman'] = $this->uri->segment('2');
                $i = 0;
                while ($i == 0) {
                    $kodeizin = createKodeIzin();
                    $code = $this->karyawan->cekKodeIzin($kodeizin);
                    if ($code == null) {
                        $i += 1;
                    } else {
                        $i += 0;
                    }
                }
                $data['kodeizin'] = $kodeizin;
                $this->load->view('user/Permohonan_izin', $data);
            }else{
                $insertIzin = $this->karyawan->tambah_izin($dataizin);
                // $insertIzinKar = $this->karyawan->tambah_izinKar($dataizin);
                
                if($insertIzin){
                    $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil mengajukan Izin'));
                redirect('user/Izin_saya');
                }else{
                    $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal mengajukan Izin'));
                redirect('user/permohonanIzin');
                }
            }
        }
    }

    public function changeFotoKaryawan() {
        $dataKaryawan = $this->karyawan->getDataKaryawanById($this->session->userdata('nik'));
        $nik = $this->input->post('nik');
        $upload_foto = $_FILES['foto']['name'];

        if($upload_foto){
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './images/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $old_image = $dataKaryawan[0]->image_name;
                if ($old_image != 'default.png') {
                    unlink(FCPATH . 'images/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image_name', $new_image);
                $this->db->where('nik', $nik);
                $this->db->update('data_karyawan');
                $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil update foto'));
                redirect('user');
            } else {
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal update foto'));
                redirect('user');
            }
        }else{
            redirect('user');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        setcookie('id', '', time() - 3600);
        setcookie('key', '', time() - 3600);
        redirect(base_url());
    }
    
}