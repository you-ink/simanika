<script>
	$(document).ready(function () {

		(function () {
			let data = {
				id: "<?php echo $this->uri->segment(3) ?>"
			}

			data[get_api_login_global()['key']] = get_api_login_global()['value'];

			callApi("GET", "workprogram", data, function (req) {
				data = req.data
				if (data.length > 0) {
					$('.proker-name').html(data[0].nama)
					$('.proker-total').html("(Total: Rp. "+data[0].total+")")

					load_budget();
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
		})();

		function load_budget(params = []) {
			$("table.table").DataTable().destroy()
			$("table.table").DataTable({
				"deferRender": true,
				"responsive": true,
				'serverSide': true,
				'processing': true,
				"ordering": false,
				"ajax": {
					"url": get_api_url()+"workprogram/budget",
					"type": "POST",
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
								<button type="button" class="btn btn-sm mb-1 btn-primary btn-update-proker" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
								<button type="button" class="btn btn-sm mb-1 btn-danger btn-delete-proker" data-id="${res.id}" data-name="${res.jenis_pengeluaran}"><i class="fas fa-trash"></i></button>
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

	})
</script>
