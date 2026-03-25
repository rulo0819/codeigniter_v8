<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url(DIR_RECURSOS_IMAGES . '/icons/favicon.ico') ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(DIR_RECURSOS_VENDOR . '/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(DIR_RECURSOS_FONTS . '/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(DIR_RECURSOS_VENDOR . '/animate/animate.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(DIR_RECURSOS_VENDOR . '/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(DIR_RECURSOS_VENDOR . '/select2/select2.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(DIR_RECURSOS_CSS . '/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url(DIR_RECURSOS_CSS . '/main.css') ?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= base_url(DIR_RECURSOS_IMAGES . '/img-01.png') ?>" alt="IMG">
				</div>


					<?= form_open('login', ['class' => 'login100-form validate-form']) ?>
					<?= csrf_field() ?>
					<span class="login100-form-title">
						Member Login
					</span>

					<?php if (session()->getFlashdata('error')): ?>
						<div class="alert alert-danger" role="alert">
							<?= esc(session()->getFlashdata('error')) ?>
						</div>
					<?php endif; ?>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<?= form_input([
							'name' => 'email',
							'type' => 'email',
							'class' => 'input100',
							'placeholder' => 'Email',
							'value' => set_value('email')
						]) ?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<?= form_password([
							'name' => 'password',
							'class' => 'input100',
							'placeholder' => 'Password'
						]) ?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<?= form_submit('btnSubmit', 'Login', 'class="login100-form-btn"') ?>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?= base_url(DIR_RECURSOS_VENDOR . '/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(DIR_RECURSOS_VENDOR . '/bootstrap/js/popper.js') ?>"></script>
	<script src="<?= base_url(DIR_RECURSOS_VENDOR . '/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(DIR_RECURSOS_VENDOR . '/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(DIR_RECURSOS_VENDOR . '/tilt/tilt.jquery.min.js') ?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url(DIR_RECURSOS_JS . '/main.js') ?>"></script>

</body>
</html>
