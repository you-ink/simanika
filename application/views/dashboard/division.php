<div class="main-content-container container-fluid px-4">
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Division</span>
			<h3 class="page-title">Data Divisi</h3>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<div class="row">
						<div class="col-6">
							<h6 class="m-0">Data Divisi</h6>
						</div>
						<div class="col-6 text-right">
							<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#crudModal"><i
									class="fas fa-plus"></i> Tambah Divisi</button>
						</div>
					</div>
				</div>
				<div class="card-body p-3">
					<table class="table mb-0">
						<thead class="bg-light">
							<tr>
								<th scope="col" class="border-0">No</th>
								<th scope="col" class="border-0">Nama</th>
								<th scope="col" class="border-0">Divisi</th>
								<th scope="col" class="border-0">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Muhammad Rudy Darmawan</td>
								<td>BPH</td>
								<td>

									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
									<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Atikah Nuri Hazma</td>
								<td>BPH</td>
								<td>
									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
									<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Rahma Romadona Riswanti</td>
								<td>BPH</td>
								<td>

									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
									<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Nurlita Ayu Rakhmawati</td>
								<td>BPH</td>
								<td>

									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
									<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Marisa Setya Anggaraini</td>
								<td>BPH</td>
								<td>

									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
									<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>6</td>
								<td>M Basar Riski</td>
								<td>Humas</td>
								<td>

									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
									<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Hamid Rafiud Derajat</td>
								<td>PSDM</td>
								<td>

									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
									<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>8</td>
								<td>Lukman Afandi</td>
								<td>Kominfo</td>
								<td>

									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
											class="fas fa-pen"></i></button>
									<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
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
				<h5 class="modal-title" id="exampleModalLongTitle">Detail/Tambah/Edit Data Divisi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="fefulltName">Nama</label>
							<input type="text" class="form-control" id="fefulltName" placeholder="Nama lengkap" value="Muhammad Rudy Darmawan">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">Divisi</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="BPH">
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
