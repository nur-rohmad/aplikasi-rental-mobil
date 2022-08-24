<?php include './application/views/partials/navbar.php' ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
	<div id="content">
		<?php include './application/views/partials/topbar.php' ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
						</div>
						<!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
					</div>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">

				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="card shadow">
						<div class="card-header">
							<h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
						</div>
						<div class="card-body">
							<form method="POST" action="<?= base_url('akun/tambah') ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input type="text" name="nama" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" id="username" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								</div>
								<div class="form-group">
									<label for="password2">Hak Akses User</label>
									<select name="role" id="" class="form-control">
										<option value="">Pilih Hak Akses</option>
										<option value="admin">Adnin</option>
										<option value="pengguna">Pengguna</option>
									</select>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
									<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-8">
					<div class="card shadow">
						<div class="card-header">
							<h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
						</div>
						<div class="card-body">
							<?= $this->session->flashdata('message'); ?>
							<?php if ($this->session->FlashData('success')) : ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">

									<?= $this->session->FlashData('success') ?>

									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										<span class="sr-only">Close</span>
									</button>
								</div>

							<?php endif; ?>

							<table class="table table-bordered" id="dataTable" width="" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Hak Akses</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data_akun as $akun) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $akun['nama'] ?></td>
											<td><?= $akun['username'] ?></td>
											<td><?= $akun['role'] ?></td>
											<td>

												<a href="<?= base_url('akun/ubah/' . $akun['id']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
												<a href="<?= base_url('akun/hapus/' . $akun['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include './application/views/partials/footer.php' ?>
</div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>