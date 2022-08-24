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
							<h1 class="h3 mb-4 text-gray-800">Ubah Data Pemesan</h1>
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
				<div class="col-sm-6">
					<div class="card shadow">
						<div class="card-header">
							<h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
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
							<form method="POST" action="<?= base_url('pemesan/ubah/' . $pemesan['id']) ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label for="nama">Nama pemesan</label>
									<input type="text" value="<?= $pemesan['nama_pemesan'] ?>" name="nama_pemesan" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								</div>
								<div class="form-group">
									<label for="jenis_kelamin">Jenis Kelamin</label>
									<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
										<option value="L" <?= $pemesan['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki laki</option>
										<option value="P" <?= $pemesan['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
									</select>
								</div>

								<div class="form-group">
									<label for="alamat">Alamat Pemesan</label>
									<textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="ketik"><?= $pemesan['alamat'] ?></textarea>
								</div>

								<div class="form-group">
									<label for="foto">Foto Pemesan</label>
									<input type="file" name="foto" id="foto" placeholder="ketik" autocomplete="off" class="form-control-file">
									ukuran foto wajib 200px X 200px
								</div>
								<div class="form-group">
									<label for="foto_ktp">Foto KTP</label>
									<input type="file" name="foto_ktp" id="foto_ktp" placeholder="ketik" autocomplete="off" class="form-control-file">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-sm btn-success" name="ubah"><i class="fa fa-pen"></i> Ubah</button>
									<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
									<a href="<?= base_url('pemesan') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
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