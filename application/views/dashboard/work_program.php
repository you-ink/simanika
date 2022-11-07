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
					<div class="row">
						<div class="col-6">
							<h6 class="m-0">Data Work Program</h6>
						</div>
						<div class="col-6 text-right">
							<button class="btn btn-sm btn-success" data-toggle="modal"
								data-target="#crudModal"><i class="fas fa-plus"></i> Tambah Program
								Kerja</button>
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
										<td>Gathering Mahasiswa Bru MIF'22</td>
										<td>Terlaksana</td>
										<td>

											<button type="button" class="btn btn-sm btn-secondary"
												data-toggle="modal" data-target="#crudModalDoc"><i
													class="fas fa-upload"></i></td>
										<td>
											<button type="button" class="btn btn-sm btn-warning"
												data-toggle="modal" data-target="#crudModalInfo"><i
													class="fas fa-info"></i></button>

											<button type="button" class="btn btn-sm btn-primary"
												data-toggle="modal" data-target="#crudModal"><i
													class="fas fa-pen"></i></button>
											<button type="button" class="btn btn-sm btn-danger"><i
													class="fas fa-trash"></i></button>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Sharing Sessions Alumni dan Dosen</td>
										<td>Terlaksana</td>
										<td>

											<button type="button" class="btn btn-sm btn-secondary"
												data-toggle="modal" data-target="#crudModalDoc"><i
													class="fas fa-upload"></i></td>
										<td>
											<button type="button" class="btn btn-sm btn-warning"
												data-toggle="modal" data-target="#crudModalInfo"><i
													class="fas fa-info"></i></button>

											<button type="button" class="btn btn-sm btn-primary"
												data-toggle="modal" data-target="#crudModal"><i
													class="fas fa-pen"></i></button>
											<button type="button" class="btn btn-sm btn-danger"><i
													class="fas fa-trash"></i></button>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Webinar MIF</td>
										<td>Terlaksana</td>
										<td>

											<button type="button" class="btn btn-sm btn-secondary"
												data-toggle="modal" data-target="#crudModalDoc"><i
													class="fas fa-upload"></i></td>
										<td>
											<button type="button" class="btn btn-sm btn-warning"
												data-toggle="modal" data-target="#crudModalInfo"><i
													class="fas fa-info"></i></button>

											<button type="button" class="btn btn-sm btn-primary"
												data-toggle="modal" data-target="#crudModal"><i
													class="fas fa-pen"></i></button>
											<button type="button" class="btn btn-sm btn-danger"><i
													class="fas fa-trash"></i></button>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Anjangsana Antar Program Studi</td>
										<td>Coming Soon</td>
										<td>

											<button type="button" class="btn btn-sm btn-secondary"
												data-toggle="modal" data-target="#crudModalDoc"><i
													class="fas fa-upload"></i></td>
										<td>
											<button type="button" class="btn btn-sm btn-warning"
												data-toggle="modal" data-target="#crudModalInfo"><i
													class="fas fa-info"></i></button>

											<button type="button" class="btn btn-sm btn-primary"
												data-toggle="modal" data-target="#crudModal"><i
													class="fas fa-pen"></i></button>
											<button type="button" class="btn btn-sm btn-danger"><i
													class="fas fa-trash"></i></button>
										</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Open Recuitment HIMANIKA</td>
										<td>Coming Soon</td>
										<td>

											<button type="button" class="btn btn-sm btn-secondary"
												data-toggle="modal" data-target="#crudModalDoc"><i
													class="fas fa-upload"></i></td>
										<td>
											<button type="button" class="btn btn-sm btn-warning"
												data-toggle="modal" data-target="#crudModalInfo"><i
													class="fas fa-info"></i></button>

											<button type="button" class="btn btn-sm btn-primary"
												data-toggle="modal" data-target="#crudModal"><i
													class="fas fa-pen"></i></button>
											<button type="button" class="btn btn-sm btn-danger"><i
													class="fas fa-trash"></i></button>
										</td>
									</tr>
									<tr>
										<td>6</td>
										<td>Management Informatics Competition</td>
										<td>Coming Soon</td>
										<td>

											<button type="button" class="btn btn-sm btn-secondary"
												data-toggle="modal" data-target="#crudModalDoc"><i
													class="fas fa-upload"></i></td>
										<td>
											<button type="button" class="btn btn-sm btn-warning"
												data-toggle="modal" data-target="#crudModalInfo"><i
													class="fas fa-info"></i></button>

											<button type="button" class="btn btn-sm btn-primary"
												data-toggle="modal" data-target="#crudModal"><i
													class="fas fa-pen"></i></button>
											<button type="button" class="btn btn-sm btn-danger"><i
													class="fas fa-trash"></i></button>
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
									<label for="fefulltName">Nama Proker</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Webinar">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Status</label>
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

		<!-- CRUD Modal Info -->
		<div class="modal fade" id="crudModalInfo" tabindex="-1" role="dialog"
			aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Info Dokumen Proker</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Nama Pengirim</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Mutia Budi Utami">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Nama Proker</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Webinar">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Status</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Coming Soon">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Waktu Dikirim</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="20 November 2022">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- CRUD Modal Dokumen -->
		<div class="modal fade" id="crudModalDoc" tabindex="-1" role="dialog"
			aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Upload Dokumen</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Nama Pengirim</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="Mutia Budi Utami">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName">Waktu Dikirim</label>
									<input type="text" class="form-control" id="fefulltName"
										placeholder="Nama lengkap" value="20 November 2022">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="fefulltName"> Upload Dokumen</label>
									<input type="text"><button type="button"
										class="btn btn-sm btn-secondary"><i class="fas fa-upload"></i>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Upload</button>
						<button type="button" class="btn btn-primary">Tambah</button>
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
						<h5 class="modal-title" id="exampleModalLongTitle">Detail/Tambah/Edit Data Anggota</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-primary">Tambah</button>
					</div>
				</div>
			</div>
		</div>
