<?php 
	$data_user = $this->Func->get_profile();
?>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
	am5.ready(function() {

		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("chartdiv");


		// Set themes
		// https://www.amcharts.com/docs/v5/concepts/themes/
		root.setThemes([
		  am5themes_Animated.new(root)
		]);


		// Create chart
		// https://www.amcharts.com/docs/v5/charts/xy-chart/
		var chart = root.container.children.push(am5xy.XYChart.new(root, {
		  panX: true,
		  panY: true,
		  wheelX: "panX",
		  wheelY: "zoomX",
		  pinchZoomX:true
		}));

		// Add cursor
		// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
		var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
		cursor.lineY.set("visible", false);


		// Create axes
		// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
		var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
		xRenderer.labels.template.setAll({
		  rotation: -90,
		  centerY: am5.p50,
		  centerX: am5.p100,
		  paddingRight: 15
		});

		var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
		  maxDeviation: 0.3,
		  categoryField: "bulan",
		  renderer: xRenderer,
		  tooltip: am5.Tooltip.new(root, {})
		}));

		var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
		  maxDeviation: 0.3,
		  renderer: am5xy.AxisRendererY.new(root, {})
		}));

		// Create series
		// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
		var series = chart.series.push(am5xy.ColumnSeries.new(root, {
		  name: "Series 1",
		  xAxis: xAxis,
		  yAxis: yAxis,
		  valueYField: "proker",
		  sequencedInterpolation: true,
		  categoryXField: "bulan",
		  tooltip: am5.Tooltip.new(root, {
		    labelText:"{valueY}"
		  })
		}));

		series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
		series.columns.template.adapters.add("fill", function(fill, target) {
		  return chart.get("colors").getIndex(series.columns.indexOf(target));
		});

		series.columns.template.adapters.add("stroke", function(stroke, target) {
		  return chart.get("colors").getIndex(series.columns.indexOf(target));
		});

		function get_statistics(year = 0) {
			param = {
				year: year
			}
			param[get_api_login_global()['key']] = get_api_login_value();
			callApi("POST", "main/get_statistics", param, function(req) {
				
				let datas = [
				]

				let months = [
				  "Januari",
				  "Februari",
				  "Maret",
				  "April",
				  "Mei",
				  "Juni",
				  "Juli",
				  "Agustus",
				  "September",
				  "Oktober",
				  "November",
				  "Desember"
				];


				$.each(req.data, function(index, val) {
					datas.push({
						bulan: months[index],
						proker: parseInt(val.proker.jumlah),
					});
				});

				xAxis.data.setAll(datas);
				series.data.setAll(datas);

				// Make stuff animate on load
				// https://www.amcharts.com/docs/v5/concepts/animations/
				series.appear(1000);
				chart.appear(1000, 100);

			})
		}

		get_statistics();

		$(document).on('change', 'select.select-statistics-year', function (e) {
			get_statistics($(this).val())
		})

	}); // end am5.ready()
</script>


