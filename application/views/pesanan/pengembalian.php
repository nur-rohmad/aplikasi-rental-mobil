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
                                    Tujuan <br>
                                    Perihal <br>
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
                                    : <br>
                                    : <br>

                                </div>
                                <div class="col-sm-6">
                                    <strong><?= $pesanan['no_pesanan'] ?></strong><br>
                                    <strong><?= $pesanan['nama_pemesan'] ?></strong><br>
                                    <strong><a href="#" data-toggle="modal" data-target="#foto_ktp3"> Lihat Foto </a></strong><br>
                                    <strong><?= $pesanan['alamat'] ?></strong><br>
                                    <strong><?= $pesanan['merk']  ?></strong><br>
                                    <strong><?= $pesanan['nama_mobil']  ?></strong><br>
                                    <strong>Rp. <?= number_format($pesanan['harga_sewa'])  ?> / 6 Jam</strong><br>
                                    <strong><?= $pesanan['tujuan'] ?></strong><br>
                                    <strong><?= $pesanan['perihal'] ?></strong><br>
                                    <strong><?= $pesanan['tgl_pinjam'] ?></strong><br>
                                    <strong><?= $pesanan['tgl_kembali'] ?></strong><br>
                                    <strong><?= $pesanan['lama_sewa']  ?> Jam</strong><br>
                                    <strong>Rp. <?= number_format($pesanan['total_harga']) ?></strong><br>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">

                                    <a href="<?= base_url('pesanan') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Form Pengembalian Mobil</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('pesanan/proses_pengembalian') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id_pesanan" value="<?= $pesanan['id_pesanan'] ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="harga">No Pesanan</label>
                                            <input type="no_pesanan" name="no_pesanan" id="no_pesanan" required="required" value="<?= $pesanan['no_pesanan'] ?>" readonly autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_kembali">Nama Pemesan</label>
                                            <input type="text" name="nama_pemesan" id="nama_pemesan" required="required" readonly value="<?= $pesanan['nama_pemesan'] ?>" autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_kembali">Nama Mobil</label>
                                            <input type="text" name="nama_mobil" id="nama_mobil" required="required" readonly value="<?= $pesanan['nama_mobil'] ?>" autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_kembali">Biaya Denda Perjam</label>
                                            <input type="number" readonly value="<?= $pesanan['denda'] ?>" name="denda" id="denda" required="required" autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_kembali">Total Harga</label>
                                            <input type="number" readonly value="<?= $pesanan['total_harga'] ?>" name="total_harga" id="total_harga" required="required" autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tgl_kembali">Tanggal Kembali</label>
                                            <input type="datetime-local" name="tgl_kembali" id="tgl_kembali" required="required" readonly value="<?= $pesanan['tgl_kembali'] ?>" autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tgl_kembali">Tanggal Pengembalian</label>
                                            <input type="datetime-local" name="tgl_pengembalian" id="tgl_pengembalian" required="required" autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_kembali">Lama Keterlambatan (Jam)</label>
                                            <input type="number" readonly name="lama_keterlambatan" id="lama_keterlambatan" required="required" autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_kembali">Total Biaya Denda</label>
                                            <input type="number" name="jumlah_denda" id="biaya_denda" required="required" readonly autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="total_bayar">Total Bayar (Total Harga + denda)</label>
                                            <input type="number" name="total_bayar" id="total_bayar" placeholder="ketik" required="required" readonly autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group float-right">
                                    <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-check"></i> Simpan</button>
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
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
<script>
    $('#tgl_pengembalian').change(() => {
        let tanggal_kembali = new Date($('#tgl_kembali').val())
        let tanggal_pengembalian = new Date($('#tgl_pengembalian').val())

        let seleish_hari = Math.round((tanggal_pengembalian.getTime() - tanggal_kembali.getTime()) / (1000 * 3600))


        // console.log(seleish_hari)
        if (seleish_hari >= 0) {
            $('#error_lama_sewa').addClass('d-none');
            $('#lama_keterlambatan').val(seleish_hari)
        } else if (isNaN(seleish_hari) || seleish_hari < 0) {
            $('#error_lama_sewa').removeClass('d-none');
            $('#error_lama_sewa').html('Tidak dapat  menghitung lama sewa');
        }
        // console.log(Math.ceil(seleish_hari / 6))
        let total_bayar = $('#denda').val() * (Math.ceil(seleish_hari))
        $('#biaya_denda').val(total_bayar)
        $('#total_bayar').val(parseInt($('#total_harga').val()) + total_bayar)
    })
</script>
</body>

</html>