<script>
	$(document).ready(function () {

		function load_main() {
			let data = {
				id: "<?php echo $this->uri->segment(3) ?>"
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("GET", "workprogram", data, function (req) {
				data = req.data
				if (data.length > 0) {
					$('.proker-name').html(data[0].nama)
					if (data[0].total == "" || data[0].total == null) {
						data[0].total = 0
					}
					$('.proker-total').html("(Total: Rp. "+data[0].total+")")

					load_budget();
					load_detail_budget();
					change_datatable_button();
				} else {
					Swal.fire(
				      	'Peringatan!',
				      	'Program Kerja tidak ditemukan.',
				      	'error'
				    ).then((result) => {
						window.location.href = "<?php echo base_url('dashboard/program') ?>"
					})
				}
			})
		};

		load_main();

		function get_budget(anggaran_proker_id = 0) {
			param = {
				proker_id: "<?php echo $this->uri->segment(3) ?>"
			}

			param[get_api_login_global()['key']] = get_api_login_value();
			callApi("GET", "workprogram/budget", param, function(req) {
				$("select#budget").select2({
			        dropdownParent: $('#crudModal')
			    });
				option = '<option value="">-</option>';
				$.each(req.data, function(index, val) {
					if (val.id == anggaran_proker_id) {
						option += '<option selected value="' + val.id + '">' + val.nama + '</option>';
					} else {
						option += '<option value="' + val.id + '">' + val.nama + '</option>';
					}
				});
				$("select#budget").html(option);
			})
		}

		get_budget();


		// LOAD TABLE


		function load_budget(params = []) {
			$("table.table-anggaran").DataTable().destroy()
			$("table.table-anggaran").DataTable({
				"deferRender": true,
				"responsive": true,
				'serverSide': true,
				'processing': true,
				"ordering": false,
				"ajax": {
					"url": get_api_url()+"workprogram/budget",
					"type": "GET",
					"data": {
						"SIMANIKA-API-KEY": get_api_login_value(),
						"sort": "ASC",
						"proker_id": "<?php echo $this->uri->segment(3) ?>"
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
						data: 'jumlah_detail'
					},
					{
						data: null,
						render: res => {
							return `
								<button type="button" class="btn btn-sm mb-1 btn-danger btn-delete-budget" data-id="${res.id}" data-name="${res.nama}"><i class="fas fa-trash"></i></button>
							`;
						}
					}
				]
            });
		}

		function load_detail_budget(params = []) {
			$("table.table-detail-anggaran").DataTable().destroy()
			$("table.table-detail-anggaran").DataTable({
				"deferRender": true,
				"responsive": true,
				'serverSide': true,
				'processing': true,
				"ordering": false,
				"ajax": {
					"url": get_api_url()+"workprogram/budgetdetail",
					"type": "GET",
					"data": {
						"SIMANIKA-API-KEY": get_api_login_value(),
						"sort": "ASC",
						"proker_id": "<?php echo $this->uri->segment(3) ?>"
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
						data: 'nama_anggaran'
					},
					{
						data: 'jenis_pengeluaran'
					},
					{
						data: 'jumlah'
					},
					{
						data: 'satuan'
					},
					{
						data: 'harga'
					},
					{
						data: null,
						render: res => {
							return res.jumlah*res.harga
						}
					},
					{
						data: null,
						render: res => {
							return `
								<button type="button" class="btn btn-sm mb-1 btn-primary btn-update-budgetdetail" data-toggle="modal" data-id="${res.id}" data-budget="${res.anggaran_proker_id}" data-name="${res.jenis_pengeluaran}" data-jumlah="${res.jumlah}" data-satuan="${res.satuan}" data-harga="${res.harga}" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
								<button type="button" class="btn btn-sm mb-1 btn-danger btn-delete-budgetdetail" data-id="${res.id}" data-name="${res.jenis_pengeluaran}"><i class="fas fa-trash"></i></button>
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
			         	filename: 'Anggaran '+$('.proker-name').html(),
			         	title: null,
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2, 3, 4, 5 ]
		                }
			        },
			        { 
			         	extend: 'print', 
			         	text: '<i class="fas fa-print"></i> Print',
			         	title: 'Anggaran '+$('.proker-name').html(),
			         	className: 'btn btn-sm btn-success',
			         	exportOptions: {
		                    columns: [ 0, 1, 2, 3, 4, 5 ]
		                }
			        },
			    ]
            });
		}


		// BUTTON EVENT


		$(document).on('click', '.btn-confirm-add-budget', function (e) {
			e.preventDefault()

			data = {
				nama: $("input#budgetName").val(),
				proker_id: "<?php echo $this->uri->segment(3) ?>"
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "workprogram/budget", data, function (req) {
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
				    $("input#budgetName").val('')
				    $("#crudModal").modal("hide")
				    load_main();
				    get_budget()
				}
			})
		})

		$(document).on('click', ".btn-delete-budget", function () {
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
			  	callApi("DELETE", "workprogram/budget", data, function (req) {
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
						load_main();
					}
				})

			  }
			})
		})

		$(document).on('click', '.btn-add-budgetdetail', function () {
			$('.title-budgetdetail-modal').html('Tambah')
			$('.btn-confirm-add-budgetdetail').removeClass('d-none')
			$('.btn-confirm-update-budgetdetail').addClass('d-none')
			$('#crudModal .budgetdetail-name').html('')

			$('#crudModal #budget').val('').change()
			$('#crudModal #jenisPengeluaran').val('')
			$('#crudModal #jumlah').val('')
			$('#crudModal #satuan').val('')
			$('#crudModal #harga').val('')
		})

		$(document).on('click', '.btn-confirm-add-budgetdetail', function () {
			data = {
				anggaran_proker_id: $("select#budget option:selected").val(),
				jenis_pengeluaran: $('#crudModal #jenisPengeluaran').val(),
				jumlah: $('#crudModal #jumlah').val(),
				satuan: $('#crudModal #satuan').val(),
				harga: $('#crudModal #harga').val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("POST", "workprogram/budgetdetail", data, function (req) {
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
					load_main();
				}
			})
		})

		$(document).on('click', ".btn-update-budgetdetail", function () {
			$('.title-budgetdetail-modal').html('Edit')
			$('.btn-confirm-update-budgetdetail').removeClass('d-none')
			$('.btn-confirm-add-budgetdetail').addClass('d-none')
			$('#crudModal .budgetdetail-name').html($(this).attr('data-name'))

			$('#crudModal #budget').val($(this).attr('data-budget')).change()
			$('#crudModal #jenisPengeluaran').val($(this).attr('data-name'))
			$('#crudModal #jumlah').val($(this).attr('data-jumlah'))
			$('#crudModal #satuan').val($(this).attr('data-satuan'))
			$('#crudModal #harga').val($(this).attr('data-harga'))

			$('.btn-confirm-update-budgetdetail').attr('data-id', $(this).attr('data-id'))
		})

		$(document).on('click', '.btn-confirm-update-budgetdetail', function () {
			data = {
				id: $(this).attr('data-id'),
				anggaran_proker_id: $("select#budget option:selected").val(),
				jenis_pengeluaran: $('#crudModal #jenisPengeluaran').val(),
				jumlah: $('#crudModal #jumlah').val(),
				satuan: $('#crudModal #satuan').val(),
				harga: $('#crudModal #harga').val()
			}

			data[get_api_login_global()['key']] = get_api_login_value();

			callApi("PUT", "workprogram/budgetdetail", data, function (req) {
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
				    load_main();
				}
			})
		})

		$(document).on('click', ".btn-delete-budgetdetail", function () {
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
			  	callApi("DELETE", "workprogram/budgetdetail", data, function (req) {
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
					    load_main()
					}
				})

			  }
			})
		})

	})
</script>
