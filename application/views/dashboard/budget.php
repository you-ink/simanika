<div class="main-content-container container-fluid px-4">
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Budget</span>
			<h3 class="page-title">Detail Program Kerja</h3>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<div class="row">
						<div class="col-6">
							<h6 class="m-0">Budget Detail</h6>
						</div>
						<div class="col-6 text-right">
							<button class="btn btn-sm btn-success" data-toggle="modal"
								data-target="#crudModal"><i class="fas fa-plus"></i>Tambah Pengeluaran</button>
						</div>
						<div class="card-body p-3 text-left">
							<table class="table mb-0">
								<thead class="bg-light">
									<tr>
										<th scope="col" class="border-0">No</th>
										<th scope="col" class="border-0">Jenis Pengeluaran</th>
										<th scope="col" class="border-0">Jumlah</th>
										<th scope="col" class="border-0">Satuan</th>
										<th scope="col" class="border-0">Harga</th>
										<th scope="col" class="border-0">Total</th>
										<th scope="col" class="border-0">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Air</td>
										<td>3</td>
										<td>Dus</td>
										<td>15.000</td>
										<td>45.000</td>
										<td>
									<button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
										data-target="#crudModalInfo"><i class="fas fa-info"></i></button>

									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#crudModal"><i class="fas fa-pen"></i></button>
									</a>

									<button type="button" class="btn btn-sm btn-danger"><i
											class="fas fa-trash"></i></button>
									</a>
								</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		<!-- CRUD Modal -->
		<div class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Detail/Tambah/Edit Data Proker</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Jenis Pengeluaran</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Webinar">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Jumlah</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Coming Soon">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Satuan</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Coming Soon">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Harga</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Coming Soon">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Total</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Coming Soon">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-primary">Tambah</button>
					</div>
				</div>
			</div>
		</div>

	
