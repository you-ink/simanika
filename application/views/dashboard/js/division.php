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
						data: null
					},
					{
						data: null,
						render: res => {
							return `
								<button type="button" class="btn btn-sm btn-primary btn-update-division" data-id="${res.id}" data-name="${res.nama}" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
								<button type="button" class="btn btn-sm btn-danger btn-delete-division" data-id="${res.id}"><i class="fas fa-trash"></i></button>
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

	})
</script>