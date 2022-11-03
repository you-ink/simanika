<script>
	$(document).ready(function() {

		function load_division(params = []) {
			$("table.table").DataTable({
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