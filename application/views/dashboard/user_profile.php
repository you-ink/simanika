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
					<h4 class="mb-0">Sierra Brooks</h4>
					<span class="text-muted d-block mb-2">Anggota PSDM</span>
					<button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
						<i class="material-icons mr-1">person_add</i>Follow</button>
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
												placeholder="Nama lengkap" value="Sierra Brooks"> </div>
										<div class="form-group col-md-6">
											<label for="feUserName">UserName</label>
											<input type="text" class="form-control" id="feUserName"
												placeholder="User Name" value="Brooks"> </div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="feEmailAddress">Email</label>
											<input type="email" class="form-control" id="feEmailAddress"
												placeholder="Email" value="sierra@gmail.com"> </div>
										<div class="form-group col-md-6">
											<label for="fePassword">Password</label>
											<input type="password" class="form-control" id="fePassword"
												placeholder="Password"> </div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="feNIM">NIM</label>
											<input type="NIM" class="form-control" id="feNIM"
												placeholder="NIM" value="E123456"> </div>
										<div class="form-group col-md-6">
											<label for="feNoHp">NO HP</label>
											<input type="NoHp" class="form-control" id="feNoHp"
												placeholder="Nomer Hanphone" value="085887865892"> </div>
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