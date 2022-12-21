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
      'plugin/bootstrap/css/bootstrap.min.css',
      'template/shards-dashboard/styles/extras.1.1.0.min.css',
      'plugin/DataTables/datatables.min.css',
    ]); ?>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" id="main-stylesheet" data-version="1.1.0"
		href="<?php echo base_url('assets/template/shards-dashboard/') ?>styles/shards-dashboards.1.1.0.min.css">

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
									<div>
										<h1 class="h5 mb-0" style="color:white;"><span><b>Hello !</b></span></h1> 
										<h1 class="h5 mb-4" style="color:DodgerBlue;"><span><b>Welcome To SIMANIKA !</b></span></h1>
									</div>
									<hr color="white">
									<h1 class="h5 mb-4 text-center" style="color:white;"><span style="Color:DodgerBlue;"><b>Reset </b></span>Your Password</h1>  
									<form class="user">
										<div class="form-group">
											<input type="password" class="form-control form-control-user"
                                            id="txt_pass" placeholder="New Password" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user"
												id="txt_confirmpass" placeholder="Confirm password" required>
										</div>
										<div>
											<button class="btn btn-primary btn-user btn-block btn-reset-password" type="submit"
													name="submit">Confirm</button>
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
		$(document).ready(function () {
			(function () {
				data = {
					email: "<?php echo $_GET['email'] ?>",
					token: "<?php echo $_GET['token'] ?>"
				}

				callApi("POST", "auth/check_token_reset", data, function (req) {
					pesan = req.message;
					if (req.error == true) {
						Swal.fire(
					      	'Error!',
					      	pesan,
					      	'error'
					    ).then((result) => {
					    	window.location.href = "<?php echo base_url() ?>"
					    })
					}
				})
			})();


			$(document).on('click', '.btn-reset-password', function (e) {
				e.preventDefault()
				
				data = {
					email: "<?php echo $_GET['email'] ?>",
					token: "<?php echo $_GET['token'] ?>",
					password: $("input#txt_pass").val(),
					confirm_password: $("input#txt_confirmpass").val()
				}

				callApi("POST", "auth/resetpassword", data, function (req) {
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
							window.location.href = "<?php echo base_url() ?>"
						})
					}
				})
			})
		})
  	</script>

</body>

</html>
