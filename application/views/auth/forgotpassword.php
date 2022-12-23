<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $title ?></title>
	<meta name="description" content="Official website Himpunan Mahasiswa Teknik Informatika (Himanika) POLIJE.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url('assets/img/logo2-himanika.png') ?>" type="image/icon type">

	<?= stylesheet([
      'plugin/fontawesome/css/all.min.css',
      'plugin/bootstrap/css/bootstrap.min.css'
    ]); ?>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-9 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row" style="background-color:black;">
							<div class="col-lg-5 d-none d-lg-block bg-login-image pt-5">
								<div class="col-md-2">
									<img src="<?php echo base_url() ?>assets/img/logo.png" alt="simanika">
								</div>

							</div>
							<div class="col-lg-7" style="background-color:Black">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h3 mb-0" style="color:white;"><span><b>Forgot Your Password
													?</b></span></h1>
										<hr class="text-white bg-info">
										<h6 class="text-white mb-4">Enter email address that associated with your
											account </h6> <br>
										<form class="user" action="login.php" method="POST">
											<div class="form-group">
												<input type="text" class="form-control form-control-user" id="txt_email"
													placeholder="Enter your email" required>
											</div>
											<div>
												<button class="btn btn-primary btn-user btn-block btn-forgot-password"
													type="submit" name="submit">Send Link</button> <br>
											</div>
											<div class="h6 text-right">
												<a class="small text-white mb-4"
													href="<?php echo base_url('login') ?>">Back to Login</a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		function get_api_url() {
			return "<?php echo base_url('api/') ?>";
		}

	</script>

	<?= script([
    'js/jquery-3.6.1.min.js',
    'plugin/bootstrap/js/bootstrap.bundle.min.js',
    'plugin/sweetalert2/sweetalert2.all.min.js',
    'js/main.js',
  ]); ?>

	<script>
		$(document).on('click', '.btn-forgot-password', function (e) {
			e.preventDefault()
			$(this).html("<i class='fas fa-spinner fa-pulse'></i>")
			$(this).attr('disabled', true)

			data = {
				email: $("input#txt_email").val()
			}

			callApi("POST", "auth/forgotpassword", data, function (req) {
				pesan = req.message;
				if (req.error == true) {
					Swal.fire(
						'Gagal!',
						pesan,
						'error'
					).then((result) => {
						$('.btn-forgot-password').html("Send Link")
						$('.btn-forgot-password').attr('disabled', false)
					})
				} else {
					Swal.fire(
						'Berhasil!',
						pesan,
						'success'
					).then((result) => {
						$('.btn-forgot-password').html("Send Link")
						$('.btn-forgot-password').attr('disabled', false)
					})
				}
			})
		})

	</script>

</body>

</html>
