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
				<div class="col-md-6">
					<div class="card shadow">
						<div class="card-header">
							<h6 class="m-0 font-weight-bold text-primary"><?= $judul ?> - <?= $pemesan['nama_pemesan'] ?></h6>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<img src="<?= base_url('uploads/pemesan/' . $pemesan['foto']) ?>" alt="<?= $pemesan['nama_pemesan'] ?>" class="img-thumbnail mb-4">
								</div>
								<div class="col-md-8">
									<table class="table table-borderless">
										<tr>
											<td>Nama</td>
											<td>:</td>
											<td><b><?= $pemesan['nama_pemesan'] ?></b></td>
										</tr>
										<tr>
											<td>Jenis Kelamin</td>
											<td>:</td>
											<td><b><?= $pemesan['jenis_kelamin'] == 'L' ? 'Laki laki' : 'Perempuan' ?></b></td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td>:</td>
											<td><b><?= $pemesan['alamat'] ?></b></td>
										</tr>
										<tr>
											<td>Foto KTP</td>
											<td>:</td>
											<td><b><a href="#" data-toggle="modal" data-target="#foto_ktp">lihat foto</a></b></td>
										</tr>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<a href="<?= base_url('pemesan/ubah/' . $pemesan['id']) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
									<a href="<?= base_url('pemesan/hapus/' . $pemesan['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
									<a href="<?= base_url('pemesan') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
								</div>
							</div>
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

<div class="modal fade " id="foto_ktp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Foto KTP <?= $pemesan['nama_pemesan'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<img src="<?= base_url('uploads/pemesan/foto_ktp/' . $pemesan['foto_ktp']) ?>" style="height: 50vh; width: 100%;" alt="<?= $pemesan['nama_pemesan'] ?>" class="img-thumbnail mb-4">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>