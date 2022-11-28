<div class="main-content-container container-fluid px-4">
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Budget</span>
			<h3 class="page-title">Anggaran Program Kerja</h3>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<div class="row">
						<div class="col-6">
							<h6 class="m-0">Anggaran <span class="proker-name"></span> <span class="proker-total text-danger"></span></h6>
						</div>
						<div class="col-6 text-right">
							<button class="btn btn-sm btn-success" data-toggle="modal"
								data-target="#crudModalAnggaran"><i class="fas fa-plus"></i> Tambah Anggaran</button>
							<button class="btn btn-sm btn-success btn-add-budgetdetail" data-toggle="modal"
								data-target="#crudModal"><i class="fas fa-plus"></i> Tambah Detail Anggaran</button>
						</div>
						<div class="card-body p-3 text-left">
							<div class="table-responsive">
								<table class="table table-detail-anggaran mb-0">
									<thead class="bg-light">
										<tr>
											<th scope="col" class="border-0">No</th>
											<th scope="col" class="border-0">Nama Anggaran</th>
											<th scope="col" class="border-0">Jenis Pengeluaran</th>
											<th scope="col" class="border-0">Jumlah</th>
											<th scope="col" class="border-0">Satuan</th>
											<th scope="col" class="border-0">Harga</th>
											<th scope="col" class="border-0">Subtotal</th>
											<th scope="col" class="border-0">Aksi</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="crudModalAnggaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Anggaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row">
						<div class="form-group col-9">
							<input type="text" class="form-control" id="budgetName"
								placeholder="Nama Anggaran">
						</div>
						<div class="form-group col-3">
							<button class="btn btn-primary btn-confirm-add-budget w-100">Tambah</button>
						</div>
					</div>
				</form>
				<hr>
				<div class="table-responsive">
					<table class="table table-anggaran mb-0 w-100">
						<thead class="bg-light">
							<tr>
								<th scope="col" class="border-0">No</th>
								<th scope="col" class="border-0">Nama Anggaran</th>
								<th scope="col" class="border-0">Jumlah Detail</th>
								<th scope="col" class="border-0">Aksi</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
				<h5 class="modal-title" id="exampleModalLongTitle"><span class="title-budgetdetail-modal"></span> Detail Anggaran <span class="budgetdetail-name"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="budget">Anggaran</label>
							<select id="budget" class="form-control" style="width: 100%;">
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="jenisPengeluaran">Jenis Pengeluaran</label>
							<input type="text" class="form-control" id="jenisPengeluaran"
								placeholder="Jenis Pengeluaran">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="jumlah">Jumlah</label>
							<input type="text" class="form-control" id="jumlah"
								placeholder="Jumlah">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="satuan">Satuan</label>
							<input type="text" class="form-control" id="satuan"
								placeholder="Satuan">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="harga">Harga</label>
							<input type="text" class="form-control" id="harga"
								placeholder="Harga">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-confirm-update-budgetdetail">Update</button>
				<button type="button" class="btn btn-primary btn-confirm-add-budgetdetail">Tambah</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

	
