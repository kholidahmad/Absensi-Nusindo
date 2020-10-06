<?php

    function info(){
        $x = get_instance();
        $nikadmin= $x->session->userdata('nik');
        return $data['dataKaryawan'] = $x->karyawan->getDataKaryawanById($nikadmin);
    }
    function infoKar(){
        $x = get_instance();
        $nikKar= $x->session->userdata('nik');
        return $data['dataKaryawan'] = $x->karyawan->getDataKaryawanById($nikKar);
    }


    function check_hari($hari){
        $x = get_instance();
        $x->db->where('hari', $hari);
        $result = $x->db->get('hari_libur');
        if($result != null){
            return "checked='checked'";
        }
    }
    

?>