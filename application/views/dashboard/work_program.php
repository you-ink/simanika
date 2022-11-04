<div class="main-content-container container-fluid px-4">
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Work Program</span>
			<h3 class="page-title">Data Program Kerja</h3>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Work Program</h6>
				</div>
				<div class="card-body p-3 text-left">
					<table class="table mb-0">
						<thead class="bg-light">
							<tr>
								<th scope="col" class="border-0">No</th>
								<th scope="col" class="border-0">Nama Program Kerja</th>
								<th scope="col" class="border-0">Status</th>
								<th scope="col" class="border-0">Dokumen</th>
								<th scope="col" class="border-0">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Gathering</td>
								<td>Terlaksana</td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-upload"></i></td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
												class="fas fa-pen"></i></button>
									</a>
									<a href="#">
										<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
									</a>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Sharing Sessions</td>
								<td>Terlaksana</td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-upload"></i></td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
												class="fas fa-pen"></i></button>
									</a>
									<a href="#">
										<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
									</a>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Webinar</td>
								<td>Terlaksana</td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-upload"></i></td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
												class="fas fa-pen"></i></button>
									</a>
									<a href="#">
										<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
									</a>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Anjangsana</td>
								<td>Coming Soon</td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-upload"></i></td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
												class="fas fa-pen"></i></button>
									</a>
									<a href="#">
										<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
									</a>
								</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Open Recuitment HIMANIKA</td>
								<td>Coming Soon</td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-upload"></i></td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
												class="fas fa-pen"></i></button>
									</a>
									<a href="#">
										<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
									</a>
								</td>
							</tr>
							<tr>
								<td>6</td>
								<td>Management Informatics Competition</td>
								<td>Coming Soon</td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-upload"></i></td>
								<td>
									<a href="#">
										<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i
												class="fas fa-pen"></i></button>
									</a>
									<a href="#">
										<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
							<label for="fefulltName">Nama Proker</label>
							<input type="text" class="form-control" id="fefulltName" placeholder="Nama lengkap" value="Sierra Brooks">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="fefulltName">Status</label>
							<input type="text" class="form-control" id="fefulltName" placeholder="Nama lengkap" value="Sierra Brooks">
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
