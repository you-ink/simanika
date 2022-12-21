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
					<div class="card-body p-0" style="background-color:Black;">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-5 d-none d-lg-block bg-login-image">
								<div class="col-13 pt-4">
								<img src="<?php echo base_url() ?>assets/img/logo.png" alt="simanika"  style="width:400px;height:400px;">
								</div>
							</div>
							<div class="col-lg-7">
								<div class="p-5">
									<div class="text">
										<h1 class="h4 mb-4" style="color:white;"><span>REGISTER</h1>
										<h6 class="h6 mb-4" style="color:white;">Thank You for joining us. Please
											register by
											completing the information below. </h6> <br>
									</div>
									<div>
										<form style="max-height: 400px !important; overflow-y: scroll; overflow-x: hidden;" class="p-2">
											<div class="form-row">
												<div class="form-group col-md-12">
													<label for="fefulltName" style="color:white;">Nama Lengkap</label>
													<input type="text" class="form-control"
														id="fefulltName" placeholder="Nama lengkap"
														value="Muhammad Rudy Darmawan"> </div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="feEmailAddress" style="color:white;">Email</label>
													<input type="email" class="form-control"
														id="feEmailAddress" placeholder="Email"> </div>
												<div class="form-group col-md-6">
													<label for="fePassword" style="color:white;">NIM</label>
													<input type="password" class="form-control"
														id="fePassword" placeholder="Password"> </div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="feAngkatan" style="color:white;">Angkatan</label>
													<input type="Angkatan" class="form-control" id="feNoHp"
														placeholder="Angkatan">
												</div>
												<div class="form-group col-md-6">
													<label for="feNoHp" style="color:white;">NO HP</label>
													<input type="NoHp" class="form-control" id="feNoHp"
														placeholder="Nomer Hanphone">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-12">
													<label style="color:white;">Alamat</label>
													<textarea name="" id="alamat" rows="3"
														class="form-control"></textarea>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="feEmailAddress" style="color:white;">Password</label>
													<input type="email" class="form-control"
														id="feEmailAddress" placeholder="Email"> </div>
												<div class="form-group col-md-6">
													<label for="fePassword" style="color:white;">Confirm Password</label>
													<input type="password" class="form-control"
														id="fePassword" placeholder="Password"> </div>
											</div>
											<div class="from-row">
												<div class="form-group">
													<div class="form-group col-md-12">
														<label style="color:white;">Bukti Kesanggupan</label>
														<input id="tor" type="file"
															accept=".pdf, .docx, .doc">
													</div>
													<div
														class="form-group col-12 text-right btn--upload-file d-none">
														<button type="button"
															class="btn btn-sm btn-secondary btn--upload-tor">Upload</button>
													</div>
												</div>
												<div class="from-group">
													<div class="form-group col-md-12">
														<label style="color:white;">Bukti Mahasiswa</label>
														<input id="tor" type="file"
															accept=".pdf, .docx, .doc">
													</div>
												</div>
												<div class="from-group">
													<div class="form-group col-md-12">
														<input type="submit" value="Register" class="form-control btn btn-primary">
													</div>
												</div>
											</div>
										</form>
										<hr>
										<div class="text-center">
											<a class="small" href="register.php" style="color:white;">Already have an account?
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
