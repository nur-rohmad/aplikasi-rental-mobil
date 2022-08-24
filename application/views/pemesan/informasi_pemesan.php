<?php include './application/views/partials/navbar.php' ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php include './application/views/partials/topbar.php' ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <strong>Informasi Pemesan</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?= base_url('uploads/pemesan') . '/' . $pemesan['foto'] ?>" class="img-thumbnail w-100">
                                </div>
                                <div class="col-md-8">
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
                                    <form action="<?= base_url('pemesan/update') ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_pemesan" value="<?= $pemesan['id'] ?>">
                                        <div class="form-group">
                                            <label for="nama_pemesan">Nama</label>
                                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required value="<?= $pemesan['nama_pemesan'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L" <?= $pemesan['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki - Laki </option>
                                                <option value="P" <?= $pemesan['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"><?= $pemesan['alamat'] ?></textarea>
                                        </div>
                                        <label for="">Foto Pemesan</label>
                                        <div class="row">
                                            <?php if ($pemesan['foto'] != null) : ?>
                                                <div class="col-6">
                                                    <a href="#"><?= $pemesan['foto'] ?></a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="file" name="foto" id="foto" placeholder="ketik" autocomplete="off" class="form-control-file">
                                                </div>
                                            </div>
                                        </div>
                                        <label for="">Foto KTP</label>
                                        <div class="row">
                                            <?php if ($pemesan['foto_ktp'] != null) : ?>
                                                <div class="col-6">
                                                    <a href="#" data-toggle="modal" data-target="#foto_ktp2"><?= $pemesan['foto_ktp'] ?></a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="file" name="foto_ktp" id="foto_ktp" placeholder="ketik" autocomplete="off" class="form-control-file">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success float-right mt-2">Update</button>

                                    </form>
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
<?php if ($pemesan['foto_ktp'] != null) : ?>
    <div class="modal fade" id="foto_ktp2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<?php endif; ?>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>

</body>

</html>