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
                <?php foreach ($data_mobil as $key => $result) : ?>
                    <div class="col-md-3">
                        <a class="text-reset text-decoration-none" href="<?= base_url('mobil/detail/' . $result['id']) ?>">
                            <div class=" card shadow" style="width: 18rem; ">
                                <img src="<?= base_url('uploads/mobil/' . $result['gambar']) ?>" class="card-img-top" style="height: 16rem;" alt="mobil">
                                <div class="card-body">
                                    <h4 class="card-title font-weight-bold">Rp. <?= number_format($result['harga']) ?> / 6 Jam</h4>
                                    <p class="card-text"><?= $result['tahun_beli'] ?></p>
                                    <h5 class="card-text font-weight-bold"><?= $result['nama_mobil'] ?> Jes</h5>
                                </div>
                            </div>
                    </div></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include './application/views/partials/footer.php' ?>
</div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Modal -->
<?php foreach ($data_mobil as $key => $resault) : ?>
    <div class="modal fade " id="exampleModal-<?= $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= base_url('uploads/mobil/' . $resault['gambar']) ?>" style="height: 16rem; width: 100%;" alt="<?= $resault['nama_mobil'] ?>" class="img-thumbnail mb-4">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><b><?= $resault['nama_mobil'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Merk</td>
                                    <td>:</td>
                                    <td><b><?= $resault['merk'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Warna</td>
                                    <td>:</td>
                                    <td><b><?= $resault['warna'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Nomer Polisi</td>
                                    <td>:</td>
                                    <td><b><?= $resault['no_polisi'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Kursi</td>
                                    <td>:</td>
                                    <td><b><?= $resault['jumlah_kursi'] ?> Kursi</b></td>
                                </tr>
                                <tr>
                                    <td>Tahun Beli</td>
                                    <td>:</td>
                                    <td><b>Tahun <?= $resault['tahun_beli'] ?></b></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- end calender -->
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>/vendor/fullcalendar/main.min.js"></script>
<script>

</script>
</body>

</html>