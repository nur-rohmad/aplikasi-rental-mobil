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
				<div class="col-sm-7">
					<div class="card shadow">
						<div class="card-header">
							<h6 class="m-0 font-weight-bold text-primary">Detail Mobil - <?= $data_mobil['nama_mobil'] ?></h6>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<img src="<?= base_url('uploads/mobil/' . $data_mobil['gambar']) ?>" alt="<?= $data_mobil['nama_mobil'] ?>" class="img-thumbnail mb-4">
								</div>
								<div class="col-md-6">
									<table class="table table-borderless">
										<tr>
											<td>Nama</td>
											<td>:</td>
											<td><b><?= $data_mobil['nama_mobil'] ?></b></td>
										</tr>
										<tr>
											<td>Merk</td>
											<td>:</td>
											<td><b><?= $data_mobil['merk'] ?></b></td>
										</tr>
										<tr>
											<td>Warna</td>
											<td>:</td>
											<td><b><?= $data_mobil['warna'] ?></b></td>
										</tr>
										<tr>
											<td>Nomer Polisi</td>
											<td>:</td>
											<td><b><?= $data_mobil['no_polisi'] ?></b></td>
										</tr>
										<tr>
											<td>Jumlah Kursi</td>
											<td>:</td>
											<td><b><?= $data_mobil['jumlah_kursi'] ?> Kursi</b></td>
										</tr>
										<tr>
											<td>Tahun Beli</td>
											<td>:</td>
											<td><b>Tahun <?= $data_mobil['tahun_beli'] ?></b></td>
										</tr>
										<tr>
											<td>Harga Sewa</td>
											<td>:</td>
											<td><b>Rp. <?= number_format($data_mobil['harga']) ?> / 6 Jam</b></td>
										</tr>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<?php if ($_SESSION['user']['role'] == 'admin') : ?>
										<a href="<?= base_url('mobil/ubah/' . $data_mobil['id']) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
										<a href="<?= base_url('mobil/hapus/' . $data_mobil['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
									<?php endif; ?>
									<a href="<?= base_url('mobil') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- celender -->
				<div class="card col-md-5  mb-4">
					<div class="card-header">
						<h5>Tangal Yang Telah dipesan</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
								<button id='prev' class="btn btn-primary"><i class="fa fa-chevron-left"></i></button>
								<button id='next' class="btn btn-primary"><i class="fa fa-chevron-right"></i></button>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id='calendar-left'></div>
							</div>
						</div>
					</div>
				</div>
				<!-- end celender -->
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
<script src="<?= base_url('assets/sb-admin-2/') ?>/vendor/fullcalendar/main.min.js"></script>
<script>
	var d = new Date();
	var calendarLeftEl = document.getElementById('calendar-left');
	var calendarRightEl = document.getElementById('calendar-right');
	// var recentDate = formatDate(d.setMonth(d.getMonth()));
	$.ajax({
		url: '<?= base_url('mobil/get_tanggal_pesanan_by_id_mobil') ?>',
		type: "POST",
		data: {
			id_mobil: '<?= $data_mobil['id'] ?>',
		},
		dataType: "json",
		success: res => {
			//  var data = JSON.parse(res)
			console.log(res);
			var proker = res
			var calendarLeft = new FullCalendar.Calendar(calendarLeftEl, {
				initialDate: d,
				selectable: false,
				height: 550,
				headerToolbar: {
					left: false,
					center: 'title',
					right: false
				},
				// eventDidMount: function(info) {
				//     $('#title-left').html(info.view.title);
				// },
				events: proker,

			});
			calendarLeft.render();

			document.getElementById('prev').addEventListener('click', function() {
				calendarLeft.prev();
				// calendarRight.prev();
			});

			document.getElementById('next').addEventListener('click', function() {
				calendarLeft.next();
				// calendarRight.next();
			});
		},
		error: err => {
			console.log(err)
		}
	})
</script>
</body>

</html>