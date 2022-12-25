<?php 
	$user = $this->Func->get_profile();
?>
<script>
	$(document).ready(function () {

		sessionStorage.clear();
		
		function load_meeting(params = []) {
			$("table.table").DataTable().destroy()
			$("table.table").DataTable({
				"deferRender": true,
				"responsive": true,
				'serverSide': true,
				'processing': true,
				"ordering": false,
				"ajax": {
					"url": get_api_url()+"meeting",
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
						data: 'deskripsi_tipe'
					},
					{
						data: 'nama'
					},
					{
						data: 'tanggal'
					},
					{
						data: null,
						render: res => {
							let button = ''
							let notulensi = ''
							let daftar_hadir = ''
							if (res.notulensi) {
								notulensi = `<p class="my-1"><a href="<?php echo base_url() ?>${res.notulensi}" taget="_blank" class="text-primary">Lihat Notulensi</a></p>`
							} else {
								notulensi = '<p class="my-1">-</p>'
							}

							if (res.daftar_hadir) {
								daftar_hadir = `<p class="my-1"><a href="<?php echo base_url() ?>${res.daftar_hadir}" taget="_blank" class="text-primary">Lihat Daftar Hadir</a></p>`
							} else {
								daftar_hadir = '<p class="my-1">-</p>'
							}

							<?php if ($user['level_id'] == 1): ?>
								button = `<button type="button" class="btn btn-sm btn-secondary btn-upload-document" data-id="${res.id}" data-name="${res.nama}" data-toggle="modal" data-target="#crudModalDoc" ><i class="fas fa-upload"></i></button>`
							<?php endif ?>

							return `
								${button}${notulensi}${daftar_hadir}
							`;
						}
					},
					{
						data: null,
						render: res => {
							let btn_edit = ''
							let btn_delete = ''

							btn_edit = `<button type="button" class="btn btn-sm mb-1 btn-primary btn-update-meeting" data-id="${res.id}" data-name="${res.nama}" data-date="${res.tanggal}" data-tipe="${res.tipe}" data-toggle="modal" data-target="#crudModal"><i class="fas fa-pen"></i></button>`

							<?php if ($user['level_id'] == 1): ?>
								btn_delete = `<button type="button" class="btn btn-sm mb-1 btn-danger btn-delete-meeting" data-id="${res.id}" data-name="${res.nama}"><i class="fas fa-trash"></i></button>`
							<?php endif ?>

								return `
									${btn_edit}
									${btn_delete}
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

			$('#crudModal #meetingName').val('')
			$('#crudModal #meetingDate').val('')
		})

		$(document).on('click', '.btn-confirm-add-meeting', function () {
			data = {
				tipe: $("select#meetingTipe option:selected").val(),
				nama: $("input#meetingName").val(),
				tanggal: $("input#meetingDate").val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

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

			$('#crudModal #meetingTipe').val($(this).attr('data-tipe'))
			$('#crudModal #meetingName').val($(this).attr('data-name'))
			$('#crudModal #meetingDate').val($(this).attr('data-date'))

			$('.btn-confirm-update-meeting').attr('data-id', $(this).attr('data-id'))
		})

		$(document).on('click', '.btn-confirm-update-meeting', function () {
			data = {
				id: $(this).attr('data-id'),
				tipe: $("select#meetingTipe option:selected").val(),
				nama: $("input#meetingName").val(),
				tanggal: $("input#meetingDate").val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

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
				    $("#crudModal").modal("hide")
					load_meeting();
					change_datatable_button();
				}
			})
		})

		$(document).on('click', ".btn-delete-meeting", function () {
			let id = $(this).attr('data-id')
			let name = $(this).attr('data-name')

			Swal.fire({
			  title: 'Apakah anda yakin?',
			  text: `Anda ingin menghapus data ${name}!`,
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

		$(document).on('click', '.btn-upload-document', function (e) {
			$('#crudModalDoc .document-meeting-name').html($(this).attr('data-name'))
			$('#crudModalDoc .btn--upload-notulensi').attr('data-id', $(this).attr('data-id'))
			$('#crudModalDoc .btn--upload-daftarhadir').attr('data-id', $(this).attr('data-id'))
		})

		// Upload Noteluensi
		upload('notulensi')
		$(document).on('click', '#crudModalDoc .btn--upload-notulensi', function (e) {
			let data = {
				id: $(this).attr('data-id'),
				notulensi: sessionStorage.getItem('notulensi')
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "meeting/uploadnotulensi", data, function (req) {
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

					load_meeting();
					change_datatable_button();
				}
			})
		})

		// Upload Daftar Hadir
		upload('daftarhadir')
		$(document).on('click', '#crudModalDoc .btn--upload-daftarhadir', function (e) {
			let data = {
				id: $(this).attr('data-id'),
				daftar_hadir: sessionStorage.getItem('daftarhadir')
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "meeting/uploaddaftarhadir", data, function (req) {
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

					load_meeting();
					change_datatable_button();
				}
			})
		})

	})

</script>
