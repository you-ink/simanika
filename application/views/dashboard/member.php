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
						<div class="col-6">
							<h6 class="m-0">Data Anggota</h6>
						</div>
						<div class="col-6 text-right">
							<button class="btn btn-sm btn-success btn-add-division" data-toggle="modal" data-target="#crudModal"><i
									class="fas fa-plus"></i> Tambah Anggota</button>
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
	                <th scope="col" class="border-0">Golongan</th>
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

				<form>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="fefulltName">Nama Lengkap</label>
							<input type="text" class="form-control" id="fefulltName" placeholder="Nama lengkap" value="Sierra Brooks">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">Email</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="SierraBrooks@gmail.com">
						</div>
          <div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">NIM</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="E31200880">
					</div>
          <div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">Angkatan</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="2020">
					</div>
          <div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">Golongan</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="A">
					</div>
          <div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">Telp</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="081236915399">
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
