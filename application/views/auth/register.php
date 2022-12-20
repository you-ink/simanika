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
										<h1 class="h4 text-gray-900 mb-4">Welcome To Simanika</h1>
									</div>
									<form>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="fefulltName">Nama Lengkap</label>
												<input type="text" class="form-control" id="fefulltName"
													placeholder="Nama lengkap"
													value="Muhammad Rudy Darmawan"> </div>
											<div class="form-group col-md-6">
												<label for="feUserName">UserName</label>
												<input type="text" class="form-control" id="feUserName"
													placeholder="User Name" value="Rudydar"> </div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="feEmailAddress">Email</label>
												<input type="email" class="form-control" id="feEmailAddress"
													placeholder="Email" value="Rudy@gmail.com"> </div>
											<div class="form-group col-md-6">
												<label for="fePassword">Password</label>
												<input type="password" class="form-control" id="fePassword"
													placeholder="Password"> </div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="feNIM">NIM</label>
												<input type="NIM" class="form-control" id="feNIM"
													placeholder="NIM" value="E31200880"> </div>
											<div class="form-group col-md-6">
												<label for="feNoHp">NO HP</label>
												<input type="NoHp" class="form-control" id="feNoHp"
													placeholder="Nomer Hanphone" value="081236915399">
											</div>
										</div>
										<div>
											<input class="btn btn-primary btn-user btn-block" type="submit"
												name="submit" value="Register">
										</div>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="register.php">Already have an account?
											Login!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
