<?php 
	$user = $this->Func->get_profile();
?>
<script>
	$(document).ready(function () {

		sessionStorage.clear();

		function load_work_program(params = []) {
			$("table.table").DataTable().destroy()
			$("table.table").DataTable({
				"deferRender": true,
				"responsive": true,
				'serverSide': true,
				'processing': true,
				"ordering": false,
				"ajax": {
					"url": get_api_url()+"workprogram",
					"type": "GET",
					"data": {
						"SIMANIKA-API-KEY": get_api_login_value(),
						"sort": "ASC"
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
						data: 'nama_status'
					},
					{
						data: 'tanggal_acara'
					},
					{
						data: null,
						render: res => {
							if (res.total == '' || res.total == null) {
								res.total = 0
							}
							return res.total
						}
					},
					{
						data: null,
						render: res => {
							return `<button type="button" class="btn btn-sm btn-warning text-white btn-budget" data-id="${res.id}" data-name="${res.nama}"><i class="fas fa-receipt"></i></button>
							`;
						}
					},
					{
						data: null,
						render: res => {
							let button = ''
							let tor = ''
							let lpj = ''
							if (res.tor) {
								tor = `<p class="my-1"><a href="<?php echo base_url() ?>${res.tor}" taget="_blank" class="text-primary">Lihat File TOR</a></p>`
							}
							if (res.lpj) {
								lpj = `<p class="my-1"><a href="<?php echo base_url() ?>${res.lpj}" taget="_blank" class="text-primary">Lihat File LPJ</a></p>`
							}

							<?php if ($user['level_id'] != 3): ?>
								button = `<button type="button" class="btn btn-sm btn-secondary btn-upload-document" data-id="${res.id}" data-name="${res.nama}" data-toggle="modal" data-target="#crudModalDoc"><i class="fas fa-upload"></i></button>`
							<?php endif ?>

							return `
								${button}${tor}${lpj}
							`;
						}
					},
					{
						data: null,
						render: res => {
							let btn_edit = ''
							let btn_delete = ''

							<?php if ($user['level_id'] == 1): ?>
								btn_edit = `<button type="button" class="btn btn-sm mb-1 btn-primary btn-update-proker" data-id="${res.id}" data-name="${res.nama}" data-date="${res.tanggal_acara}" data-status="${res.status}" data-pelaksana="${res.pelaksana_id}" data-penanggung-jawab="${res.penanggung_jawab_id}" data-toggle="modal" data-target="#crudModal"><i class="fas fa-pen"></i></button>`
								btn_delete = `<button type="button" class="btn btn-sm mb-1 btn-danger btn-delete-proker" data-id="${res.id}" data-name="${res.nama}"><i class="fas fa-trash"></i></button>`
							<?php endif ?>

							return `
								<button type="button" class="btn btn-sm mb-1 btn-warning btn-detail-proker" data-id="${res.id}" data-name="${res.nama}" data-date="${res.tanggal_acara}" data-status="${res.status}" data-pelaksana="${res.pelaksana_id}" data-penanggung-jawab="${res.penanggung_jawab_id}" data-toggle="modal" data-target="#crudModal"><i class="fas fa-info"></i></button>
								${btn_edit}${btn_delete}
							`;
						}
					}
				],
				dom: "<'row'<'col-sm-12 mb-2'B>>lfrtip",
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                buttons: [
			        { 
			         	extend: 'excel', 
			         	text: '<i class="fas fa-download"></i> Download Excel',
			         	filename: 'Data Proker Himanika',
			         	title: null,
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2, 3, 4 ]
		                }
			        },
			        { 
			         	extend: 'print', 
			         	text: '<i class="fas fa-print"></i> Print',
			         	title: 'Data Proker Himanika',
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2, 3, 4 ]
		                }
			        },
			    ]
            });
		}

		load_work_program();

		get_user();

		function get_user(user_id = 0) {
			param = {}
			param[get_api_login_global()['key']] = get_api_login_value();
			callApi("POST", "user/getAll", param, function(req) {
				$("select#penanggungJawab").select2({
			        dropdownParent: $('#crudModal')
			    });
				$("select#pelaksana").select2({
			        dropdownParent: $('#crudModal')
			    });
				option = '<option value="">-</option>';
				$.each(req.data, function(index, val) {
					if (val.id == user_id) {
						option += '<option selected value="' + val.id + '">' + val.nama + '</option>';
					} else {
						option += '<option value="' + val.id + '">' + val.nama + '</option>';
					}
				});
				$("select#penanggungJawab").html(option);
				$("select#pelaksana").html(option);
			})
		}

		$(document).on('click', ".btn-detail-proker", function () {
			$('.title-proker-modal').html('Detail')
			$('.btn-confirm-update-proker').addClass('d-none')
			$('.btn-confirm-add-proker').addClass('d-none')
			$('#crudModal .proker-name').html($(this).attr('data-name'))

			$('#crudModal #prokerName').val($(this).attr('data-name'))
			$('#crudModal #prokerDate').val($(this).attr('data-date'))
			$('#crudModal #prokerStatus').val($(this).attr('data-status')).change()
			$('#crudModal #pelaksana').val($(this).attr('data-pelaksana')).change()
			$('#crudModal #penanggungJawab').val($(this).attr('data-penanggung-jawab')).change()
			disabled();
		})

		$(document).on('click', '.btn-add-proker', function () {
			$('.title-proker-modal').html('Tambah')
			$('.btn-confirm-add-proker').removeClass('d-none')
			$('.btn-confirm-update-proker').addClass('d-none')
			$('#crudModal .proker-name').html('')

			$('#crudModal #prokerName').val('')
			$('#crudModal #prokerDate').val('')
			$('#crudModal #prokerStatus').val('1').change()
			$('#crudModal #pelaksana').val('').change()
			$('#crudModal #penanggungJawab').val('').change()
			disabled(false);
		})

		$(document).on('click', '.btn-confirm-add-proker', function () {
			data = {
				nama: $("input#prokerName").val(),
				tanggal: $("input#prokerDate").val(),
				status: $("select#prokerStatus option:selected").val(),
				pelaksana_id: $("select#pelaksana option:selected").val(),
				penanggung_jawab_id: $("select#penanggungJawab option:selected").val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "workprogram", data, function (req) {
				pesan = req.message;
				if (req.error == true) {
					Swal.fire(
				      'Gagal ditambahkan!',
				      pesan,
				      'error'
				    )
				}else{
					Swal.fire(
				      'Ditambahkan!',
				      pesan,
				      'success'
				    )
				    $("input#divisionName").val('')
				    $("#crudModal").modal("hide")
					load_work_program();
					change_datatable_button();
				}
			})
		})

		$(document).on('click', ".btn-update-proker", function () {
			$('.title-proker-modal').html('Edit')
			$('.btn-confirm-update-proker').removeClass('d-none')
			$('.btn-confirm-add-proker').addClass('d-none')
			$('#crudModal .proker-name').html($(this).attr('data-name'))

			$('#crudModal #prokerName').val($(this).attr('data-name'))
			$('#crudModal #prokerDate').val($(this).attr('data-date'))
			$('#crudModal #prokerStatus').val($(this).attr('data-status')).change()
			$('#crudModal #pelaksana').val($(this).attr('data-pelaksana')).change()
			$('#crudModal #penanggungJawab').val($(this).attr('data-penanggung-jawab')).change()
			disabled(false);

			$('.btn-confirm-update-proker').attr('data-id', $(this).attr('data-id'))
		})

		$(document).on('click', '.btn-confirm-update-proker', function () {
			data = {
				id: $(this).attr('data-id'),
				nama: $("input#prokerName").val(),
				tanggal: $("input#prokerDate").val(),
				status: $("select#prokerStatus option:selected").val(),
				pelaksana_id: $("select#pelaksana option:selected").val(),
				penanggung_jawab_id: $("select#penanggungJawab option:selected").val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("PUT", "workprogram", data, function (req) {
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
				    $("#crudModal").modal("hide")
					load_work_program();
					change_datatable_button();
				}
			})
		})

		$(document).on('click', ".btn-delete-proker", function () {
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
			  	callApi("DELETE", "workprogram", data, function (req) {
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
						load_work_program();
						change_datatable_button();
					}
				})

			  }
			})
		})

		$(document).on('click', '.btn-budget', function (e) {
			window.location.href = "<?php echo base_url() ?>dashboard/budget/"+$(this).attr('data-id')
		})

		$(document).on('click', '.btn-upload-document', function (e) {
			$('#crudModalDoc .document-proker-name').html($(this).attr('data-name'))
			$('#crudModalDoc .btn--upload-tor').attr('data-id', $(this).attr('data-id'))
			$('#crudModalDoc .btn--upload-lpj').attr('data-id', $(this).attr('data-id'))
		})

		function disabled(is_true = true){
			$('#crudModal #prokerName').prop("disabled", is_true)
			$('#crudModal #prokerDate').prop("disabled", is_true)
			$('#crudModal #prokerStatus').prop("disabled", is_true)
			$('#crudModal #pelaksana').prop("disabled", is_true)
			$('#crudModal #penanggungJawab').prop("disabled", is_true)
		}

		// Upload TOR
		upload('tor')
		$(document).on('click', '#crudModalDoc .btn--upload-tor', function (e) {
			let data = {
				id: $(this).attr('data-id'),
				tor: sessionStorage.getItem('tor')
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "workprogram/uploadtor", data, function (req) {
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
				    	$('#crudModalDoc').remove()
						window.location.reload()
					})

					load_work_program();
					change_datatable_button();
				}
			})
		})

		// Upload LPJ
		upload('lpj')
		$(document).on('click', '#crudModalDoc .btn--upload-lpj', function (e) {
			let data = {
				id: $(this).attr('data-id'),
				lpj: sessionStorage.getItem('lpj')
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "workprogram/uploadlpj", data, function (req) {
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
				    	$('#crudModalDoc').remove()
						window.location.reload()
					})

					load_work_program();
					change_datatable_button();
				}
			})
		})

	})

</script>
