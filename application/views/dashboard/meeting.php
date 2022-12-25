<?php 
	$user = $this->Func->get_profile();
?>
<div class="main-content-container container-fluid px-4">
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Meeting Agenda</span>
			<h3 class="page-title">Data Agenda Rapat</h3>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<div class="row">
						<div class="col-6">
							<h6 class="m-0">Data Meeting Agenda</h6>
						</div>
						<div class="col-6 text-right">
							<button class="btn btn-sm btn-success btn-add-meeting" data-toggle="modal" data-target="#crudModal"><i class="fas fa-plus"></i> Tambah Agenda Rapat </button>
						</div>
					</div>
				</div>
				<div class="card-body p-3 text-left">
					<div class="table-responsive">
						<table class="table mb-0">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0">No</th>
									<th scope="col" class="border-0">Tipe Agenda Rapat</th>
									<th scope="col" class="border-0">Nama Agenda Rapat</th>
									<th scope="col" class="border-0">Waktu</th>
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


<!-- CRUD Modal -->
<div class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle"><span class="title-meeting-modal"></span> Agenda Rapat <span class="meeting-name"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="meetingTipe">Tipe Agenda Rapat</label>
							<select id="meetingTipe" class="form-control">
								<option value="1" selected>Rapat Resmi</option>
								<option value="2">Rapat Program Kerja</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="meetingName">Nama Agenda Rapat</label>
							<input type="text" class="form-control" id="meetingName" placeholder="Nama Rapat">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="meetingDate">Tanggal Meeting</label>
							<input type="date" class="form-control" id="meetingDate" placeholder="Tanggal">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-confirm-update-meeting">Update</button>
				<button type="button" class="btn btn-primary btn-confirm-add-meeting">Tambah</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- CRUD Modal Dokumen -->
<div class="modal fade" id="crudModalDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true" data-backdrop="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Upload Dokumen <span class="document-meeting-name"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row upload--notulensi">
						<div class="form-group col-12">
							<label>Notulensi</label>
							<input id="notulensi" type="file" accept=".pdf, .docx, .doc">
						</div>
						<div class="form-group col-12 text-right btn--upload-file d-none">
							<button type="button" class="btn btn-sm btn-secondary btn--upload-notulensi">Upload</button>
						</div>
					</div>
					<div class="form-row upload--daftarhadir">
						<div class="form-group col-12">
							<label>Daftar Hadir</label>
							<input id="daftarhadir" type="file" accept=".pdf, .docx, .doc">
						</div>
						<div class="form-group col-12 text-right btn--upload-file d-none">
							<button type="button" class="btn btn-sm btn-secondary btn--upload-daftarhadir">Upload</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>