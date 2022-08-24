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
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
                        </div>
                        <div class="card-body">
                            <form class="form" action="<?= base_url('laporan/search_process') ?>" method="post">
                                <div class="form-body mb-4">
                                    <div class="row">

                                        <div class="col-md-2 col-12">
                                            <div class="form-group my-1">
                                                <input type="date" name="tanggal_awal_transaksi" class="form-control" value="<?php
                                                                                                                                if (empty($search['tanggal_awal'])) {
                                                                                                                                    echo "";
                                                                                                                                } else {
                                                                                                                                    echo $search['tanggal_awal'];
                                                                                                                                }
                                                                                                                                ?>" placeholder="tanggal_awal">
                                            </div>
                                        </div>
                                        <div class="col-md-0,5 pt-2 d-sm-none d-lg-block">-</div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group my-1">
                                                <input type="date" name="tanggal_akhir_transaksi" class="form-control" value="<?php
                                                                                                                                if (empty($search['tanggal_akhir'])) {
                                                                                                                                    echo "";
                                                                                                                                } else {
                                                                                                                                    echo $search['tanggal_akhir'];
                                                                                                                                }
                                                                                                                                ?>" placeholder="tanggal">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group my-1">
                                                <button class="btn btn-primary" type="submit" name="save" value="Cari">Cari</button>
                                                <button class="btn btn-outline-secondary" type="submit" name="save" value="Reset">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered" id="myTable" width="" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">No</th>
                                        <th class="align-middle text-center">No Pesanan</th>
                                        <th class="align-middle text-center">Nama Pemesan</th>
                                        <th class="align-middle text-center">Merk Mobil</th>
                                        <th class="align-middle text-center">Jenis Kendaraan</th>
                                        <th class="align-middle text-center">Tujuan</th>
                                        <th class="align-middle text-center">Perihal</th>
                                        <th class="align-middle text-center">Tanggal Pinjam</th>
                                        <th class="align-middle text-center">Tanggal Kembali</th>
                                        <th class="align-middle text-center">Lama Sewa (Jam)</th>
                                        <th class="align-middle text-center">Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_pesanan as $pesanan) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $pesanan['no_pesanan'] ?></td>
                                            <td><?= $pesanan['nama_pemesan'] ?></td>
                                            <td><?= $pesanan['merk'] ?></td>
                                            <td><?= $pesanan['nama_mobil']  ?></td>
                                            <td><?= $pesanan['tujuan']  ?></td>
                                            <td><?= $pesanan['perihal']  ?></td>
                                            <td><?= $pesanan['tgl_pinjam']  ?></td>
                                            <td><?= $pesanan['tgl_kembali']  ?></td>
                                            <td><?= $pesanan['lama_sewa']  ?></td>
                                            <td>Rp. <?= number_format($pesanan['total_bayar']) ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9"></td>
                                        <td class="text-center">TOTAL</td>
                                        <td>Rp. <?= number_format($total_pendapatan['total']) ?></td>
                                    </tr>
                                </tfoot>
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
<script src="<?= base_url('assets/sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/pdfmake/vfs_fonts.js"></script>
<script>
    $(document).ready(function() {
        var table = $("#myTable").DataTable({
            "searching": false,
            dom: 'Bfrtip',
            gthChange: true,
            buttons: [{
                extend: "pdf",
                footer: true,
                text: '<i class="fas fa-file-pdf mr-1"></i> Donwload PDF',
                className: "btn btn-danger mr-2 mb-2",
                filename: 'data_transaksi',
                title: 'Data  Transaksi Bianca Rentcar ',
                exportOptions: {
                    columns: ':visible:not(:contains(Action),:contains(No))'
                }
            }],

        });
    });
</script>


</body>

</html>