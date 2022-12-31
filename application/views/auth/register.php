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
      'plugin/fancy-file-uploader/fancy_fileupload.css',
    ]); ?>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<style type="text/css">
		.ff_fileupload_filename {
		   max-width: 280px !important;
		}
	</style>

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
								<div class="col-12 pt-5">
									<img src="<?php echo base_url() ?>assets/img/logo.png" alt="simanika"
										style="width:400px;height:400px;">
								</div>
							</div>
							<div class="col-lg-7">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h3 mb-0" style="color:white;"><span><b>REGISTER</b></span></h1>
										<hr class="text-white bg-info">
										<h6 class="text-white mb-4">Thank You for joining us. Please
											register by completing the information below. </h6>
									</div>
									<!-- <div class="text">
										<h1 class="h3 mb-4" style="color:white;"><span>REGISTER</h1>
										<h6 class="h6 mb-4" style="color:white;">Thank You for joining us. Please
											register by completing the information below. </h6> <br> -->
								<form style="max-height: 400px !important; overflow-y: scroll; overflow-x: hidden;"
									class="p-2">
									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="fefulltName" style="color:white;">Nama Lengkap</label>
											<input type="text" class="form-control" id="nama"
												placeholder="Nama lengkap"> </div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="feEmailAddress" style="color:white;">Email</label>
											<input type="email" class="form-control" id="email"
												placeholder="Email"> </div>
										<div class="form-group col-md-6">
											<label for="fePassword" style="color:white;">NIM</label>
											<input type="text" class="form-control" id="nim"
												placeholder="NIM"> </div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="feAngkatan" style="color:white;">Angkatan</label>
											<input type="text" class="form-control" id="angkatan"
												placeholder="Angkatan">
										</div>
										<div class="form-group col-md-6">
											<label for="feNoHp" style="color:white;">NO HP</label>
											<input type="text" class="form-control" id="telp"
												placeholder="Nomer Hanphone">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											<label style="color:white;">Alamat</label>
											<textarea name="" id="alamat" rows="3" class="form-control"></textarea>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="feEmailAddress" style="color:white;">Password</label>
											<input type="password" class="form-control" id="password"
												placeholder="Password"> </div>
										<div class="form-group col-md-6">
											<label for="fePassword" style="color:white;">Konfirmasi Password</label>
											<input type="password" class="form-control" id="confirm_password"
												placeholder="Konfirmasi Password"> </div>
									</div>
									<div class="form-row upload--foto text-white">
										<div class="form-group col-12">
											<label class="text-white">Foto Profile (.jpg, .jpeg, .png)</label>
											<input id="foto" type="file" accept=".jpg, .jpeg, .png">
										</div>
									</div>
									<div class="form-row upload--bukti_kesanggupan text-white">
										<div class="form-group col-12">
											<label class="text-white">Bukti Kesanggupan (.pdf, .docx, .doc)</label>
											<input id="bukti_kesanggupan" type="file" accept=".pdf, .docx, .doc">
										</div>
									</div>
									<div class="form-row upload--bukti_mahasiswa text-white">
										<div class="form-group col-12">
											<label class="text-white">Bukti Mahasiswa (.pdf, .png, .jpeg, .jpg)</label>
											<input id="bukti_mahasiswa" type="file" accept=".pdf, .png, .jpeg, .jpg">
										</div>
									</div>
									<div class="form-row mt-3">
										<div class="form-group col-md-12">
											<input type="submit" name="register" class="btn btn-block btn-primary btn-register" value="Register">
										</div>
									</div>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?php echo base_url('login') ?>" style="color:white;">Already
										have an account? Login!</a>
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
	    'plugin/fancy-file-uploader/jquery.ui.widget.js',
	    'plugin/fancy-file-uploader/jquery.fileupload.js',
	    'plugin/fancy-file-uploader/jquery.iframe-transport.js',
	    'plugin/fancy-file-uploader/jquery.fancy-fileupload.js',
	    'js/main.js',
  	]); ?>

  	<script>
		$(document).ready(function () {

			sessionStorage.clear();

			upload('foto');
			upload('bukti_kesanggupan');
			upload('bukti_mahasiswa');

			$(document).on('click', '.btn-register', function (e) {
				e.preventDefault()
				
				data = {
					nama: $("input#nama").val(),
					email: $("input#email").val(),
					nim: $("input#nim").val(),
					angkatan: $("input#angkatan").val(),
					telp: $("input#telp").val(),
					alamat: $("textarea#alamat").val(),
					password: $("input#password").val(),
					confirm_password: $("input#confirm_password").val(),
					foto: sessionStorage.getItem('foto'),
					bukti_kesanggupan: sessionStorage.getItem('bukti_kesanggupan'),
					bukti_mahasiswa: sessionStorage.getItem('bukti_mahasiswa'),
				}

				callApi("POST", "auth/register", data, function (req) {
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
							window.location.href = "<?php echo base_url('login') ?>"
						})
					}
				})
			})
		})
  	</script>

  	<script>
  		// Function For Upload File
	      function upload(name, maxFiles = 1) {
	        $(`#${name}`).FancyFileUpload({
	          params : {
	            action : 'fileuploader'
	          },
	          edit: false,
	          maxfilesize : 10000000,
	          added: function (e, data) {
	            if (data.ff_info.errors.length > 0) {
	              Swal.fire(
	                  'Gagal Ditambahkan!',
	                  'Error: '+data.ff_info.errors,
	                  'error'
	                )
	                $(this).remove()
	                delete data.ff_info
	                return;
	            }

	            if ($(`.upload--${name}`).find('.ff_fileupload_queued').length > maxFiles) {
	              Swal.fire(
	                  'Gagal Ditambahkan!',
	                  `Maksimal upload hanya ${maxFiles} file`,
	                  'error'
	                )
	              $(this).remove()
	              delete data.ff_info
	              return;
	            }

	            $(`.upload--${name}`).find('.btn--upload-file').removeClass('d-none');
	            $(`.upload--${name}`).find('.ff_fileupload_remove_file').attr('data-doc', name);

	            // Get Base64 of File & Set Session To Save The Data
	            getBase64(data.files[0], name)

	            $(this).find('.ff_fileupload_start_upload').remove()
	          }
	        });
	      }
      
	      $(document).on('click', '.ff_fileupload_remove_file', function(e) {
	        let doc = $(this).attr('data-doc')
	        if ($(`.upload--${doc}`).find('.ff_fileupload_queued').length < 1) {
	          $(`.upload--${doc}`).find('.btn--upload-file').addClass('d-none');
	        }
	      });
  	</script>

</body>

</html>
