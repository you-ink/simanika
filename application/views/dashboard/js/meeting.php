<script>
	$(document).ready(function () {

		function load_meeting(params = []) {
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
						"SIMANIKA-API-KEY": get_api_login_global()['value'],
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
								<button type="button" class="btn btn-sm btn-danger btn-delete-position" data-id="${res.id}"><i class="fas fa-trash"></i></button>
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
			         	filename: 'Data Agenda Rapat Himanika',
			         	title: null,
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2, 3 ]
		                }
			        },
			        { 
			         	extend: 'print', 
			         	text: '<i class="fas fa-print"></i> Print',
			         	title: 'Data Agenda Rapat Himanika',
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2, 3 ]
		                }
			        },
			    ]
            });
		}

		load_meeting();

		$(document).on('click', '.btn-add-meeting', function () {
			$('.title-meeting-modal').html('Tambah')
			$('.btn-confirm-add-meeting').removeClass('d-none')
			$('.btn-confirm-update-meeting').addClass('d-none')
			$('#crudModal .meeting-name').html('')

			$('#crudModal #meetingTipe').val('')
			$('#crudModal #meetingName').val('')
			$('#crudModal #meetingTime').val('')
		})

		$(document).on('click', '.btn-confirm-add-meeting', function () {
			data = {
				type: $("input#meetingTipe").val(),
				nama: $("input#meetingName").val(),
				time: $("input#meetingTime").val()
			}

			data[get_api_login_global()['key']] = get_api_login_global()['value'];

			callApi("POST", "meeting", data, function (req) {
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
				    $("input#meetingTipe").val(),
				    $("input#meetingName").val(),
				    $("input#meetingTime").val()
				    $("#crudModal").modal("hide")
					load_meeting();
					change_datatable_button();
				}
			})
		})

		$(document).on('click', ".btn-update-meeting", function () {
			$('.title-meeting-modal').html('Edit')
			$('.btn-confirm-update-meeting').removeClass('d-none')
			$('.btn-confirm-add-meeting').addClass('d-none')
			$('#crudModal .meeting-name').html($(this).attr('data-name'))

			$('#crudModal #meetingTipe').val($(this).attr('data-Tipe'))
			$('#crudModal #meetingName').val($(this).attr('data-name'))
			$('#drudModal #meetingTime').val($(this).attr('data-Time'))

			$('.btn-confirm-update-meeting').attr('data-id', $(this).attr('data-id'))
		})

		$(document).on('click', '.btn-confirm-update-meeting', function () {
			data = {
				id: $(this).attr('data-id'),
				type: $("input#meetingTipe").val(),
				nama: $("input#meetingName").val(),
				time: $("input#meetingTime").val()
			}

			data[get_api_login_global()['key']] = get_api_login_global()['value'];

			callApi("PUT", "meeting", data, function (req) {
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
				    $("input#meetingName").val('')
				    $("#crudModal").modal("hide")
					load_position();
					change_datatable_button();
				}
			})
		})

		$(document).on('click', ".btn-delete-meeting", function () {
			let id = $(this).attr('data-id')

			Swal.fire({
			  title: 'Apakah anda yakin?',
			  text: "Anda ingin menghapus data ini!",
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
			    data[get_api_login_global()['key']] = get_api_login_global()['value'];
			  	callApi("DELETE", "meeting", data, function (req) {
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
						load_meeting();
						change_datatable_button();
					}
				})

			  }
			})
		})

	})

</script>
