<div class="main-content-container container-fluid px-4">
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Member</span>
			<h3 class="page-title">Data Anggota</h3>
		</div>
	</div>
	<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Data Anggota</h6>
        </div>
        <div class="card-body p-3">
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
              <tr>
                <td>1</td>
                <td>Muhammad Rudy Darmawan</td>
                <td>Rudy@gmail.com</td>
                <td>E31200880</td>
                <td>2020</td>
                <td>A</td>
                <td>081236915399</td>
                <td>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#crudModal"><i class="fas fa-info"></i></button>
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i class="fas fa-pen"></i></button>
                  <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Atikah Nuri Hazma</td>
                <td>Atikah@gmail.com</td>
                <td>E31200880</td>
                <td>2020</td>
                <td>A</td>
                <td>081236915399</td>
                <td>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#crudModal"><i class="fas fa-info"></i></button>                  
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i class="fas fa-pen"></i></button>                  
                  <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Rahma Romadona Ayu Riswanti</td>
                <td>Rahma@gmail.com</td>
                <td>E31200880</td>
                <td>2020</td>
                <td>A</td>
                <td>081236915399</td>
                <td>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#crudModal"><i class="fas fa-info"></i></button>                  
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i class="fas fa-pen"></i></button>                  
                  <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Mutia Budi Utami</td>
                <td>Mutia@gmail.com</td>
                <td>E31200880</td>
                <td>2021</td>
                <td>A</td>
                <td>081236915399</td>
                <td>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#crudModal"><i class="fas fa-info"></i></button>                  
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i class="fas fa-pen"></i></button>                  
                  <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>Nurlita Ayu Rakhmawati</td>
                <td>Ayu@gmail.com</td>
                <td>E31200880</td>
                <td>2020</td>
                <td>A</td>
                <td>081236915399</td>
                <td>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#crudModal"><i class="fas fa-info"></i></button>                  
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i class="fas fa-pen"></i></button>                  
                  <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td>Marisa Setya Anggraini</td>
                <td>Marisa@gmail.com</td>
                <td>E31200880</td>
                <td>2021</td>
                <td>B</td>
                <td>081236915399</td>
                <td>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#crudModal"><i class="fas fa-info"></i></button>                  
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudModal"><i class="fas fa-pen"></i></button>                  
                  <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
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
<div class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
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