<script>
	$(document).ready(function() {

		sessionStorage.clear();

		$(document).on('click', '.btn-update-profile', function (e) {
			e.preventDefault()

			data = {
				nama: $("input#nama").val(),
				angkatan: $("input#angkatan").val(),
				telp: $("input#telp").val(),
				alamat: $("textarea#alamat").text(),
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "user/update_profile", data, function (req) {
				pesan = req.message;
				if (req.error == true) {
					Swal.fire(
				      'Gagal diupdate!',
				      pesan,
				      'error'
				    )
				}else{
					Swal.fire(
				      'Diupdate!',
				      pesan,
				      'success'
				    ).then((result) => {
				    	location.reload()
					})
				}
			})
		})

		upload('foto');
		$(document).on('click', '#crudModal .btn--upload-foto', function (e) {
			let data = {
				foto: sessionStorage.getItem('foto')
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "user/upload_foto_profile", data, function (req) {
				pesan = req.message;
				if (req.error == true) {
					Swal.fire(
				      	'Gagal diupdate!',
				      	pesan,
				      	'error'
				    )
				}else{
					Swal.fire(
				      	'Diupdate!',
				      	pesan,
				      	'success'
				    ).then((result) => {
				    	$('#crudModal').remove()
				    	location.reload()
					})
				}
			})
		})

	})
</script>