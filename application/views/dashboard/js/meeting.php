<script>
	$(document).ready(function () {

		function load_meeting(params = []) {
			$("table.table").DataTable({
                    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
               });
		}

		load_meeting();

	})

</script>
