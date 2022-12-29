<div class="main-content-container container-fluid px-4">
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Members</span>
			<h3 class="page-title">Data Anggota</h3>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<div class="row">
						<div class="col-12">
							<h6 class="m-0">Data Anggota</h6>
						</div>
					</div>
				</div>
				<div class="card-body p-3">
					<div class="table-responsive">
						<table class="table mb-0">
							<thead class="bg-light">
				              <tr>
				                <th scope="col" class="border-0">No</th>
				                <th scope="col" class="border-0">Nama Lengkap</th>
				                <th scope="col" class="border-0">Email</th>
				                <th scope="col" class="border-0">NIM</th>
				                <th scope="col" class="border-0">Angkatan</th>
				                <th scope="col" class="border-0">Divisi</th>
								<th scope="col" class="border-0">Jabatan</th>
				                <th scope="col" class="border-0">Telp</th>
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
			<div class="modal-body pb-0">
				<form>
					<div class="form-row">
						<div class="form-group col-12">
							<label>Tanggal Wawancara</label>
							<input type="date" class="form-control" id="tanggalWawancara" placeholder="Tanggal" readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label>Alamat</label>
							<textarea class="form-control" id="alamatMember" rows="3" style="resize: none;" readonly></textarea>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label class="mb-0">Bukti Kesanggupan</label>
							<div class="ff_fileupload_wrap">
								<table class="ff_fileupload_uploads">
									<tr class="ff_fileupload_queued">
										<td class="ff_fileupload_preview">
											<button class="ff_fileupload_preview_image ff_fileupload_preview_text_with_color ff_fileupload_preview_text_d" type="button" disabled="" aria-label="No preview available">File</button>
										</td>
										<td class="ff_fileupload_summary">
											<div class="ff_fileupload_filename" id="buktiKesanggupanNama">1AFE8B1F-24B4-FB5C-64FD-1C47769A3A24.docx</div>
											<div class="ff_fileupload_fileinfo" id="buktiKesanggupanInfo">Lihat File</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label class="mb-0">Bukti Mahasiswa</label>
							<div class="ff_fileupload_wrap">
								<table class="ff_fileupload_uploads">
									<tr class="ff_fileupload_queued">
										<td class="ff_fileupload_preview">
											<button class="ff_fileupload_preview_image ff_fileupload_preview_text_with_color ff_fileupload_preview_text_d" type="button" disabled="" aria-label="No preview available">File</button>
										</td>
										<td class="ff_fileupload_summary">
											<div class="ff_fileupload_filename" id="buktiMahasiswaNama">1AFE8B1F-24B4-FB5C-64FD-1C47769A3A24.docx</div>
											<div class="ff_fileupload_fileinfo" id="buktiMahasiswaInfo">Lihat File</div>
										</td>
									</tr>
								</table>
							</div>
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

<!-- CRUD Modal -->
<div class="modal fade" id="setujuiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Ganti Divisi dan Jabatan <span class="setujui-member-name"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body pb-0">
				<form>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="division">Divisi</label>
							<select id="division" class="form-control" style="width: 100%">
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="position">Jabatan</label>
							<select id="position" class="form-control" style="width: 100%">
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-confirm-setujui">Setujui</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>