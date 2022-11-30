<script>
	$(document).ready(function() {

		function load_member(params = []) {
			$("table.table").DataTable().destroy()
			$("table.table").DataTable({
				"deferRender": true,
				"responsive": true,
				'serverSide': true,
				'processing': true,
				"ordering": false,
				"ajax": {
					"url": get_api_url()+"member",
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
						data: 'email'
					},
					{
						data: 'nim'
					},
					{
						data: 'angkatan'
					},
					{
						data: 'divisi'
					},
					{
						data: 'jabatan'
					},
					{
						data: 'telp'
					},
					{
						data: null,
						render: res => {
							return `
								<button type="button" class="btn btn-sm mb-1 btn-warning btn-detail-member" data-alamat="${res.alamat}" data-tanggalWawancara="${res.tanggal_wawancara}" data-buktiKesanggupan="${res.bukti_kesanggupan}" data-buktiMahasiswa="${res.bukti_mahasiswa}" data-fileBuktiKesanggupan="${res.file_bukti_kesanggupan}" data-fileBuktiMahasiswa="${res.file_bukti_mahasiswa}" data-toggle="modal" data-target="#crudModal"><i class="fas fa-info"></i></button>
								<button type="button" class="btn btn-sm mb-1 btn-danger btn-delete-member" data-id="${res.id}" data-name="${res.nama}"><i class="fas fa-trash"></i></button>
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
			         	filename: 'Data Anggota Himanika',
			         	title: null,
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
		                }
			         },
			         { 
			         	extend: 'print', 
			         	text: '<i class="fas fa-print"></i> Print',
			         	title: 'Data Anggota Himanika',
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
		                }
			         },
			    ]
			});
		}

		load_member();

		$(document).on('click', ".btn-detail-member", function () {
			$('#crudModal #tanggalWawancara').val($(this).attr('data-tanggalWawancara'))
			$('#crudModal #alamatMember').val($(this).attr('data-alamat'))
			$('#crudModal #buktiKesanggupanNama').html($(this).attr('data-fileBuktiKesanggupan'))
			$('#crudModal #buktiKesanggupanInfo').html(`<a href="<?php echo base_url() ?>`+$(this).attr('data-buktiKesanggupan')+`">Lihat File</a>`)
			$('#crudModal #buktiMahasiswaNama').html($(this).attr('data-fileBuktiMahasiswa'))
			$('#crudModal #buktiMahasiswaInfo').html(`<a href="<?php echo base_url() ?>`+$(this).attr('data-buktiMahasiswa')+`">Lihat File</a>`)
		})

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
			    data[get_api_login_global()['key']] = get_api_login_global()['value'];
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
						change_datatable_button();
					}
				})

			  }
			})
		})

	})
</script>