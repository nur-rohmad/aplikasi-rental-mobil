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
							<h6 class="m-0 font-weight-bold text-primary"><?= $judul ?> - <?= $pesanan['nama_pemesan'] ?></h6>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4">
									No Pesanan <br>
									Nama Pemesan <br>
									Foto KTP Pemesan <br>
									Alamat <br>
									Merk Mobil <br>
									Jenis Mobil <br>
									Harga Sewa <br>
									Tanggal Pinjam <br>
									Tanggal Kembali <br>
									Lama Sewa <br>
									Total Harga <br>
								</div>
								<div class="col-sm-1">
									: <br>
									: <br>
									: <br>
									: <br>
									: <br>
									: <br>
									: <br>
									: <br>
									: <br>
									: <br>
									: <br>

								</div>
								<div class="col-sm-6">
									<strong><?= $pesanan['no_pesanan'] ?></strong><br>
									<strong><?= $pesanan['nama_pemesan'] ?></strong><br>
									<strong><?= $pesanan['alamat'] ?></strong><br>
									<strong><a href="#" data-toggle="modal" data-target="#foto_ktp3"> Lihat Foto </a></strong><br>
									<strong><?= $pesanan['merk']  ?></strong><br>
									<strong><?= $pesanan['nama_mobil']  ?></strong><br>
									<strong>Rp. <?= number_format($pesanan['harga_sewa'])  ?> / 6 Jam</strong><br>
									<strong><?= $pesanan['tgl_pinjam'] ?></strong><br>
									<strong><?= $pesanan['tgl_kembali'] ?></strong><br>
									<strong><?= $pesanan['lama_sewa']  ?> Jam</strong><br>
									<strong>Rp. <?= number_format($pesanan['total_bayar']) ?></strong><br>

								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col">
									<?php if ($_SESSION['user']['role'] == 'admin') :  ?>
										<a href="<?= base_url('pesanan/ubah/' . $pesanan['id_pesanan']) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
									<?php endif; ?>
									<a href="<?= base_url('pesanan/hapus/' . $pesanan['id_pesanan']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
									<a href="<?= base_url('pesanan') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
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

<div class="modal fade " id="foto_ktp3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Foto KTP <?= $pesanan['nama_pemesan'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<img src="<?= base_url('uploads/pemesan/foto_ktp/' . $pesanan['foto_ktp']) ?>" style="height: 50vh; width: 100%;" alt="<?= $pesanan['nama_pemesan'] ?>" class="img-thumbnail mb-4">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>