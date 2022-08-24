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
							<h1 class="h3 mb-4 text-gray-800">Ubah Pesanan</h1>
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
							<form method="POST" action="<?= base_url('pesanan/ubah/' . $pesanan['id_pesanan']) ?>" enctype="multipart/form-data">
								<?php if ($_SESSION['user']['role'] == 'admin') : ?>
									<div class="form-group">
										<label for="id_pemesan">Nama Pemesan</label>
										<select name="id_pemesan" id="id_pemesan" class="form-control">
											<option value="">Pilih Pemesan</option>
											<?php foreach ($data_pemesan as $pemesan) : ?>
												<option value="<?= $pemesan['id'] ?>" <?= $pesanan['id_pemesan'] == $pemesan['id'] ? 'selected' : ''  ?>><?= $pemesan['nama_pemesan'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								<?php endif; ?>



								<div class="form-group " id="id_mobil_div">
									<label for="id_mobil">Mobil</label>
									<select name="id_mobil" id="id_mobil" class="form-control">
										<option value="">Pilih Mobil</option>
										<?php foreach ($data_mobil as $mobil) : ?>
											<option value="<?= $mobil['id'] ?>" <?= $pesanan['id_mobil'] == $mobil['id'] ? 'selected' : ''  ?>><?= $mobil['nama_mobil'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>



								<div class="row">

									<div class="col-md-12">
										<div class="form-group">
											<label for="harga">Harga</label>
											<input type="number" name="harga" id="harga" placeholder="ketik" required="required" readonly autocomplete="off" class="form-control" value="<?= $pesanan['harga_sewa'] ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="tgl_pinjam">Tanggal Pinjam</label>
											<input type="date" name="tgl_pinjam" id="tgl_pinjam" required="required" autocomplete="off" class="form-control" value="<?= $pesanan['tgl_pinjam'] ?>">
										</div>
									</div>
									<div class=" col-md-6">
										<div class="form-group">
											<label for="tgl_kembali">Tanggal Kembali</label>
											<input type="date" name="tgl_kembali" id="tgl_kembali" required="required" autocomplete="off" class="form-control" value="<?= $pesanan['tgl_kembali'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lama_sewa">Lama Sewa</label>
											<input type="number" name="lama_sewa" id="lama_sewa" placeholder="ketik" required="required" readonly autocomplete="off" class="form-control" value="<?= $pesanan['lama_sewa'] ?>">
											<small id="error_lama_sewa" class="text-danger d-none"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="total_bayar">Total Bayar</label>
											<input type="number" name="total_bayar" id="total_bayar" placeholder="ketik" required="required" autocomplete="off" class="form-control" value="<?= $pesanan['total_bayar'] ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
									<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
									<a href="<?= base_url('pesanan') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
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
<script>
	$('#id_mobil').change(() => {
		// const jasa = "rental_mobil";
		let id = $('#id_mobil').val();
		console.log(id)
		$.ajax({
			url: '<?= base_url('pesanan/get_harga_jasa') ?>',
			type: "POST",
			// dataType: "JSON",
			data: {
				id_jasa: id,
			},
			cache: false,
			success: function(res) {
				let data_json = JSON.parse(res)
				console.log(data_json)
				$('#harga').val(data_json.data.harga)
			}
		});
	})

	$('#tgl_kembali').change(() => {
		let tanggal_pinjam = new Date($('#tgl_pinjam').val())
		let tanggal_kembali = new Date($('#tgl_kembali').val())

		let seleish_hari = (tanggal_kembali.getTime() - tanggal_pinjam.getTime()) / (1000 * 3600 * 24)
		console.log(seleish_hari)
		if (seleish_hari >= 0) {
			$('#error_lama_sewa').addClass('d-none');
			$('#lama_sewa').val(seleish_hari)
		} else if (isNaN(seleish_hari) || seleish_hari < 0) {
			$('#error_lama_sewa').removeClass('d-none');
			$('#error_lama_sewa').html('Tidak dapat  menghitung lama sewa');
		}

		let total_bayar = $('#harga').val() * seleish_hari
		$('#total_bayar').val(total_bayar)
	})
</script>
</body>

</html>