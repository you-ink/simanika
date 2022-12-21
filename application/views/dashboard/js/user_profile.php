<script>
	$(document).ready(function() {

		$(document).on('click', '.btn-update-profile', function (e) {
			e.preventDefault()

			data = {
				nama: $("input#nama").val(),
				angkatan: $("input#angkatan").val(),
				telp: $("input#telp").val(),
				alamat: $("textarea#alamat").text(),
			}

			data[get_api_login_global()['key']] = "<?php echo get_uid() ?>";

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

	})
</script>