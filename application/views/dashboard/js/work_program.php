<script>
	$(document).ready(function () {

		function load_work_program(params = []) {
			$("table.table").DataTable({
                    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
               });
		}

		load_work_program();

	})

</script>
