<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->


<!-- <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url(); ?>assets/images/nusindo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                <small>PT. RAJAWALI NUSINDO</small>
            </a>
        </nav>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav> -->


<div class="dashboard-header ">
    <!-- <nav class="navbar bg-primary fixed-top">
        <a class="navbar-brand text-white" href="<?php echo base_url(); ?>karyawan"">
            <img src="<?= base_url(); ?>assets/images/nusindo.png" alt="User Avatar" class="rounded-circle" width="45px">
            <small>PT. RAJAWALI NUSINDO</small>
            
            <a class="nav-link " href="#" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-white"></span>
            <img class="img-profile rounded-circle" src="">
            </a>
            
        </a>

        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    </nav> -->
    
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top " 
    style="background-image: linear-gradient(to right, #ad5389, #3c1053);">
        <a class="navbar-brand" href="<?php echo base_url(); ?>karyawan">
            <img src="<?= base_url(); ?>assets/images/nusindo.png" width="35px" class="d-inline-block align-center"> 
            <small><b> NUSI ATTENDANCE </b></small>   
        </a>
        <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- <form class="form-inline my-2 my-lg-0 ">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <!-- <i class="far fa-envelope fa-sm fa-fw mr-2 text-white"><span class="badge badge-pill badge-success"><?= $jmlIzin ?></span></i> -->
                <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline small"></span>
                        <img src="<?php echo base_url(); ?>images/<?= $dataKaryawan[0]->image_name; ?>" alt="" class="rounded-circle d-inline-block align-center" 
                        style="height: 38px;width: 38px;">
                        <small class="text-white ml-2" style="text-transform: uppercase;" ><b> <?= $dataKaryawan[0]->name; ?> </b></small>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('Karyawan/profilAdmin')?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                        My Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>karyawan/logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </form>
        </div>
    </nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->