<?php 
	$user = $this->Func->get_profile();
?>
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
							<button class="btn btn-sm btn-success btn-add-proker" data-toggle="modal"
								data-target="#crudModal"><i class="fas fa-plus"></i> Tambah Program Kerja</button>
						</div>
						<div class="card-body p-3 text-left">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead class="bg-light">
										<tr>
											<th scope="col" class="border-0">No</th>
											<th scope="col" class="border-0">Nama Program Kerja</th>
											<th scope="col" class="border-0">Status</th>
											<th scope="col" class="border-0">Tanggal</th>
											<th scope="col" class="border-0">Total Pengeluaran</th>
											<th scope="col" class="border-0">Anggaran</th>
											<th scope="col" class="border-0">Dokumen</th>
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

<!-- CRUD Modal Dokumen -->
<div class="modal fade" id="crudModalDoc" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Upload Dokumen Untuk <span class="document-proker-name"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row upload--tor">
						<div class="form-group col-12">
							<label>TOR</label>
							<input id="tor" type="file" accept=".pdf, .docx, .doc">
						</div>
						<div class="form-group col-12 text-right btn--upload-file d-none">
							<button type="button" class="btn btn-sm btn-secondary btn--upload-tor">Upload</button>
						</div>
					</div>
					<?php if ($user['level_id'] == 1): ?>
						<div class="form-row upload--lpj">
							<div class="form-group col-12">
								<label>LPJ</label>
								<input id="lpj" type="file" accept=".pdf, .docx, .doc">
							</div>
							<div class="form-group col-12 text-right btn--upload-file d-none">
								<button type="button" class="btn btn-sm btn-secondary btn--upload-lpj">Upload</button>
							</div>
						</div>
					<?php endif ?>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- CRUD Modal -->
<div class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle"><span class="title-proker-modal"></span> Program Kerja <span class="proker-name"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
			<form>
				<div class="form-row">
					<div class="form-group col-12">
						<label for="prokerName">Nama Program Kerja</label>
						<input type="text" id="prokerName" class="form-control" placeholder="Nama Proker">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12">
						<label for="prokerDate">Tanggal Acara</label>
						<input type="date" id="prokerDate" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12">
						<label for="prokerStatus">Status</label>
						<select id="prokerStatus" class="form-control">
							<option value="1" selected>Terlaksana</option>
							<option value="2">Belum Terlaksana</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12">
						<label for="Pelaksana">Pelaksana</label>
						<select id="pelaksana" class="form-control" style="width: 100%">
						</select>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-12">
						<label for="penanggungJawab">Penanggung Jawab</label>
						<select id="penanggungJawab" class="form-control" style="width: 100%">
						</select>
					</div>
				</div>
			</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-confirm-update-proker">Update</button>
				<button type="button" class="btn btn-primary btn-confirm-add-proker">Tambah</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
