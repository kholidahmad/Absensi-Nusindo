<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    private $filename = "import_data";

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('notif');
        $this->load->helper('info');
        $this->load->helper('code');
        $this->load->model('Karyawan_model', 'karyawan');
        $this->load->helper(array('url','download'));	

        if ($this->session->userdata('nik') == null) {
            redirect(base_url().'auth/login');
        }elseif ($this->session->userdata('level') == 'Karyawan') {
            $data['user'] = $this->session->userdata('nik');
            redirect(base_url().'user');
        }

        
    }

    public function messageAlert($type, $title) {
        $messageAlert = "
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
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
        $data['jmlIzin'] = notif();
        $data['namaadmin'] = $this->session->userdata('level');
        $nikadmin= $this->session->userdata('nik');
        $data['dataKaryawan'] = info();
        $data['sudahHadir'] = sudahHadir();
        $data['sudahPulang'] = sudahPulang();
        $data['jmlCuti'] = jmlCuti();
        // $bulan = date('Y-m');
        $data['grafikhadir'] = $this->karyawan->grafik_hadir() ;
        // var_dump($data['grafikhadir']);die;
        $data['halaman'] = $this->uri->segment('1');

        // $addHistory = $this->karyawan->addHistoryKar($nikadmin,'Admin', 'Login', date('d F Y'));
        $this->load->view('admin/Dashboard', $data);
    }
    public function profilAdmin() {
        $data['jmlIzin'] = notif();
        $data['namaadmin'] = $this->session->userdata('level');
        $data['dataAdmin'] = $this->karyawan->dataAdmin();
        $nikadmin= $this->session->userdata('nik');
        $data['dataKaryawan'] = info();
        $data['getUser'] = $this->karyawan->getDataUser($nikadmin);
        $data['halaman'] = $this->uri->segment('1');
        $this->load->view('admin/ProfilAdmin', $data);
    }

    public function grafik(){
        $data['grafikhadir'] = $this->karyawan->grafik_hadir() ;
        // var_dump($data['grafikhadir']);die;
        $this->load->view('admin/v_gravik', $data);
    }
    
    public function data_karyawan() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['getAllDataKaryawan'] = $this->karyawan->getAllDataKaryawan();
        $data['getUser'] = $this->karyawan->getUser();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/DataKaryawan', $data);
    }

    function aksiDownloadTemplate()
    {
        force_download('formatTemplate/nusindoAbsensi.xlsx', NULL);
    }
    public function tambah_karyawan() {
        $i = 0;
            while ($i == 0) {
                $userCodestaf = createUserCode();
                $userPass = createPassword();
                $code = $this->karyawan->cekUsercode($userCodestaf, $userCodestaf);
                $pass = $this->karyawan->cekPassword($userPass);
                if ($code == null && $pass == null) {
                    $i += 1;
                } else {
                    $i += 0;
                }
            }
            
        $data['userCodestaf'] = $userCodestaf;
        $data['divisi'] = $this->karyawan->getDivisi();
        $data['bagian'] = $this->karyawan->getBagian();
        $data['cabang'] = $this->karyawan->getCabang();
        $data['userPass'] = $userPass;
        $data['dataKaryawan'] = info();
        $data['halaman'] = $this->uri->segment('2');
        $data['jmlIzin'] = notif();
        $this->load->view('admin/TambahKaryawan', $data);
    }

    public function absensi_karyawan() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['dataKar'] = $this->karyawan->getAllDataKaryawan();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/AbsensiKaryawan', $data);
    }
    public function master_divisi() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['getDivisi'] = $this->karyawan->getDivisi();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/Master_divisi', $data);
    }
    public function master_cabang() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['getCabang'] = $this->karyawan->getCabang();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/Master_cabang', $data);
    }
    public function master_bagian() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['getBagian'] = $this->karyawan->getBagian();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/Master_bagian', $data);
    }

    public function data_hadir() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['nik'] = $this->session->userdata('nik');
        $data['dataKar'] = $this->karyawan->getAllDataKaryawan();
        $data['hadir'] = $this->karyawan->getDataHadir();
        $data['bulan'] = $this->karyawan->getBulanAbsen();
        $data['tahun'] = $this->karyawan->getTahunAbsen();
        $data['month'] = $this->karyawan->getBackupAbsenBulan();
        $data['backuphadir'] = $this->karyawan->getDataBackupHadir();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/DataHadir', $data);
    }

    public function ReportCuti() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['dataKar'] = $this->karyawan->getAllDataKaryawan();
        $data['hadir'] = $this->karyawan->getDataHadir();
        $data['reportcuti'] = $this->karyawan->getAllIzin_selesai();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/ReportCuti', $data);
    }

    public function reportAbsen(){
        $bulan = $this->input->post('bulan');
        $data['backuphadir'] = $this->karyawan->getHadirPerbulan($bulan);
        // $data['totalHadir'] = $this->karyawan->getTotalHadir();
        // var_dump($data['backuphadir']);die;
        $data['detailabsen'] = $this->karyawan->getDetailAbsen();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/v_reportAbsen', $data);
    }

    public function setting_absensi() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['datang'] = $this->karyawan->getSettingAbsensi();
        $data['pulang'] = $this->karyawan->getSettingPulang();
        $data['libur'] = $this->karyawan->getHariLibur();
        $data['namahari'] = ['Monday','Thuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        $h = $this->karyawan->getLibur();
        // $data['hari'] = explode(",",$h[0]->hari);
        $data['hari'] = $h[0]->hari;
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/SettingAbsensi', $data);
    }
    public function pengaturan_absensi() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/PengaturanAbsensi', $data);
    }
    public function history_absensi() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['getAllHistoryAbsen'] = $this->karyawan->getAllHistoryAbsen();
        $data['getUser'] = $this->karyawan->getUser();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/HistoryAbsensi', $data);
    }

    public function izinKaryawan() {
        $data['dataKaryawan'] = info();
        $data['dataIzin'] = $this->karyawan->getAllDataIzin();
        $data['jmlIzin'] = notif();
        $data['halaman'] = $this->uri->segment('2');
        $this->load->view('admin/IzinKaryawan', $data);
    }
    public function sedang_cuti() {
        $data['dataKaryawan'] = info();
        $data['jmlIzin'] = notif();
        $data['halaman'] = $this->uri->segment('2');
        $data['sakit'] = $this->karyawan->getIzinSakit();
        $data['pribadi'] = $this->karyawan->getIzinPribadi();
        $data['libur'] = $this->karyawan->getIzinLibur();
        $data['tahunan'] = $this->karyawan->getIzinTahunan();
        $this->load->view('admin/Sedang_cuti', $data);
    }
    public function edit($id) {
        $data['dataKaryawan'] = info();
        $cekId = $this->karyawan->getDataKaryawanById($id);
        if ($cekId[0]->id) {
            $dataKaryawan = $this->karyawan->getDataKaryawanById($id);
            $data['dataKar'] = $dataKaryawan;
            $data['getUser'] = $this->karyawan->getDataUser($id);
            $data['divisi'] = $this->karyawan->getDivisi();
            $data['bagian'] = $this->karyawan->getBagian();
            $data['cabang'] = $this->karyawan->getCabang();
            $data['absensiKaryawan'] = $this->karyawan->getAbsensiKaryawanById($id);
            $data['sakit'] = $this->karyawan->getSakit($id);
            $data['historyAbsen'] = $this->karyawan->getHistoryKaryawanByNIK($id);
            $data['jmlIzin'] = notif();
            $data['halaman'] = $this->uri->segment('2');
            $this->load->view('admin/EditKaryawan', $data);
        }else{
            redirect();
        }
    }

    // End load view

    // --------------------------------------|||----------------------------------------------//
    // --------------------------------------|||----------------------------------------------//
    // --------------------------------------|||----------------------------------------------//

    // Fungsi
    public function approvIzin(){
        $nik = $this->input->post('nik');
        $tipe = $this->input->post('tipe');
        $lama = $this->input->post('lama');
        $id = $this->input->post('id');
        $data=array('status_izin'=>'approved');
        $approve = $this->karyawan->approveIzinById($id,$data);
        // $approveKar = $this->karyawan->approveIzinByIdKar($id,$data);
        // $alasan = $this->karyawan->updateAlasan($nik, $tipe,'+', $lama);
        // $sedangizin = array(
        //     'kode_izin' => $id,
        //     'nik' => $nik
        // );
        // $insertSedangIzin = $this->karyawan->tambah_sedang_izin($sedangizin);
        if($approve ){
            $output['msg'] = 'success';
            echo json_encode($output);
        }
        
    }

    public function backupPerBulan(){
        $nik = $this->session->userdata('nik');
        $bulannow = date('Y-m');
        $cekreset = $this->karyawan->cekHistoryReset($nik,'admin', $bulannow);
        $gethadir = $this->karyawan->getDataHadirAll();
        // var_dump($gethadir);die;
        if($gethadir){
            $this->karyawan->insert_multiple_backup($gethadir);
            // jangan sampai kebalik
            $this->karyawan->resetAllabsen();
            $this->karyawan->addHistoryResetKar($nik, 'admin', 'Reset', date('Y-m'));
            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Reset berhasil'));
            redirect(base_url().'karyawan/data_hadir');
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal backup data'));
            redirect(base_url().'karyawan/data_hadir');
        }

    }

    public function rejectIzin(){
        $id = $this->input->post('id');
        $data=array('status_izin'=>'rejected');
        $approve = $this->karyawan->approveIzinById($id,$data);
        // $approveKar = $this->karyawan->approveIzinByIdKar($id,$data);
        
        if($approve){
            $output['msg'] = 'success';
            echo json_encode($output);
        }
        
    }
    public function hapusIzinFile(){ 
        $kode_izin = $this->input->post('kode_izin');
        $file = $this->input->post('file');
        $hps = $this->karyawan->hapusIzinById($kode_izin);
        $hpsFile = unlink(FCPATH . 'doc/' . $file);
        
        if($hps && $hpsFile){
            $output['msg'] = 'success';
            echo json_encode($output);
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Hapus'));
            redirect(base_url().'karyawan/izinKaryawan');
        }
    }
    public function hapusIzin(){ 
        $kode_izin = $this->input->post('kode_izin');
        $hps = $this->karyawan->hapusIzinById($kode_izin);
        if($hps){
            $output['msg'] = 'success';
            echo json_encode($output);
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Hapus'));
            redirect(base_url().'karyawan/izinKaryawan');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        setcookie('id', '', time() - 3600);
        setcookie('key', '', time() - 3600);
        redirect(base_url());
    }

    public function resetAbsen() {
        $resetAbsensi = $this->karyawan->resetAbsen();
        $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Reset berhasil'));
        redirect(base_url().'karyawan/setting_absensi');

        // if($resetAbsensi){
        //     $output['msg'] = 'success';
        //     echo json_encode($output);
        // }
    }

    public function addDivisi() {
        $divisi = $this->input->post('nama_divisi');
        $addDivisi = $this->karyawan->addDivisi($divisi);
        if($addDivisi){
            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil'));
            redirect(base_url().'karyawan/master_divisi');
        }
        else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal'));
            redirect(base_url().'karyawan/master_divisi');
        }
    }
    public function addCabang() {
        $cabang = $this->input->post('nama_cabang');
        $addCabang = $this->karyawan->addCabang($cabang);
        if($addCabang){
            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil'));
            redirect(base_url().'karyawan/master_cabang');
        }
        else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal'));
            redirect(base_url().'karyawan/master_divisi');
        }
    }
    public function addBagian() {
        $bagian = $this->input->post('nama_bagian');
        $addBagian = $this->karyawan->addBagian($bagian);
        if($addBagian){
            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil'));
            redirect(base_url().'karyawan/master_bagian');
        }
        else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal'));
            redirect(base_url().'karyawan/master_bagian');
        }
    }
    public function updateDivisi() {
        $id = $this->input->post('id');
        $divisi = $this->input->post('divisi');
        $updateDivisi = $this->karyawan->updateDivisi($id,$divisi);
        if($updateDivisi){
            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil'));
            redirect(base_url().'karyawan/master_divisi');
        }
        else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal'));
            redirect(base_url().'karyawan/master_divisi');
        }
    }
    public function updateCabang() {
        $id = $this->input->post('id');
        $cabang = $this->input->post('cabang');
        $updatecabang = $this->karyawan->updateCabang($id,$cabang);
        if($updatecabang){
            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil'));
            redirect(base_url().'karyawan/master_cabang');
        }
        else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal'));
            redirect(base_url().'karyawan/master_cabang');
        }
    }
    public function updateBagian() {
        $id = $this->input->post('id');
        $bagian = $this->input->post('bagian');
        $updatebagian = $this->karyawan->updateBagian($id,$bagian);
        if($updatebagian){
            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil'));
            redirect(base_url().'karyawan/master_bagian');
        }
        else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal'));
            redirect(base_url().'karyawan/master_bagian');
        }
    }

    public function deleteDivisi(){ 
        $id = $this->input->post('id');
        $hps = $this->karyawan->deleteDivisi($id);
        if($hps){
            $output['msg'] = 'success';
            echo json_encode($output);
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Hapus'));
            redirect(base_url().'karyawan/master_bagian');
        }
    }
    public function deleteCabang(){ 
        $id = $this->input->post('id');
        $hps = $this->karyawan->deleteCabang($id);
        if($hps){
            $output['msg'] = 'success';
            echo json_encode($output);
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Hapus'));
            redirect(base_url().'karyawan/master_cabang');
        }
    }
    public function deleteBagian(){ 
        $id = $this->input->post('id');
        $hps = $this->karyawan->deleteBagian($id);
        if($hps){
            $output['msg'] = 'success';
            echo json_encode($output);
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Hapus'));
            redirect(base_url().'karyawan/master_bagian');
        }
    }

    public function isTime($time) {
        return preg_match("#([0-1]{1}[0-9]{1}|[2]{1}[0-3]{1}):[0-5]{1}[0-9]{1}#", $time);
    }
    
    public function settingAbsensi() {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $mulai = $this->input->post('mulaipulang');
        $selesai = $this->input->post('selesaipulang');
        $settingabsen = $this->karyawan->settingAbsensi($start, $end);
        $settingpulang = $this->karyawan->settingAbsenPulang($mulai, $selesai);
        if ($settingabsen && $settingpulang) {
            if ($this->isTime($start) && $this->isTime($end)) {
                $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil ubah setting absensi'));
                redirect(base_url().'karyawan/setting_absensi');
            }else{
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal ubah setting absensi'));
                redirect(base_url().'karyawan/setting_absensi');
            }
        }else{
           $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal ubah setting absensi'));
            redirect(base_url().'karyawan/setting_absensi');
        }
    }

    public function delete() {
        // $id = $this->uri->segment(3);
        // $cekId = $this->karyawan->getDataKaryawanById($id);
        $idkar = $this->input->post('idkar');
        $deleteKaryawan = $this->karyawan->deleteKaryawan($idkar);

        if($deleteKaryawan){
            $output['msg'] = 'success';
            echo json_encode($output);
        }   
    }

    public function tambahLibur() {
        $datalibur = array(
            'tgl' => $this->input->post('alternate'),
            'keterangan' => $this->input->post('ketlibur')
        );
        $addLibur = $this->karyawan->addLibur($datalibur);
        if($addLibur){
            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil tambah hari libur'));
            redirect(base_url().'karyawan/setting_absensi');
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal tambah hari libur'));
            redirect(base_url().'karyawan/setting_absensi');
        }
    }
    public function hapusLibur() {
        $id = $this->input->post('id');
        $deleteLibur = $this->karyawan->deleteLibur($id);
        if($deleteLibur){
            $output['msg'] = 'success';
            echo json_encode($output);
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal tambah hari libur'));
            redirect(base_url().'karyawan/setting_absensi');
        }
    }
    public function hari_absen() {
        $datahari = array(
            'hari' => $this->input->post('hari')
        );
        $cekhari = $this->karyawan->getLibur();
        if($cekhari == null){
            $this->karyawan->addHari($datahari);
        }else{
            $deleteLibur = $this->karyawan->deleteHari($datahari);
        }
        $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil Update Hari'));
    }
    public function SettingHariAbsen() {

        $y = $this->input->post('hariAbsen');
        $hari=array('hari'=>implode(",", $y),);
        $this->karyawan->updateHariAbsensi($hari);
        $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil Update Hari Absensi'));
        redirect(base_url().'karyawan/setting_absensi');
       
    }

    public function changeFotoKaryawan() {
        $uri = $this->uri->segment('3');
        $dataKaryawan = $this->karyawan->getDataKaryawanById($uri);
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
                redirect(base_url().'karyawan/edit/'.$uri); 
            } else {
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal update foto'));
                redirect(base_url().'karyawan/edit/'.$uri); 
            }
        }else{
            redirect(base_url().'karyawan/edit/'.$uri); 
        }
    }

    public function changeFotoAdmin() {
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
                redirect('Karyawan/profilAdmin');
            } else {
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal update foto'));
                redirect('Karyawan/profilAdmin');
            }
        }else{
            redirect('Karyawan/profilAdmin');
        }
    }

    public function changeInfoKaryawan($id) {
        $this->form_validation->set_rules('e_nik', 'NIK', 'callback_nikupdate_check|required|trim|max_length[20]');
        $this->form_validation->set_rules('e_name', 'Nama', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('e_password', 'Password', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('e_tentang', 'Tentang', 'trim|max_length[50]');
        $this->form_validation->set_rules('e_usercode', 'Username', 'callback_usernameupdate_check|required|trim|max_length[50]');
        $nik = $this->input->post('nik');
        $e_nik = $this->input->post('e_nik');
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
            $cekId = $this->karyawan->getDataKaryawanById($id);
            $dataKaryawan = $this->karyawan->getDataKaryawanById($id);
            $data['dataKar'] = $dataKaryawan;
            $data['getUser'] = $this->karyawan->getDataUser($id);
            $data['divisi'] = $this->karyawan->getDivisi();
            $data['bagian'] = $this->karyawan->getBagian();
            $data['cabang'] = $this->karyawan->getCabang();
            $data['absensiKaryawan'] = $this->karyawan->getAbsensiKaryawanById($id);
            $data['jmlIzin'] = notif();
            $data['halaman'] = $this->uri->segment('2');
            $this->load->view('admin/EditKaryawan', $data);
            
        }else{
            $changeInfo = $this->karyawan->changeInfoKaryawanById($nik, $datakar);
            $changeUserdata = $this->karyawan->changeUserById($nik, $userKar);

            if ($changeInfo && $changeUserdata) {
                $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil Update Data'));
                redirect(base_url().'karyawan/data_karyawan');
            }else{
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Update Data'));
                redirect(base_url().'karyawan/edit/'.$id);    
            }
        }        
    }
    public function changeInfoAdmin() {
        $this->form_validation->set_rules('e_nik', 'NIK', 'callback_nikupdate_check_admin|required|trim|max_length[20]');
        $this->form_validation->set_rules('e_password', 'Password', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('e_name', 'Nama', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('e_usercode', 'Username', 'callback_usernameupdate_check_admin|required|trim|max_length[50]');
        $nik = $this->input->post('nik');
        $e_nik = $this->input->post('e_nik');
        $name = $this->input->post('e_name');
        $datakar = array(
            'nik' => $e_nik, 
            'name' => $name,
            'email' => $this->input->post('e_email'),
            'handphone' => $this->input->post('e_handphone'),
        );
        $userKar = array(
            'nik' => $e_nik,
            'usercode' => $this->input->post('e_usercode'),
            'password' => $this->input->post('e_password')
        );

        if ($this->form_validation->run() == false) {
           $data['jmlIzin'] = notif();
            $data['namaadmin'] = $this->session->userdata('level');
            $data['dataAdmin'] = $this->karyawan->dataAdmin();
            $nikadmin= $this->session->userdata('nik');
            $data['dataKaryawan'] = info();
            $data['getUser'] = $this->karyawan->getDataUser($nikadmin);
            $data['halaman'] = $this->uri->segment('1');
            $this->load->view('admin/ProfilAdmin', $data); 
        }else{
            $this->session->set_userdata('nik', $e_nik);
            $this->session->set_userdata('usercode', $this->input->post('e_usercode'));
            $changeInfo = $this->karyawan->changeInfoKaryawanById($nik, $datakar);
            $changeUserdata = $this->karyawan->changeUserById($nik, $userKar);
            if ($changeInfo && $changeUserdata) {
                $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil Update Data'));
                redirect(base_url().'karyawan/profilAdmin');
            }else{
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Update Data'));
                redirect(base_url().'karyawan/profilAdmin');    
            }
        }        
    }
    public function nikupdate_check($nik){
        $old_nik = $this->uri->segment(3);
        $cek = $this->karyawan->cekNIK($nik, $old_nik);
        if ($cek != null ){
            $this->form_validation->set_message('nikupdate_check', '{field}: '.$nik.' sudah terdaftar!');
            return FALSE;
        }elseif($nik == $old_nik){
            return TRUE;
        }else{
            return TRUE;
        }
    }
    public function usernameupdate_check($username){
        $datauser = $this->karyawan->getDataUser($this->uri->segment(3));
        $old_username = $datauser[0]->usercode;
        $cekUsername = $this->karyawan->cekUsercode($username, $old_username);
        if ($cekUsername != null){
            $this->form_validation->set_message('usernameupdate_check', '{field}: '.$username.' sudah terdaftar!');
            return FALSE;
        }elseif($username == $old_username){
            return TRUE;
        }else{
            return TRUE;
        }
    }
    public function nikupdate_check_admin($nik){
        $old_nik = $this->session->userdata('nik');
        $cek = $this->karyawan->cekNIK($nik, $old_nik);
        if ($cek != null ){
            $this->form_validation->set_message('nikupdate_check_admin', '{field}: '.$nik.' sudah terdaftar!');
            return FALSE;
        }elseif($nik == $old_nik){
            return TRUE;
        }else{
            return TRUE;
        }
    }
    public function usernameupdate_check_admin($username){
        $datauser = $this->karyawan->getDataUser($this->session->userdata('nik'));
        $old_username = $datauser[0]->usercode;
        $cekUsername = $this->karyawan->cekUsercode($username, $old_username);
        if ($cekUsername != null){
            $this->form_validation->set_message('usernameupdate_check_admin', '{field}: '.$username.' sudah terdaftar!');
            return FALSE;
        }elseif($username == $old_username){
            return TRUE;
        }else{
            return TRUE;
        }
    }

    public function tambahKaryawan() {
        $this->form_validation->set_rules('nik', 'NIK', 'callback_nik_check|required|trim|max_length[20]');
        $this->form_validation->set_rules('name', 'Nama', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|trim');
        $this->form_validation->set_rules('tentang', 'Tentang', 'trim|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('usercode', 'Usercode', 'callback_username_check|required|trim|max_length[50]');
        // $upload = $this->karyawan->uploadImage();
        $usercode = $this->input->post('usercode'); 
        $password = $this->input->post('password');
        $nik = $this->input->post('nik');
        $ceknik = $this->karyawan->cekNIKadmin($nik);
        $cekcode = $this->karyawan->cekUsercodeadmin($usercode);
        $datakar = array(
            'nik' => $this->input->post('nik'),
            'name' => $this->input->post('name'),
            'cabang' => $this->input->post('cabang'), 
            'divisi' => $this->input->post('divisi'), 
            'bagian' => $this->input->post('bagian'), 
            'email' => $this->input->post('email'),
            'handphone' => $this->input->post('handphone'),
            'tentang' => $this->input->post('tentang'),
            'image_name' => 'default.png'
        );
        
        if ($this->form_validation->run() == false) {
            $array = array(
                'error'   => true,
                'nik_error' => form_error('nik'),
                'name_error' => form_error('name'),
                'divisi_error' => form_error('divisi'),
                'usercode_error' => form_error('usercode'),
                'password_error' => form_error('password'),
            );
            echo json_encode($array);
        }else{
            $addDataKarywan = $this->karyawan->addDataKaryawan($datakar);
            $addUserKaryawan = $this->karyawan->addUserKaryawan($this->input->post('nik'), $usercode, $password);
            $addAbsensiKaryawan = $this->karyawan->addAbsensiKaryawan(array('nik' => $this->input->post('nik'), 'hadir' => 0, 'datang_tepat' => 0, 'datang_terlambat' => 0, 'pulang_awal' => 0, 'pulang_tepat' => 0, 'pulang_terlambat' => 0));
            // $addBackupAbsensi = $this->karyawan->addBackupAbsensi(array('nik' => $this->input->post('nik'), 'hadir' => 0, 'datang_tepat' => 0, 'datang_terlambat' => 0, 'pulang_awal' => 0, 'pulang_tepat' => 0, 'pulang_terlambat' => 0));
            
            if ($addUserKaryawan && $addDataKarywan && $addAbsensiKaryawan) {
                // $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil ditambah'));
                $output['msg'] = 'success';
                echo json_encode($output);
                // $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil ditambah'));
                // redirect(base_url().'karyawan/data_karyawan');
            }else{
                $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal Menambah data !'));
                redirect(base_url().'karyawan/data_karyawan');
            }
        }    
    }
    public function nik_check($nik){
        $cek = $this->karyawan->cekNIKadmin($nik);
        if ($cek != null){
            $this->form_validation->set_message('nik_check', '{field}: '.$nik.' sudah terdaftar!');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function username_check($username){
        $cekUsername = $this->karyawan->cekUsercodeadmin($username);
        if ($cekUsername != null){
            $this->form_validation->set_message('username_check', '{field}: '.$username.' sudah terdaftar!');
            return FALSE;
        }else{
            return TRUE;
        }
    }


    public function AdminAbsenKaryawan() {
        $nik = $this->input->post('nik');
        $jumlah = $this->input->post('jumlah');
        $date = date('d F Y');
        $kar = $this->karyawan->getAbsensiKaryawanByNIK($nik);

        $tambahKehadiran = $this->karyawan->updateAlasan($nik, 'tidak_hadir', '+', $jumlah);
        $tambahHistory = $this->karyawan->addHistoryKar($kar[0]->nik, 'Tidak Hadir', date('l'), date('F'), date('Y'), date('d F Y'), date('h:i:s A'), '', '');
        if ($tambahKehadiran && $tambahHistory) {
            $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil'));
            redirect(base_url().'karyawan/absensi_karyawan');
        }else{
            $this->session->set_flashdata('pesanGagal', $this->pesanGagal('Gagal'));
            redirect(base_url().'karyawan/absensi_karyawan');
        }

    }

    // ----------------------- Upload Exel --------------------------------------------//
  public function form()
  {
    $data = array();
    // Buat variabel $data sebagai array
    if (isset($_POST['preview'])) {
        
      // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di karyawan_model.php
      $upload = $this->karyawan->upload_file($this->filename);
      if ($upload['result'] == "success") { // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH . 'PHPExcel/PHPExcel.php';
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
      } else { // Jika proses upload gagal
         // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        $this->session->set_flashdata('pesanGagal', $this->pesanGagal($data['upload_error'] = $upload['error']));
        redirect(base_url().'karyawan/data_karyawan');
      }
    }
    

    $data['dataKaryawan'] = info();
    $data['jmlIzin'] = notif();
    $data['getAllDataKaryawan'] = $this->karyawan->getAllDataKaryawan();
    $data['getUser'] = $this->karyawan->getUser();
    $data['halaman'] = $this->uri->segment('2');
    $this->load->view('admin/v_previewExcel', $data);
  }


  public function import()
  {
    // Load plugin PHPExcel nya
    include APPPATH . 'PHPExcel/PHPExcel.php';
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $datakar = array();
    $datauser = array();
    $dataAbsen = array();
    $numrow = 1;
    foreach ($sheet as $row) {
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if ($numrow > 1) {
        // Kita push (add) array data ke variabel data
        $i = 0;
            while ($i == 0) {
                $userCodestaf = createUserCode();
                $userPass = createPassword();
                $code = $this->karyawan->cekUsercodeImport($userCodestaf);
                $pass = $this->karyawan->cekPassword($userPass);
                if ($code == null && $pass == null) {
                    array_push($datakar, array(
                        'nik' => $row['A'],
                        'name' => $row['B'],
                        'image_name' => 'default.png'
                    ));
                    array_push($datauser, array(
                        'nik' => $row['A'],
                        'usercode' => $userCodestaf++,
                        'password' => $userPass++,
                        'level' => 'Karyawan'
                    ));
                    array_push($dataAbsen, array(
                        'nik' => $row['A'],'hadir' => 0, 'datang_tepat' => 0, 'datang_terlambat' => 0, 'pulang_awal' => 0, 'pulang_tepat' => 0, 'pulang_terlambat' => 0
                    ));

                    $i += 1;
                } else {
                    $i += 0;
                }
            }
      }
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model

    $this->karyawan->insert_multiple($datakar);
    $this->karyawan->insert_multiple_user($datauser);
    $this->karyawan->insert_multiple_absen($dataAbsen);
    $this->session->set_flashdata('pesanBerhasil', $this->pesanBerhasil('Berhasil'));
    redirect(base_url().'karyawan/data_karyawan');
  }
}