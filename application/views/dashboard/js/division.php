<script>
	$(document).ready(function() {

		function load_division(params = []) {
			$("table.table").DataTable().destroy()
			$("table.table").DataTable({
				"deferRender": true,
				"responsive": true,
				'serverSide': true,
				'processing': true,
				"ordering": false,
				"ajax": {
					"url": get_api_url()+"division",
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
						data: 'ketua'
					},
					{
						data: null,
						render: res => {
							return `
								<button type="button" class="btn btn-sm btn-primary btn-update-division" data-id="${res.id}" data-name="${res.nama}" data-leader="${res.ketua_id}" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
								<button type="button" class="btn btn-sm btn-danger btn-delete-division" data-id="${res.id}" data-name="${res.nama}" data-leader="${res.ketua_id}"><i class="fas fa-trash"></i></button>
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
			         	filename: 'Data Divisi Himanika',
			         	title: null,
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2]
		                }
			         },
			         { 
			         	extend: 'print', 
			         	text: '<i class="fas fa-print"></i> Print',
			         	title: 'Data Divisi Himanika',
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2]
		                }
			         },
			    ]
			});
		}

		load_division();

		get_user();

		function get_user(user_id = 0) {
			param = {}
			param[get_api_login_global()['key']] = get_api_login_value();
			callApi("POST", "user/getAll", param, function(req) {
				$("select#divisionLeader").select2({
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
				$("select#divisionLeader").html(option);
				$("select#pelaksana").html(option);
			})
		}

		$(document).on('click', '.btn-add-division', function () {
			$('.title-division-modal').html('Tambah')
			$('.btn-confirm-add-division').removeClass('d-none')
			$('.btn-confirm-update-division').addClass('d-none')
			$('#crudModal .division-name').html('')

			$('#crudModal #divisionName').val('')
			$('#crudModal #divisionLeader').val('').change()
		})

		$(document).on('click', '.btn-confirm-add-division', function () {
			data = {
				nama: $("input#divisionName").val(),
				ketua_id: $("select#divisionLeader option:selected").val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "division", data, function (req) {
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
					load_division();
					change_datatable_button();
				}
			})
		})

		$(document).on('click', ".btn-update-division", function () {
			$('.title-division-modal').html('Edit')
			$('.btn-confirm-update-division').removeClass('d-none')
			$('.btn-confirm-add-division').addClass('d-none')
			$('#crudModal .division-name').html($(this).attr('data-name'))

			$('#crudModal #divisionName').val($(this).attr('data-name'))
			$('#crudModal #divisionLeader').val($(this).attr('data-leader')).change()

			$('.btn-confirm-update-division').attr('data-id', $(this).attr('data-id'))
		})

		$(document).on('click', '.btn-confirm-update-division', function () {
			data = {
				id: $(this).attr('data-id'),
				nama: $("input#divisionName").val(),
				ketua_id: $("select#divisionLeader option:selected").val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("PUT", "division", data, function (req) {
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
				    $("input#divisionName").val('')
				    $("#crudModal").modal("hide")
					load_division();
					change_datatable_button();
				}
			})
		})

		$(document).on('click', ".btn-delete-division", function () {
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
			  	callApi("DELETE", "division", data, function (req) {
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
						load_division();
						change_datatable_button();
					}
				})

			  }
			})
		})

	})
</script>