<script>
	$(document).ready(function() {

		(function () {
		  	param = {}
			param[get_api_login_global()['key']] = get_api_login_value();
			callApi("POST", "main/dashboard", param, function(req) {
				$("h6.dashboard-item-1").text(req.data.new_member)
				$("h6.dashboard-item-2").text(req.data.all_proker)
				$("h6.dashboard-item-3").text(req.data.proker_this_month)
				$("h6.dashboard-item-4").text(req.data.not_done_proker)
				$("h6.dashboard-item-5").text(req.data.done_proker)
			})
		})();

		function load_proker_this_month(params = []) {
			$("table.table-proker-this-month").DataTable().destroy()
			$("table.table-proker-this-month").DataTable({
				"deferRender": true,
				"responsive": true,
				'serverSide': true,
				'processing': true,
				"ordering": false,
				"ajax": {
					"url": get_api_url()+"main/proker_this_month",
					"type": "POST",
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
						data: 'nama'
					},
					{
						data: 'divisi'
					},
					{
						data: 'nama_status'
					},
					{
						data: 'tanggal_acara'
					}
				],
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
            });
		}

		load_proker_this_month()

		<?php if ($data_user['level_id'] == 1): ?>
			function load_member(params = []) {
				$("table.table-member").DataTable().destroy()
				$("table.table-member").DataTable({
					"deferRender": true,
					"responsive": true,
					'serverSide': true,
					'processing': true,
					"ordering": false,
					"ajax": {
						"url": get_api_url()+"member",
						"type": "GET",
						"data": {
							"SIMANIKA-API-KEY": get_api_login_value(),
							"sort": "ASC",
							"status": "2"
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
							data: 'nim'
						},
						{
							data: 'angkatan'
						},
						{
							data: 'email'
						},
						{
							data: 'telp'
						},
						{
							data: null,
							render: res => {
								if (res.waktu_wawancara) {
									return res.tanggal_wawancara+" "+res.waktu_wawancara
								}
								return "-"
							}
						},
						{
							data: null,
							render: res => {
								let wawancara = `<button type="button" class="btn btn-sm mb-1 btn-warning btn-set-wawancara" data-id="${res.id}" data-name="${res.nama}" data-toggle="modal" data-target="#wawancaraModal">Set Wawancara</button> <br>`
								if (res.waktu_wawancara) {
									wawancara = ''
								}
								return `
									${wawancara}
									<button type="button" class="btn btn-sm mb-1 btn-success btn-setujui" data-id="${res.id}" data-name="${res.nama}" data-toggle="modal" data-target="#setujuiModal"><i class="fas fa-check"></i></button>
									<button type="button" class="btn btn-sm mb-1 btn-danger btn-delete-member" data-id="${res.id}" data-name="${res.nama}"><i class="fas fa-trash"></i></button>
								`;
							}
						}
					],
				    lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
				});
			}

			load_member()

			get_division();

			function get_division() {
				param = {}
				param[get_api_login_global()['key']] = get_api_login_value();
				callApi("POST", "division/getAll", param, function(req) {
					$("select#division").select2({
				        dropdownParent: $('#setujuiModal')
				    });
					option = '<option value="">-</option>';
					$.each(req.data, function(index, val) {
						option += '<option value="' + val.id + '">' + val.nama + '</option>';
					});
					$("select#division").html(option);
				})
			}

			get_position();

			function get_position() {
				param = {}
				param[get_api_login_global()['key']] = get_api_login_value();
				callApi("POST", "position/getAll", param, function(req) {
					$("select#position").select2({
				        dropdownParent: $('#setujuiModal')
				    });
					option = '<option value="">-</option>';
					$.each(req.data, function(index, val) {
						option += '<option value="' + val.id + '">' + val.nama + '</option>';
					});
					$("select#position").html(option);
				})
			}

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
				    data[get_api_login_global()['key']] = get_api_login_value();
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
						}
					})

				  }
				})
			})

			$(document).on('click', ".btn-set-wawancara", function () {
				$('#wawancaraModal .wawancara-member-name').html($(this).attr('data-name'))

				$('.btn-confirm-set-wawancara').attr('data-id', $(this).attr('data-id'))
			})

			$(document).on('click', '.btn-confirm-set-wawancara', function () {
				$(this).html("<i class='fas fa-spinner fa-pulse'></i>")
				$(this).attr('disabled', true)

				data = {
					user_id: $(this).attr('data-id'),
					tanggal: $("input#tanggalWawancara").val(),
					waktu: $("input#waktuWawancara").val()
				}

				data[get_api_login_global()['key']] = get_api_login_value();

				callApi("POST", "member/set_interview", data, function (req) {
					pesan = req.message;
					if (req.error == true) {
						Swal.fire(
					      'Gagal diupdate!',
					      pesan,
					      'error'
					    ).then((result) => {
							$('.btn-confirm-set-wawancara').html("Set Tanggal")
							$('.btn-confirm-set-wawancara').attr('disabled', false)
						})
					}else{
						Swal.fire(
					      'Diupdate!',
					      pesan,
					      'success'
					    ).then((result) => {
							$('.btn-confirm-set-wawancara').html("Set Tanggal")
							$('.btn-confirm-set-wawancara').attr('disabled', false)
						})
					    $("input#tanggalWawancara").val('')
					    $("input#waktuWawancara").val('')
					    $("#wawancaraModal").modal("hide")
						load_member();
					}
				})
			})

			$(document).on('click', ".btn-setujui", function () {
				$('#setujuiModal .setujui-member-name').html($(this).attr('data-name'))

				$('.btn-confirm-setujui').attr('data-id', $(this).attr('data-id'))
			})

			$(document).on('click', '.btn-confirm-setujui', function () {
				data = {
					user_id: $(this).attr('data-id'),
					divisi: $("select#division").val(),
					jabatan: $("select#position").val(),
				}

				data[get_api_login_global()['key']] = get_api_login_value();

				callApi("POST", "member/set_member", data, function (req) {
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
					    $("select#division").val('').change()
					    $("select#position").val('').change()
					    $("#setujuiModal").modal("hide")
						load_member();
					}
				})
			})
		<?php endif ?>

	})
</script>