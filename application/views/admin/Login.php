<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= SITE_NAME; ?> - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">	 -->
<link rel="icon" type="image/png" href="assets/vendor/login_v2/images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/login_v2/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/login_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/login_v2/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/login_v2/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/login_v2/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/login_v2/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/login_v2/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/login_v2/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/login_v2/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/login_v2/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
        <img src="<?= base_url(); ?>assets/images/login3.png" class="d-none d-md-block d-xs-block d-sm-block mr-5">
			<div class="wrap-login100 ml-5" style="border-radius:20px;">
                <form method="POST" action="<?= base_url(); ?>auth/loginKaryawan" class="login100-form validate-form">
					<span class="login100-form-title mb-5">
						<a class="navbar-brand text-white" href="#"><img src="<?= base_url(); ?>assets/images/nusindo.png" alt="User Avatar" width="100px"></a>
					</span>
					<span class="login100-form-title mb-5">
						NUSI <br> ATTENDANCE
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="usercode">
						<span class="focus-input100" data-placeholder="Username"></span>
                        <?= form_error('username', '<small class="text-danger pl-2">','</small>')?>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
                        <?= form_error('password', '<small class="text-danger pl-2">','</small>')?>
					</div>
                    <div class="form-group">
                      <div class="wrap-input100 custom-checkbox small">
                        <input type="checkbox" class="wrap-input100-input" name="remember" id="customCheck">
                        <label class="wrap-input100-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								LOGIN
							</button>
						</div>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
            <?php $this->load->view('admin/partials/footer'); ?>
	
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/login_v2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/login_v2/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/login_v2/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/login_v2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/login_v2/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/login_v2/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/login_v2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/login_v2/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/login_v2/js/main.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
		<?= $this->session->flashdata('messageAlert'); ?>
	</script>
</body>
</html>