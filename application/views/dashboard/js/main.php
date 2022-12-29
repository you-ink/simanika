<?php 
	$data_user = $this->Func->get_profile();
?>
<script>
	$(document).ready(function() {
		<?php if ($data_user['level_id'] == 1): ?>
			function load_member(params = []) {
				$("table.table-member").DataTable().destroy()
				$("table.table-member").DataTable({
					"deferRender": true,
					"responsive": true,
					'serverSide': true,
					'processing': true,
					"ordering": false,
					"ajax": {
						"url": get_api_url()+"member",
						"type": "GET",
						"data": {
							"SIMANIKA-API-KEY": get_api_login_value(),
							"sort": "ASC",
							"status": "2"
						},
						"headers": {
							"Authorization" : get_api_key()
						},
						"dataSrc": "data"
					},
					"columns": [
						{
							data: null,
							render: function (data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1 + '.';
							}
						},
						{
							data: 'nama'
						},
						{
							data: 'nim'
						},
						{
							data: 'angkatan'
						},
						{
							data: 'email'
						},
						{
							data: 'telp'
						},
						{
							data: null,
							render: res => {
								if (res.waktu_wawancara) {
									return res.tanggal_wawancara+" "+res.waktu_wawancara
								}
								return "-"
							}
						},
						{
							data: null,
							render: res => {
								let wawancara = `<button type="button" class="btn btn-sm mb-1 btn-warning btn-set-wawancara" data-id="${res.id}" data-name="${res.nama}" data-toggle="modal" data-target="#wawancaraModal">Set Wawancara</button> <br>`
								if (res.waktu_wawancara) {
									wawancara = ''
								}
								return `
									${wawancara}
									<button type="button" class="btn btn-sm mb-1 btn-success btn-setujui" data-id="${res.id}" data-name="${res.nama}" data-toggle="modal" data-target="#setujuiModal"><i class="fas fa-check"></i></button>
									<button type="button" class="btn btn-sm mb-1 btn-danger btn-delete-member" data-id="${res.id}" data-name="${res.nama}"><i class="fas fa-trash"></i></button>
								`;
							}
						}
					],
				    lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
				});
			}

			load_member()

			get_division();

			function get_division() {
				param = {}
				param[get_api_login_global()['key']] = get_api_login_value();
				callApi("POST", "division/getAll", param, function(req) {
					$("select#division").select2({
				        dropdownParent: $('#setujuiModal')
				    });
					option = '<option value="">-</option>';
					$.each(req.data, function(index, val) {
						option += '<option value="' + val.id + '">' + val.nama + '</option>';
					});
					$("select#division").html(option);
				})
			}

			get_position();

			function get_position() {
				param = {}
				param[get_api_login_global()['key']] = get_api_login_value();
				callApi("POST", "position/getAll", param, function(req) {
					$("select#position").select2({
				        dropdownParent: $('#setujuiModal')
				    });
					option = '<option value="">-</option>';
					$.each(req.data, function(index, val) {
						option += '<option value="' + val.id + '">' + val.nama + '</option>';
					});
					$("select#position").html(option);
				})
			}

			$(document).on('click', ".btn-delete-member", function () {
				let id = $(this).attr('data-id')
				let nama = $(this).attr('data-name')

				Swal.fire({
				  title: 'Apakah anda yakin?',
				  text: `Anda ingin menghapus data ${nama}!`,
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Ya, hapus!'
				}).then((result) => {
				  if (result.isConfirmed) {
				    data = {
						id: $(this).attr('data-id')
					}
				    data[get_api_login_global()['key']] = get_api_login_value();
				  	callApi("DELETE", "member", data, function (req) {
						pesan = req.message;
						if (req.error == true) {
							Swal.fire(
						      'Gagal Dihapus!',
						      pesan,
						      'error'
						    )
						}else{
							Swal.fire(
						      'Dihapus!',
						      pesan,
						      'success'
						    )
							load_member();
						}
					})

				  }
				})
			})

			$(document).on('click', ".btn-set-wawancara", function () {
				$('#wawancaraModal .wawancara-member-name').html($(this).attr('data-name'))

				$('.btn-confirm-set-wawancara').attr('data-id', $(this).attr('data-id'))
			})

			$(document).on('click', '.btn-confirm-set-wawancara', function () {
				data = {
					user_id: $(this).attr('data-id'),
					tanggal: $("input#tanggalWawancara").val(),
					waktu: $("input#waktuWawancara").val()
				}

				data[get_api_login_global()['key']] = get_api_login_value();

				callApi("POST", "member/set_interview", data, function (req) {
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
					    )
					    $("input#tanggalWawancara").val('')
					    $("input#waktuWawancara").val('')
					    $("#wawancaraModal").modal("hide")
						load_member();
					}
				})
			})

			$(document).on('click', ".btn-setujui", function () {
				$('#setujuiModal .setujui-member-name').html($(this).attr('data-name'))

				$('.btn-confirm-setujui').attr('data-id', $(this).attr('data-id'))
			})

			$(document).on('click', '.btn-confirm-setujui', function () {
				data = {
					user_id: $(this).attr('data-id'),
					divisi: $("select#division").val(),
					jabatan: $("select#position").val(),
				}

				data[get_api_login_global()['key']] = get_api_login_value();

				callApi("POST", "member/set_member", data, function (req) {
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
					    )
					    $("select#division").val('').change()
					    $("select#position").val('').change()
					    $("#setujuiModal").modal("hide")
						load_member();
					}
				})
			})
		<?php endif ?>

	})
</script>