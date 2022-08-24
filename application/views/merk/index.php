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
								<form method="POST" action="<?= base_url('merk/tambah') ?>">
									<div class="form-group">
										<label for="merk">Nama Merk</label>
										<input type="text" class="form-control" name="merk" id="merk" autocomplete="off" required="required" placeholder="ketik">
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
								<h6 class="m-0 font-weight-bold text-primary">Daftar Merk</h6>
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
											<th>Merk</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data_merk as $key => $merk) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $merk['merk'] ?></td>
												<td>
													<a href="#" data-toggle="modal" data-target="#modalEdit-<?= $key ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
													<a href="<?= base_url('merk/hapus/' . $merk['id_merek']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
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

	<!-- modal edit -->
	<?php foreach ($data_merk as $key => $merk) :  ?>
		<div class="modal fade" id="modalEdit-<?= $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Merk</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="<?= base_url('merk/update') ?>">
						<input type="hidden" name="id_merek" value="<?= $merk['id_merek'] ?>">
						<div class="modal-body">
							<div class="form-group">
								<label for="merk">Nama Merk</label>
								<input type="text" class="form-control" name="merk" id="merk" autocomplete="off" required="required" value="<?= $merk['merk'] ?>">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-success">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<!-- modal edit -->

	<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('assets/sb-admin-2/') ?>js/sb-admin-2.min.js"></script>

	<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>
	</body>

	</html>