<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/chartist-bundle/chartist.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/morris.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/c3charts/c3.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-select/css/bootstrap-select.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/datatables.bootstrap4.css');?>"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/datatables/css/buttons.dataTables.min.css">

    <!-- SweetAlert2 -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/swal-forms-master/swal-forms.css"> -->

    <!-- DATE PICKER -->

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-datepicker/css/datepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/datepicker/datepicker3.css');?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/jquery-ui-1.12.1/jquery-ui.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/jquery-ui-1.12.1/jquery-ui.structure.min.css');?>">

    <!-- DATATABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- SELECTABLE -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
    #feedback { font-size: 1.4em; }
    #selectable .ui-selecting { background: #FECA40; }
    #selectable .ui-selected { background: #F39814; color: white; }
    #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
    </style> -->

    <!-- FontAwesome -->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <meta name="description" content="Absensi" />
	<meta name="keywords" content="absensi, karyawan, karyawan management, Absensi, kantor management" />
    <meta name="author" content="Fansa" />
    
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/nusindo.png" type="image/gif">
    <style>
    body {
        margin: 0;
        font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
    }
    .breadcrumb-item{
        font-size: 0.90rem;
    }
    .topbar-divider {
        width: 0;
        border-right: 1px solid #e3e6f0;
        height: calc(4.375rem - 2rem);
        margin: auto 1rem;
        }
    .ui-datepicker { 
        margin-left: 100px;
        z-index: 1000;
    }
    .ui-datepicker-trigger { 
        margin-top:7px;
        margin-left: -30px;
        margin-bottom:0px;
        position:absolute;
        z-index:1000;
    }
    .ui-draggable, .ui-droppable {
	background-position: top;
    }

    .dashboard-main-wrapper{
        background-color: #F0F2F5;
        border-radius: 20px;
        box-shadow: 0 4px 10px 0px rgba(0, 0, 0, 0.14), 0 7px 5px -5px rgba(156, 39, 176, 0.4);
    }

    .nav-link.aktiv{
        background-color: white;
        border-radius: 20px;
        background: linear-gradient(145deg, #e6e6e6, #ffffff);
        box-shadow:  5px 5px 10px #c4c4c4, 
                    -5px -5px 10px #ffffff;
    }

    .nav-link.aktiv img {
        width:35px;
        height:35px;
    }


    img.foto{
        box-shadow:  5px 5px 10px #c4c4c4, 
            -5px -5px 10px #ffffff;
    }
    .btn.foto{
        box-shadow: 0px 0px 0px;
    }

    /* #F0F2F5 rgba(240,242,245) */
    /* .card{
        border-radius: 10px;
        box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);

    } */

    .card {
        /* NEUMORPHISM */
        border-radius: 20px;
        background: #ffffff;
        box-shadow:  8px 8px 16px #828282, 
                    -8px -8px 16px #ffffff;
    }

    input, select, option, textarea, .badge, .form-group, .form-control, .custom-select, .nav-link.card, .nav-item.nav-link, .alert{
        border-radius: 10px;
    }
    .btn {
        border-radius: 20px;
        box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
    }
    .form-check, .nav-link{
        font-size: 1rem;
    }

    </style>