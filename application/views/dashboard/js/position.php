<script>
	$(document).ready(function() {

		function load_position(params = []) {
			$("table.table").DataTable().destroy()
			$("table.table").DataTable({
				"deferRender": true,
				"responsive": true,
				'serverSide': true,
				'processing': true,
				"ordering": false,
				"ajax": {
					"url": get_api_url()+"position",
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
						data: null,
						render: res => {
							return `
								<button type="button" class="btn btn-sm btn-primary btn-update-position" data-id="${res.id}" data-name="${res.nama}" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
								<button type="button" class="btn btn-sm btn-danger btn-delete-position" data-id="${res.id}" data-name="${res.nama}"><i class="fas fa-trash"></i></button>
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
			         	filename: 'Data Jabatan Himanika',
			         	title: null,
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1 ]
		                }
			         },
			         { 
			         	extend: 'print', 
			         	text: '<i class="fas fa-print"></i> Print',
			         	title: 'Data Jabatan Himanika',
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1 ]
		                }
			         },
			    ]
			})
		}

		load_position();

		$(document).on('click', '.btn-add-position', function () {
			$('.title-position-modal').html('Tambah')
			$('.btn-confirm-add-position').removeClass('d-none')
			$('.btn-confirm-update-position').addClass('d-none')
			$('#crudModal .position-name').html('')

			$('#crudModal #positionName').val('')
		})

		$(document).on('click', '.btn-confirm-add-position', function () {
			data = {
				nama: $("input#positionName").val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "position", data, function (req) {
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
				    $("input#positionName").val('')
				    $("#crudModal").modal("hide")
					load_position();
					change_datatable_button();
				}
			})
		})

		$(document).on('click', ".btn-update-position", function () {
			$('.title-position-modal').html('Edit')
			$('.btn-confirm-update-position').removeClass('d-none')
			$('.btn-confirm-add-position').addClass('d-none')
			$('#crudModal .position-name').html($(this).attr('data-name'))

			$('#crudModal #positionName').val($(this).attr('data-name'))

			$('.btn-confirm-update-position').attr('data-id', $(this).attr('data-id'))
		})

		$(document).on('click', '.btn-confirm-update-position', function () {
			data = {
				id: $(this).attr('data-id'),
				nama: $("input#positionName").val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("PUT", "position", data, function (req) {
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
				    $("input#positionName").val('')
				    $("#crudModal").modal("hide")
					load_position();
					change_datatable_button();
				}
			})
		})

		$(document).on('click', ".btn-delete-position", function () {
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
			  	callApi("DELETE", "position", data, function (req) {
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
						load_position();
						change_datatable_button();
					}
				})

			  }
			})
		})

	})
</script>