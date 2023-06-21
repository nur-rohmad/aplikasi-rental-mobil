<?php include './application/views/partials/navbar.php' ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
	<div id="content" class="mb-4">
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
							<form method="POST" action="<?= base_url('pesanan/prosses_tambah_pesanan') ?>" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="harga">No Pesanan</label>
											<input type="no_pesanan" name="no_pesanan" id="no_pesanan" required="required" readonly autocomplete="off" class="form-control">
										</div>
									</div>
								</div>

								<?php if ($_SESSION['user']['role'] == 'admin') : ?>
									<div class="form-group">
										<label for="id_pemesan">Nama Pemesan</label>
										<select name="id_pemesan" id="id_pemesan" class="form-control">
											<option value="">Pilih Pemesan</option>
											<?php foreach ($data_pemesan as $pemesan) : ?>
												<option value="<?= $pemesan['id'] ?>"><?= $pemesan['id'] ?> - <?= $pemesan['nama_pemesan'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								<?php endif; ?>

								<div class="form-group " id="id_mobil_div">
									<label for="id_mobil">Mobil</label>
									<select name="id_mobil" id="id_mobil" class="form-control">
										<option value="">Pilih Mobil</option>
										<?php foreach ($data_mobil as $mobil) : ?>
											<option value="<?= $mobil['id'] ?>"><?= $mobil['nama_mobil'] ?> ( <?= $mobil['no_polisi'] ?> )</option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="harga">Tempat Tujuan</label>
											<input type="text" name="tujuan" id="tujuan" placeholder="Tujuan" required="required" autocomplete="off" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="harga">Perihal</label>
											<input type="text" name="perihal" id="perihal" placeholder="Perihal" required="required" autocomplete="off" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="harga">Harga</label>
											<input type="number" name="harga" id="harga" placeholder="ketik" required="required" readonly autocomplete="off" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="tgl_pinjam">Tanggal Pinjam</label>
											<input type="datetime-local" name="tgl_pinjam" id="tgl_pinjam" required="required" autocomplete="off" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="tgl_kembali">Tanggal Kembali</label>
											<input type="datetime-local" name="tgl_kembali" id="tgl_kembali" required="required" autocomplete="off" class="form-control">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group ">
											<label class="" for="tambah_sopir">Penambahan jasa sopir</label>
											<select name="jasa_sopir" id="jasa_sopir" class="form-control">
												<option value="tanpa_sopir">Tanpa Sopir</option>
												<option value="dengan_sopir">Sewa Sopir</option>
											</select>
										</div>
									</div>
									<?php if ($_SESSION['user']['role'] == 'admin') : ?>
										<div class="col-md-12 d-none" id="list_sopir">
											<label for="id_mobil">Sopir</label>
											<select name="sopir_by" id="sopir_by" class="form-control">
												<option value="">Pilih sopir</option>
												<?php foreach ($data_sopir as $sopir) : ?>
													<option value="<?= $sopir['id_sopir'] ?>"> <?= $sopir['id_sopir'] ?> - <?= $sopir['nama_sopir'] ?> </option>
												<?php endforeach; ?>
											</select>
										</div>
									<?php endif; ?>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lama_sewa">Lama Sewa</label>
											<input type="number" name="lama_sewa" id="lama_sewa" placeholder="ketik" required="required" readonly autocomplete="off" class="form-control">
											<small id="error_lama_sewa" class="text-danger d-none"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="total_bayar">Total Bayar</label>
											<input type="number" name="total_bayar" id="total_bayar" placeholder="ketik" required="required" readonly autocomplete="off" class="form-control">
										</div>
									</div>
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
							<h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
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
										<th>No Pesanan</th>
										<?php if ($_SESSION['user']['role'] == 'admin') : ?>
											<th>Nama Pemesan</th>
										<?php endif; ?>
										<th>Merk Mobil</th>
										<th>Jenis Kendaraan</th>
										<th>Total Bayar</th>
										<th width="20%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data_pesanan as $key => $pesanan) : ?>
										<tr style=" <?php if ($pesanan['tgl_kembali'] < date('Y-m-d H:i:s') && $pesanan['status_sewa'] == "belum selesai") {
										    echo 'background-color: gray; color: aliceblue; ';
										}   ?> ">
											<td><?= $no++ ?></td>
											<td><?= $pesanan['no_pesanan'] ?></td>
											<?php if ($_SESSION['user']['role'] == 'admin') : ?>
												<td><?= $pesanan['nama_pemesan'] ?></td>
											<?php endif; ?>
											<td><?= $pesanan['merk'] ?></td>
											<td><?= $pesanan['nama_mobil']  ?></td>
											<td>Rp. <?= number_format($pesanan['total_harga']) ?></td>
											<td>
												<?php if ($_SESSION['user']['role'] == 'admin') :  ?>
													<a href="<?= base_url('pesanan/ubah/' . $pesanan['id_pesanan']) ?>" class="btn btn-sm btn-info mb-2"><i class="fa fa-pen"></i> Ubah</a><br>
													<?php if ($pesanan['status_sewa'] == "belum selesai") : ?>
														<a href="<?= base_url('pesanan/kembalikan_mobil/' . $pesanan['id_pesanan']) ?>" class="btn btn-sm btn-success mb-2"><i class="fa fa-upload"></i> Kembalikan</a><br>
													<?php endif; ?>
													<?php if ($pesanan['status_sopir'] == "dengan_sopir") :
													    if ($pesanan['sopir_by'] == null) : ?>
															<a href="#" data-toggle="modal" data-target="#modalTambahSopir-<?= $key ?>" class="btn btn-sm btn-dark mb-2"><i class="fa fa-id-card mr-2"></i> Pilih Sopir</a><br>
												<?php endif;
													endif;
												endif; ?>
												<a href="<?= base_url('pesanan/detail_pesanan/' . $pesanan['id_pesanan']) ?>" class="btn btn-sm btn-warning mb-2"><i class="fa fa-eye"></i> Detail</a><br>
												<a href="<?= base_url('pesanan/hapus/' . $pesanan['id_pesanan']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<table>
								<tr>
									<td class="align-top px-3">
										<p class="text-danger">*</p>
									</td>
									<td>
										<p class="text-danger"> Baris Yang Memiliki background <i class="fas fa-circle  ml-2 mr-2" style="font-size: 15px; color: gray;"></i> merupakan data penyewaan yang mengalami keterlambatan pengembalian</p>
									</td>
								</tr>
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
<!-- modal pilih sopir -->
<?php foreach ($data_pesanan as $key => $pesanan) : ?>
	<div class="modal fade " id="modalTambahSopir-<?= $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> Penambahan Sopir </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('pesanan/tambah_sopir/' . $pesanan['id_pesanan']) ?>" method="POST">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="harga">ID Pesanan</label>
									<input type="text" value="<?= $pesanan['no_pesanan'] ?>" class="form-control" disabled>
								</div>
								<div class="form-group">
									<label for="harga">Jenis Mobil</label>
									<input type="text" value="<?= $pesanan['nama_mobil'] ?>" class="form-control" disabled>
								</div>
								<div class="form-group">
									<label for="harga">Tujuan</label>
									<input type="text" value="<?= $pesanan['tujuan'] ?>" class="form-control" disabled>
								</div>
								<div class="form-group">
									<label for="harga">Perihal</label>
									<input type="text" value="<?= $pesanan['perihal'] ?>" class="form-control" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tgl_pinjam">Tanggal Pinjam</label>
									<input type="datetime-local" name="tgl_pinjam" id="tgl_pinjam" disabled value="<?= $pesanan['tgl_pinjam'] ?>" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tgl_kembali">Tanggal Kembali</label>
									<input type="datetime-local" name="tgl_kembali" id="tgl_kembali" disabled value="<?= $pesanan['tgl_kembali'] ?>" class="form-control">
								</div>
							</div>
							<div class="col-md-12 " id="list_sopir">
								<label for="id_mobil">Sopir</label>
								<select name="sopir_by" id="sopir_by" class="form-control">
									<option value="">Pilih sopir</option>
									<?php foreach ($data_sopir as $sopir) : ?>
										<option value="<?= $sopir['id_sopir'] ?>"> <?= $sopir['id_sopir'] ?> - <?= $sopir['nama_sopir'] ?> </option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- end modal pilih sopir -->
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>

