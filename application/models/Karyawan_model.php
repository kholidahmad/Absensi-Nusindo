<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllDataKaryawan() {
        $this->db->order_by('data_karyawan.name', 'ASC');
        $this->db->select();
        $this->db->from('data_karyawan');
        $this->db->join('users_karyawan', 'data_karyawan.nik=users_karyawan.nik');
        $this->db->where('level !=', 'admin');
        return $this->db->get()->result();
    }

    public function dataAdmin() {
        $this->db->select();
        $this->db->from('data_karyawan');
        $this->db->join('users_karyawan', 'data_karyawan.nik=users_karyawan.nik');
        $this->db->where('level', 'admin');
        return $this->db->get()->result();
    }
    public function getAllHistoryAbsen() {
        $this->db->order_by('id', 'DESC');
        $this->db->select('history_karyawan.*, data_karyawan.image_name,data_karyawan.name');
        $this->db->from('history_karyawan');
        $this->db->join('data_karyawan', 'data_karyawan.nik=history_karyawan.nik');
        $this->db->where('info !=', 'Reset');
        return $this->db->get()->result();
    }
    public function getDataUser($nik) {
        $this->db->where('nik', $nik);
        return $this->db->get('users_karyawan')->result();
    }
    public function getUser() {
        $this->db->select('id');
        return $this->db->get('users_karyawan')->result();
    }
    public function getDivisi() {
        $this->db->order_by('nama_divisi', 'ASC');
        $this->db->select();
        return $this->db->get('divisi')->result();
    }
    public function getBagian() {
        $this->db->order_by('nama_bagian', 'ASC');
        $this->db->select();
        return $this->db->get('master_bagian')->result();
    }
    public function getCabang() {
        $this->db->select();
        return $this->db->get('master_cabang')->result();
    }

    public function grafik_hadir()
    {
        $query = $this->db->query("SELECT SUBSTRING(periode, 1,7)AS periode, AVG(hadir)AS hadir FROM backup_data_absen GROUP BY periode");

        if ($query->num_rows() > 0) {
        foreach ($query->result() as $data) {
            $hasil[] = $data;
        }
        return $hasil;
        }
    }
    public function getDataHadir() {
        $this->db->order_by('divisi', 'ASC');
        $this->db->select('data_karyawan.nik,name,data_karyawan.divisi,hadir,datang_tepat,datang_terlambat,pulang_awal,pulang_tepat,pulang_terlambat,tidak_hadir');
        $this->db->from('data_karyawan');
        $this->db->join('absensi_karyawan', 'data_karyawan.nik=absensi_karyawan.nik');
        return $this->db->get()->result();
    }
    public function getHadirPerbulan($bulan) {
        $sql = "SELECT SUBSTRING(periode, 1,7)AS periode, backup_data_absen.nik,data_karyawan.name,data_karyawan.bagian,backup_data_absen.hadir,backup_data_absen.datang_tepat,backup_data_absen.datang_terlambat,backup_data_absen.pulang_awal,backup_data_absen.pulang_tepat,backup_data_absen.pulang_terlambat FROM backup_data_absen JOIN data_karyawan ON data_karyawan.nik = backup_data_absen.nik WHERE periode LIKE '%$bulan%' ORDER BY bagian ASC";
        return $this->db->query($sql)->result();
        // $this->db->order_by('bagian', 'ASC');
        // $this->db->select();
        // $this->db->from('backup_data_absen');
        // $this->db->like('periode', $bulan);
        // return $this->db->get()->result();
    }
    public function getDataBackupHadir() {
        $this->db->order_by('backup_data_absen.id', 'DESC');
        $this->db->select();
        $this->db->from('backup_data_absen');
        $this->db->join('data_karyawan', 'data_karyawan.nik=backup_data_absen.nik');
        return $this->db->get()->result();
    }
    // public function getTotalHadir() {
    //     $sql = "SELECT nik, nama,COUNT(info)as hadir FROM history_karyawan WHERE tanggal LIKE '%June 2020%' AND info='Absen Datang'";
    //     return $this->db->query($sql)->result();
    // }
    // public function getDatangTepat() {
    //     $sql = "SELECT nik, nama,COUNT(info)as datangTepat FROM history_karyawan WHERE tanggal LIKE '%June 2020%' AND info='Absen Datang'";
    //     return $this->db->query($sql)->result();
    // }
    public function getDetailAbsen() {
        $this->db->order_by('divisi', 'ASC');
        $this->db->select();
        $this->db->from('history_karyawan');
        $this->db->join('data_karyawan', 'data_karyawan.nik=history_karyawan.nik');
        return $this->db->get()->result();
    }
    public function getDataHadirByNIK($nik) {
        return $this->db->get_where('absensi_karyawan', array('nik' => $nik))->result();
    }

    public function getDataHadirAll() {
        $this->db->select('data_karyawan.nik,absensi_karyawan.hadir,absensi_karyawan.datang_tepat,absensi_karyawan.datang_terlambat,absensi_karyawan.pulang_awal,absensi_karyawan.pulang_tepat,absensi_karyawan.pulang_terlambat,absensi_karyawan.tidak_hadir');
        $this->db->from('absensi_karyawan');
        $this->db->join('data_karyawan', 'data_karyawan.nik=absensi_karyawan.nik');
        return $this->db->get()->result();
    }

    public function getDataKaryawanById($nik) {
        return $this->db->get_where('data_karyawan', array('nik' => $nik))->result();
    }
    // IZIN
    public function getDataIzinById($id_izin,$id_karyawwan) {
        return $this->db->get_where('izin', array(
            'id_izin' => $id_izin,
            'id_karyawan' => $id_karyawwan
        ))->result();
    }
    public function getSakit($id) {
        $sqlIzin = "SELECT COUNT(id_izin) AS jmlIzin FROM izin WHERE izin.status_izin = 'approved' AND izin.tipe ='Sakit'";
        return $data['jmlIzin'] = $this->db->query($sqlIzin)->row_array()['jmlIzin'];
    }
    public function approveIzinById($id, $data) {
        return $this->db->set($data)->where('kode_izin', $id)->update('izin');
    }
    // public function approveIzinByIdKar($id, $data) {
    //     return $this->db->set($data)->where('kode_izin', $id)->update('izin_karyawan');
    // }
    public function hapusIzinById($kode_izin) {
       return $this->db->delete('izin', array('kode_izin' => $kode_izin));
    }
    // public function hapusIzinKar($kode_izin) {
    //    return $this->db->delete('izin_karyawan', array('kode_izin' => $kode_izin));
    // }

    public function getDataKaryawanByNik($usercode) {
        // return $this->db->get_where('data_karyawan', array('usercode' => $usercode))->result();
        $sql = "SELECT data_karyawan.id, name, data_karyawan.nik, level FROM data_karyawan JOIN users_karyawan ON data_karyawan.nik=users_karyawan.nik AND users_karyawan.usercode= '$usercode'";
        return $this->db->query($sql)->result();
    }

    public function getAbsensiKaryawanById($nik) {
        return $this->db->get_where('absensi_karyawan', array('nik' => $nik))->result();
    }

    public function getIzinStart($nik) {
        $this->db->select('from_tgl');
        return $this->db->get_where('izin', array('nik' => $nik, 'status_izin' => 'approved'))->result();
    }
    public function getIzinEnd($nik) {
        $this->db->select('to_tgl');
        return $this->db->get_where('izin', array('nik' => $nik, 'status_izin' => 'approved'))->result();
    }

    public function getAbsensiKaryawanByNIK($nik) {
        $this->db->select();
        $this->db->from('data_karyawan');
        $this->db->where('nik', $nik);
        return $this->db->get()->result();
    }

    // public function getAlasanKaryawanByName($name) {
    //     return $this->db->order_by('id', 'DESC')->get_where('alasan_karyawan', array('nama' => $name))->result();
    // }
    public function getHistoryKaryawanByNIK($nik) {
        return $this->db->order_by('id', 'DESC')->get_where('history_karyawan', array('nik' => $nik))->result();
    }
    // public function getHistoryTGLByNIK($nik) {
    //     $this->db->order_by('id', 'DESC');
    //     $this->db->select('tanggal');
    //     return $this->db->get_where('history_karyawan', array('nik' => $nik))->result();
    // }

    public function getAllDataIzin() {
        $this->db->order_by('id_izin', 'ASC');
        $this->db->select();
        $this->db->from('izin');
        $this->db->join('data_karyawan', 'data_karyawan.nik=izin.nik');
        $this->db->where('izin.status_izin ="on progress"');
        return $this->db->get()->result();
    }
    public function getAllDataIzinKar($nik) {
        $this->db->order_by('id_izin', 'DESC');
        $this->db->select();
        $this->db->from('izin');
        $this->db->join('data_karyawan','data_karyawan.nik=izin.nik AND izin.nik ='.$nik);
        return $this->db->get()->result();
    }
    public function getIzin_belum($nik) {
        $this->db->select();
        $this->db->from('izin');
        $this->db->join('data_karyawan','data_karyawan.nik=izin.nik AND izin.sisa ="belum" AND izin.status_izin="approved" AND izin.nik='.$nik);
        return $this->db->get()->result();
    }
    public function getAllIzin_selesai() {
        $this->db->order_by('id_izin', 'DESC');
        $this->db->select();
        $this->db->from('izin');
        $this->db->join('data_karyawan','data_karyawan.nik=izin.nik');
        $this->db->where('izin.sisa ="selesai" OR izin.status_izin="rejected"');
        return $this->db->get()->result();
    }
    public function getIzinSakit() {
        $this->db->order_by('divisi', 'ASC');
        $this->db->select();
        $this->db->from('izin');
        $this->db->join('data_karyawan','data_karyawan.nik=izin.nik AND izin.status_izin ="approved" AND tipe="sakit" AND izin.sisa="belum"');
        return $this->db->get()->result();
    }
    public function getIzinPribadi() {
        $this->db->order_by('status_izin', 'DESC');
        $this->db->select();
        $this->db->from('izin');
        $this->db->join('data_karyawan','data_karyawan.nik=izin.nik AND izin.status_izin ="approved" AND tipe="pribadi" AND izin.sisa="belum"');
        return $this->db->get()->result();
    }
    public function getIzinLibur() {
        $this->db->order_by('status_izin', 'DESC');
        $this->db->select();
        $this->db->from('izin');
        $this->db->join('data_karyawan','data_karyawan.nik=izin.nik AND izin.status_izin ="approved" AND tipe="libur" AND izin.sisa="belum"');
        return $this->db->get()->result();
    }
    public function getIzinTahunan() {
        $this->db->order_by('status_izin', 'DESC');
        $this->db->select();
        $this->db->from('izin');
        $this->db->join('data_karyawan','data_karyawan.nik=izin.nik AND izin.status_izin ="approved" AND tipe="tahunan" AND izin.sisa="belum"');
        return $this->db->get()->result();
    }
    public function tambah_izin($dataizin){
        return $this->db->insert('izin', $dataizin);
    }
    // public function tambah_izinKar($dataizin){
    //     return $this->db->insert('izin_karyawan', $dataizin);
    // }
    public function tambah_sedang_izin($dataizin){
        return $this->db->insert('sedang_izin', $dataizin);
    }

    public function updateNIK($nik, $id) {
        $sql = "UPDATE data_karyawan SET nik = $id WHERE nik = $nik";
        return $sql;
    }
    public function changeInfoKaryawanById($id, $data) {
        return $this->db->set($data)->where('nik', $id)->update('data_karyawan');
    }
    public function changeUserById($nik, $data) {
        return $this->db->set($data)->where('nik', $nik)->update('users_karyawan');
    }

    public function updateDivisi($id,$divisi) {
        return $this->db->set('nama_divisi', $divisi)->where('id', $id)->update('divisi');
    }
    public function updateCabang($id,$cabang) {
        return $this->db->set('nama_cabang', $cabang)->where('id', $id)->update('master_cabang');
    }
    public function updateBagian($id,$bagian) {
        return $this->db->set('nama_bagian', $bagian)->where('id', $id)->update('master_bagian');
    }
    
    public function deleteDivisi($id) {
        return $this->db->delete('divisi', array('id' => $id));
    }
    public function deleteCabang($id) {
        return $this->db->delete('master_cabang', array('id' => $id));
    }
    public function deleteBagian($id) {
        return $this->db->delete('master_bagian', array('id' => $id));
    }

    public function addDivisi($data) {
        return $this->db->insert('divisi', array('nama_divisi' => $data));
    }
    public function addCabang($data) {
        return $this->db->insert('master_cabang', array('nama_cabang' => $data));
    }
    public function addBagian($data) {
        return $this->db->insert('master_bagian', array('nama_bagian' => $data));
    }

    public function addDataKaryawan($data) {
        return $this->db->insert('data_karyawan', $data);
    }
    public function addLibur($data) {
        return $this->db->insert('tgl_libur', $data);
    }
    public function updateHariAbsensi($hari) {
        return $this->db->set($hari)->where('id', '0')->update('hari_absen');
    }

    public function addUserKaryawan($nik, $usercode, $password) {
        return $this->db->insert('users_karyawan', array(
            'nik' => $nik, 
            'usercode' => $usercode, 
            'password' => $password, 
            'level' => 'Karyawan'
        ));
    }

    public function addAbsensiKaryawan($data) {
        return $this->db->insert('absensi_karyawan', $data);
    }
    public function addBackupAbsensi($data) {
        return $this->db->insert('backup_data_absen', $data);
    }

    public function absenHarian($nik) {
        return $this->db->set('absen', '1')->where('nik', $nik)->update('absensi_karyawan');
    }

    public function resetAllabsen(){
        $this->db->set('hadir', '0', FALSE);
        $this->db->set('datang_tepat', '0', FALSE);
        $this->db->set('datang_terlambat', '0', FALSE);
        $this->db->set('pulang_awal', '0', FALSE);
        $this->db->set('pulang_tepat', '0', FALSE);
        $this->db->set('pulang_terlambat', '0', FALSE);
        $this->db->set('tidak_hadir', '0', FALSE);
        return $this->db->update('absensi_karyawan');
    }

    public function updateAbsensiKaryawan($nik, $kehadiran, $option, $jumlah) {
        return $this->db->set($kehadiran, $kehadiran.$option.$jumlah, FALSE)->where('nik', $nik)->update('absensi_karyawan');
    }
    public function updateDatang($nik, $datang, $option, $jumlah) {
        return $this->db->set($datang, $datang.$option.$jumlah, FALSE)->where('nik', $nik)->update('absensi_karyawan');
    }
    public function updatePulang($nik, $pulang, $option, $jumlah) {
        return $this->db->set($pulang, $pulang.$option.$jumlah, FALSE)->where('nik', $nik)->update('absensi_karyawan');
    }
    public function updateAlasan($nik, $tipe, $option, $lama) {
        return $this->db->set($tipe, $tipe.$option.$lama, FALSE)->where('nik', $nik)->update('absensi_karyawan');
    }
    // public function updateAbsensiPulang($nik, $kehadiran, $option, $jumlah) {
    //     return $this->db->set($kehadiran, $kehadiran.$option.$jumlah, FALSE)->where('nik', $nik)->update('absensi_karyawan');
    // }

    // public function addAlasanKaryawan($name, $alasan, $date) {
    //     return $this->db->insert('alasan_karyawan', array('nama' => $name, 'alasan' => $alasan, 'tanggal' => $date));
    // }

    public function resetAbsen() {
        return $this->db->set('hadir', '0', FALSE)->update('absensi_karyawan');
    }

    public function deleteKaryawan($idkar) {
        
        return $this->db->delete('data_karyawan', array('nik' => $idkar));
    }
    public function deleteLibur($id) {
        return $this->db->delete('tgl_libur', array('id' => $id));
    }
    public function deleteHari($hari) {
        return $this->db->delete('hari_absen', array('hari' => $hari));
    }
    
    public function loginKaryawan($usercode, $password) {
        return $this->db->where('usercode', $usercode)->where('password', $password)->get('users_karyawan')->result();
    }

    public function settingAbsensi($start, $end) {
        return $this->db->set('mulai_absen', $start)->set('selesai_absen', $end)->update('setting_absensi');
    }
    public function settingAbsenPulang($mulai, $selesai) {
        return $this->db->set('mulai_absen', $mulai)->set('selesai_absen', $selesai)->update('setting_pulang');
    }

    public function getSettingAbsensi() {
        return $this->db->get('setting_absensi')->result();
    }
    public function getSettingPulang() {
        return $this->db->get('setting_pulang')->result();
    }
    public function getHariLibur() {
        return $this->db->get('tgl_libur')->result();
    }
    public function getLibur() {
        return $this->db->get('hari_absen')->result();
    }
    public function getBulanAbsen() {
        $this->db->select('bulan');
        $this->db->distinct('bulan');
        return $this->db->get('history_karyawan')->result();
    }
    public function getTahunAbsen() {
        $this->db->distinct('tahun');
        $this->db->distinct('tahun');
        return $this->db->get('history_karyawan')->result();
    }
    public function getBackupAbsenBulan() {
        $sql = "SELECT DISTINCT SUBSTRING(periode, 1,7) as bulan FROM backup_data_absen  ORDER BY bulan DESC";
        return $this->db->query($sql)->result();
    }

    public function addHistoryKar($nik, $info, $hari, $bulan, $tahun, $tgl, $jam, $lok, $statusAbsen) {
        return $this->db->insert('history_karyawan', array('nik' => $nik, 'info' => $info, 'hari'=> $hari,'bulan'=>$bulan, 'tahun'=>$tahun, 'tanggal'=> $tgl, 'jam'=> $jam, 'lokasi'=>$lok, 'status_absen' => $statusAbsen));
    }
    public function addHistoryResetKar($nik, $name, $info, $tgl) {
        return $this->db->insert('history_reset_user', array('nik' => $nik,'nama' => $name, 'info' => $info, 'tgl_reset'=> $tgl));
    }

    public function cekHistoryResetKar($nama, $bulannow) {
        $this->db->select();
        $this->db->from('history_reset_user');
        $this->db->where('nama', $nama);
        $this->db->like('tgl_reset', $bulannow);
        return $this->db->get()->result();
    }
    public function cekHistoryResetKar2($nik,$nama, $bulannow) {
        $this->db->select();
        $this->db->from('history_reset_user');
        $this->db->where('nik', $nik);
        $this->db->where('nama', $nama);
        $this->db->like('tgl_reset', $bulannow);
        return $this->db->get()->result();
    }
    public function cekHistoryReset($nik, $nama, $tglnow) {
        $this->db->select();
        $this->db->from('history_reset_user');
        $this->db->where('nik', $nik);
        $this->db->where('nama', $nama);
        $this->db->like('tgl_reset', $tglnow);
        return $this->db->get()->result();
    }
    public function cekHistoryAbsenKar($nik, $tgl) {
        return $this->db->get_where('history_karyawan', array('nik' => $nik, 'info' => 'Absen Datang','tanggal'=> $tgl))->result();
    }
    public function cekHistoryShift($nik, $tgl) {
        return $this->db->get_where('history_karyawan', array('nik' => $nik, 'info' => 'Absen Shift Datang','tanggal'=> $tgl))->result();
    }
    public function cekHistoryPulang($nik, $tgl) {
        return $this->db->get_where('history_karyawan', array('nik' => $nik, 'info' => 'Absen Pulang','tanggal'=> $tgl))->result();
    }
    public function cekHistoryPulangShift($nik, $tgl) {
        return $this->db->get_where('history_karyawan', array('nik' => $nik, 'info' => 'Absen Shift Pulang','tanggal'=> $tgl))->result();
    }
    public function cekPassword($password) {
        return $this->db->get_where('users_karyawan', array('password'=> $password))->result();
    }
    public function cekPasswordLogin($nik, $password) {
        return $this->db->get_where('users_karyawan', array('usercode'=> $nik,'password'=> $password))->result();
    }
    public function cekNIKadmin($nik) {
        return $this->db->get_where('data_karyawan', array('nik'=> $nik))->result();
    }
    public function cekUsercodeadmin($usercode) {
        return $this->db->get_where('users_karyawan', array('usercode'=> $usercode))->result();
    }
    public function cekUsercodeImport($usercode) {
        return $this->db->get_where('users_karyawan', array('usercode'=> $usercode))->result();
    }
    public function cekNIK($nik, $old_nik) {
        return $this->db->get_where('data_karyawan', array('nik'=> $nik, 'nik !='=> $old_nik))->result();
    }
    public function cekUsercode($usercode, $old_usercode) {
        return $this->db->get_where('users_karyawan', array('usercode'=> $usercode, 'usercode !='=>  $old_usercode))->result();
    }
    public function cekKodeIzin($kodeizin) {
        return $this->db->get_where('izin', array('kode_izin'=> $kodeizin))->result();
    }
    public function cekHariLibur($tglini) {
        return $this->db->get_where('tgl_libur', array('tgl'=> $tglini))->result();
    }
    public function cekHariAbsen($hini) {
        $this->db->like('hari', $hini);
        return $this->db->get('hari_absen')->result();
    }
    public function ceksedangizin($nik) {
        return $this->db->get_where('izin', array('nik'=> $nik, 'status_izin'=>'approved', 'sisa'=>'belum'))->result();
    }
    public function cekInputsedangizin($nik) {
        return $this->db->get_where('izin', array('nik'=> $nik, 'sisa'=>'belum','status_izin'=>'approved'))->result();
    }
    public function cekInputizin($nik) {
        return $this->db->get_where('izin', array('nik'=> $nik, 'sisa'=>'belum','status_izin'=>'on progress'))->result();
    }
    // public function cekAllsedangizin($nik) {
    //     return $this->db->get_where('izin', array('nik'=> $nik, 'status_izin'=>'approved'))->result();
    // }

    public function uploadImage() {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('upload_image')) {
            return array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        }else{
            return array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        }
    }

    //---------------------- GENERATE Exel --------------------------
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }    // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data){
    $this->db->insert_batch('data_karyawan', $data);
  }

  public function insert_multiple_user($data){
    $this->db->insert_batch('users_karyawan', $data);
  }
  public function insert_multiple_absen($data){
    $this->db->insert_batch('absensi_karyawan', $data);
  }
  public function insert_multiple_backup($data){
    $this->db->insert_batch('backup_data_absen', $data);
  }
  
}