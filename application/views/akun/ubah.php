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
							<h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
						</div>
						<div class="card-body">
							<form method="POST" action="<?= base_url('akun/ubah/' . $data_akun['id']) ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input type="text" name="nama" value="<?= $data_akun['nama'] ?>" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" id="username" value="<?= $data_akun['username'] ?>" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" placeholder="ketik" autocomplete="off" class="form-control">
								</div>
								<div class="form-group">
									<label for="password2">Hak Akses User</label>
									<select name="role" id="" class="form-control">
										<option value="">Pilih Hak Akses</option>
										<option value="admin" <?= $data_akun['role'] == 'admin' ? 'selected' : '' ?>>Adnin</option>
										<option value="pengguna" <?= $data_akun['role'] == 'pengguna' ? 'selected' : '' ?>>Pengguna</option>
									</select>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-pen"></i> ubah</button>
									<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
									<a href="<?= base_url('akun') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> kembali</a>
								</div>
							</form>
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