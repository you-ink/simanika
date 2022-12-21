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
	<link rel="icon" href="<?php echo base_url('assets/img/icon.png') ?>" type="image/icon type">

	<?= stylesheet([
      'plugin/fontawesome/css/all.min.css',
      'plugin/bootstrap/css/bootstrap.min.css',
    ]); ?>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="<?php echo base_url() ?>assets/img/icon.png" alt="simanika">
                            </div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Welcome Back To Simanika</h1>
									</div>
									<form class="user" action="login.php" method="POST">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="txt_email"
												placeholder="email" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user"
												id="txt_pass" placeholder="password" required>
										</div>
										<div>
											<input class="btn btn-primary btn-user btn-block btn-login" name="button" value="Login">
										</div>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="register.php">Create an Account!</a>
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
		$(document).on('click', '.btn-login', function (e) {
			e.preventDefault()
			
			data = {
				email: $("input#txt_email").val(),
				password: $("input#txt_pass").val()
			}

			data[get_api_login_global()['key']] = get_api_login_global()['value'];

			callApi("POST", "auth/login", data, function (req) {
				pesan = req.message;
				if (req.error == true) {
					Swal.fire(
				      'Gagal!',
				      pesan,
				      'error'
				    )
				}else{
					Swal.fire(
				      'Berhasil!',
				      pesan,
				      'success'
				    ).then((result) => {
				  		cookie.set('uid',req.data.token);
						cookie.set('sesid',req.data.sesID);
						window.location.href = "<?php echo base_url('dashboard') ?>"
					})
				}
			})
		})
    </script>
</body>

</html>
