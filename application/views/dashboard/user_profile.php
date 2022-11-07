<div class="main-content-container container-fluid px-4">
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Profile</span>
			<h3 class="page-title">User Profile</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card card-small mb-4 pt-3">
				<div class="card-header border-bottom text-center">
					<div class="mb-3 mx-auto">
						<img class="user-avatar rounded-circle mr-2"
							src="<?php echo base_url() ?>assets/img/avatars/0.jpg" alt="User Avatar">
					</div>
					<h4 class="mb-0">Muhammad Rudy Darmawan</h4>
					<span class="text-muted d-block mb-2">Ketua Umum</span>
					<button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2" data-toggle="modal"
						data-target="#crudModal"><i class="fas fa-pen mr-1"></i>Edit</button>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Account Details</h6>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item p-3">
						<div class="row">
							<div class="col">
								<form>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="fefulltName">Nama Lengkap</label>
											<input type="text" class="form-control" id="fefulltName"
												placeholder="Nama lengkap" value="Muhammad Rudy Darmawan"> </div>
										<div class="form-group col-md-6">
											<label for="feUserName">UserName</label>
											<input type="text" class="form-control" id="feUserName"
												placeholder="User Name" value="Rudydar"> </div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="feEmailAddress">Email</label>
											<input type="email" class="form-control" id="feEmailAddress"
												placeholder="Email" value="Rudy@gmail.com"> </div>
										<div class="form-group col-md-6">
											<label for="fePassword">Password</label>
											<input type="password" class="form-control" id="fePassword"
												placeholder="Password"> </div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="feNIM">NIM</label>
											<input type="NIM" class="form-control" id="feNIM" placeholder="NIM"
												value="E31200880"> </div>
										<div class="form-group col-md-6">
											<label for="feNoHp">NO HP</label>
											<input type="NoHp" class="form-control" id="feNoHp"
												placeholder="Nomer Hanphone" value="081236915399"> </div>
									</div>
									<button type="submit" class="btn btn-accent">Update Account</button>
								</form>
							</div>
						</div>
					</li>
				</ul>
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
				<h5 class="modal-title" id="exampleModalLongTitle">Info User profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="fefulltName">Nama Lengkap</label>
							<input type="text" class="form-control" id="fefulltName" placeholder="Nama lengkap"value="Muhammad Rudy Darmawan">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">userName</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email"value="Rudydar">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">Email</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email"value="Rudy@amail.com">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">Password</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email"value="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">NIM</label>
							<input type="email" class="form-control" id="feEmailAddress" placeholder="Email"value="E31200880">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="feEmailAddress">No HP</label>
							<input type="email" class="form-control" id="feEmailAddress"placeholder="Email" value="081236915399">
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
