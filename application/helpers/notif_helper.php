<?php

    function notif(){
        $x = get_instance();
        $sqlIzin = "SELECT COUNT(id_izin) AS jmlIzin FROM izin WHERE izin.status_izin = 'on progress'";
        return $data['jmlIzin'] = $x->db->query($sqlIzin)->row_array()['jmlIzin'];
    }
    function sudahHadir(){
        $x = get_instance();
        $date = date('d F Y');
        $sql = "SELECT COUNT(info) AS jmlHadir FROM history_karyawan WHERE info='Absen Datang' AND tanggal='$date'";
        return $data['jmlHadir'] = $x->db->query($sql)->row_array()['jmlHadir'];
    }
    function sudahPulang(){
        $x = get_instance();
        $date = date('d F Y');
        $sql = "SELECT COUNT(info) AS jmlPulang FROM history_karyawan WHERE info='Absen Pulang' AND tanggal='$date'";
        return $data['jmlPulang'] = $x->db->query($sql)->row_array()['jmlPulang'];
    }
    function jmlCuti(){
        $x = get_instance();
        $date = date('d F Y');
        $sql = "SELECT COUNT(kode_izin) AS jmlCuti FROM izin WHERE status_izin='approved' AND sisa='belum'";
        return $data['jmlCuti'] = $x->db->query($sql)->row_array()['jmlCuti'];
    }
    

?>