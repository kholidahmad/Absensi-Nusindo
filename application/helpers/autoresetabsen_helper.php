<?php

    function autoreset_absen(){
        
        $x = get_instance();
        return $x->db->set('hadir', '0', FALSE)->update('absensi_karyawan');

    }
    function autoreset_absen_kar($nik, $dataReset){
        $x = get_instance();
        return $x->db->set($dataReset)->where('nik', $nik)->update('absensi_karyawan');
    }

    function autobackupPerBulan($gethadir){
        $x = get_instance();
        $x->karyawan->insert_multiple_backup($gethadir);
        // jangan sampai kebalik
        $x->karyawan->resetAllabsen();
    }
    
    function backup_absen($nik, $databackuphadir){
        $x = get_instance();
        return $x->db->insert('backup_data_absen', $databackuphadir);
    }
    
    function autoreset_izin($nik, $sisa, $selesai){
        $x = get_instance();
        $x->db->set($sisa, $selesai)->where('nik', $nik)->update('izin');
        return $x->db->set($sisa, $selesai)->where('nik', $nik)->update('izin_karyawan');
    }
    function delSedang_izin($nik){
        $x = get_instance();
        return $x->db->delete('sedang_izin', array('nik' => $nik));
    }

?>