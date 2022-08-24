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
							<form method="POST" action="<?= base_url('mobil/tambah_mobil') ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label for="merk">Nama Merk</label>
									<select name="id_merk" id="merk" class="form-control">
										<option value="">Pilih Merk</option>
										<?php foreach ($data_merk as $merk) : ?>
											<option value="<?= $merk['id_merek'] ?>"><?= $merk['merk'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="nama">Nama Mobil</label>
									<input type="text" name="nama_mobil" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								</div>
								<div class="row">
									<div class="form-group col-6">
										<label for="warna">Warna Mobil</label>
										<input type="text" name="warna" id="warna" required="required" placeholder="ketik" autocomplete="off" class="form-control">
									</div>
									<div class="form-group col-6">
										<label for="jumlah_kursi">Jumlah Kursi</label>
										<input type="number" name="jumlah_kursi" id="jumlah_kursi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-6">
										<label for="no_polisi">No Polisi</label>
										<input type="text" name="no_polisi" id="no_polisi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
									</div>
									<div class="form-group col-6">
										<label for="tahun_beli">Tahun Beli</label>
										<input type="number" name="tahun_beli" id="tahun_beli" required="required" placeholder="ketik" autocomplete="off" class="form-control">
									</div>
									<div class="form-group col-12">
										<label for="harga">Harga Sewa</label>
										<input type="number" name="harga" id="harga" required="required" placeholder="ketik" autocomplete="off" class="form-control">
									</div>
									<div class="form-group col-12">
										<label for="denda">Denda Keterlambatan (/ Jam)</label>
										<input type="number" name="denda" id="denda" required="required" placeholder="Jumlah Denda" autocomplete="off" class="form-control">
									</div>
								</div>
								<div class="form-group ">
									<label for="gambar">Gambar Mobil</label>
									<input type="file" name="gambar_mobil" id="gambar" placeholder="ketik" autocomplete="off" class="form-control-file">
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
							<h6 class="m-0 font-weight-bold text-primary">Daftar Mobil</h6>
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

							<table class="table table-bordered" id="dataTable" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Mobil</th>
										<th>Merk</th>
										<th>Kursi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data_mobil as $mobil) : ?>
										<tr>

											<td><?= $no++ ?></td>
											<td><?= $mobil['nama_mobil'] ?></td>
											<td><?= $mobil['merk'] ?></td>
											<td><?= $mobil['jumlah_kursi'] ?></td>
											<td>
												<a href="<?= base_url('mobil/ubah/' . $mobil['id']) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
												<a href="<?= base_url('mobil/detail/' . $mobil['id']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Detail</a>
												<a href="<?= base_url('mobil/hapus/' . $mobil['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
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



<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>