<script>
	$(document).ready(function() {

		function load_member(params = []) {
			$("table.table").DataTable({
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

		$('.btn-delete').on('click', function() {
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
			    Swal.fire(
			      'Dihapus!',
			      'Data berhasil dihapus.',
			      'success'
			    )
			  }
			})
		})

	})
</script>