<script>
	$(document).ready(function() {

		$.ajax({
			url: '<?= base_url('pesanan/getNoPesanan') ?>',
			cache: false,
			success: function(res) {
				let data_json = JSON.parse(res)
				console.log(data_json)
				$('#no_pesanan').val(data_json);
			}
		});
	});
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
				// console.log(data_json)
				$('#harga').val(data_json.data.harga)
			}
		});
	})

	$('#tgl_kembali').change(() => {
		let tanggal_pinjam = new Date($('#tgl_pinjam').val())
		let tanggal_kembali = new Date($('#tgl_kembali').val())

		let seleish_hari = Math.round((tanggal_kembali.getTime() - tanggal_pinjam.getTime()) / (1000 * 3600))
		if (seleish_hari < 6) {
			seleish_hari = 6
		}
		// console.log(seleish_hari)
		if (seleish_hari >= 0) {
			$('#error_lama_sewa').addClass('d-none');
			$('#lama_sewa').val(seleish_hari)
		} else if (isNaN(seleish_hari) || seleish_hari < 0) {
			$('#error_lama_sewa').removeClass('d-none');
			$('#error_lama_sewa').html('Tidak dapat  menghitung lama sewa');
		}
		// console.log(Math.ceil(seleish_hari / 6))
		let total_bayar = $('#harga').val() * (Math.ceil(seleish_hari / 6))
		$('#total_bayar').val(total_bayar)
	})

	$("#jasa_sopir").change(() => {
		let total_bayar = $('#total_bayar').val()
		let jasa_sopir = $("#jasa_sopir").val()
		console.log(jasa_sopir)
		if (jasa_sopir == 'dengan_sopir') {
			let harga_jasa_sopir = Math.ceil($('#lama_sewa').val() / 12)
			$('#total_bayar').val(parseInt(total_bayar) + (harga_jasa_sopir * 100000))
			<?php if ($_SESSION['user']['role'] == 'admin') : ?>
				$('#list_sopir').removeClass('d-none')
			<?php endif; ?>

		} else {
			let harga_jasa_sopir = Math.ceil($('#lama_sewa').val() / 12)
			$('#total_bayar').val(parseInt(total_bayar) - (harga_jasa_sopir * 100000))
			<?php if ($_SESSION['user']['role'] == 'admin') : ?>
				$('#list_sopir').addClass('d-none')
			<?php endif; ?>
		}
	});
</script>
</body>

</html>