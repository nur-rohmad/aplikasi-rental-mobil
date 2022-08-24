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
							<form method="POST" action="<?= base_url('pemesan/tambah') ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label for="nama">Nama Pemesan</label>
									<input type="text" name="nama_pemesan" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								</div>

								<div class="form-group">
									<label for="jenis_kelamin">Jenis Kelamin</label>
									<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
										<option value="L">Laki laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>

								<div class="form-group">
									<label for="alamat">Alamat Pemesan</label>
									<textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="ketik"></textarea>
								</div>

								<div class="form-group">
									<label for="foto">Foto Pemesan</label>
									<input type="file" name="foto" id="foto" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
									ukuran foto wajib 200px X 200px
								</div>
								<div class="form-group">
									<label for="foto_ktp">Foto KTP</label>
									<input type="file" name="foto_ktp" id="foto_ktp" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
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
							<h6 class="m-0 font-weight-bold text-primary">Daftar Pemesan</h6>
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
										<th>ID Pemesan</th>
										<th>Nama</th>
										<th>Jenis Kelamin</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data_pemesan as $pemesan) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td class="text-center"><?= $pemesan['id'] ?></td>
											<td><?= $pemesan['nama_pemesan'] ?></td>
											<td><?= $pemesan['jenis_kelamin'] == 'L' ? 'Laki Laki' : 'Perempuan' ?></td>
											<td>
												<a href="<?= base_url('pemesan/ubah/' . $pemesan['id']) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
												<a href="<?= base_url('pemesan/detail/' . $pemesan['id']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Detail</a>
												<a href="<?= base_url('pemesan/hapus/' . $pemesan['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
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