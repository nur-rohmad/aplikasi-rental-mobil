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
                            <form method="POST" action="<?= base_url('sopir/tambah') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Nama sopir</label>
                                    <input type="text" name="nama_sopir" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="L">Laki laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">No. HP sopir</label>
                                    <input type="number" placeholder="ketik" name="no_hp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat sopir</label>
                                    <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="ketik"></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="foto">Foto Sopir</label>
                                    <input type="file" name="foto_sopir" id="foto" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
                                    ukuran foto wajib 200px X 200px
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto KTP Sopir</label>
                                    <input type="file" name="foto_ktp" id="foto" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
                                    ukuran foto wajib 200px X 200px
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
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Sopir</h6>
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
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Foto KTP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_sopir as $sopir) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $sopir['nama_sopir'] ?></td>
                                            <td class="text-center"><img src="<?= base_url('uploads/sopir/' . $sopir['foto_sopir']) ?>" alt="<?= $sopir['nama_sopir']  ?>" width="80px"></td>
                                            <td class="text-center"><img src="<?= base_url('uploads/sopir/foto_ktp/' . $sopir['foto_ktp']) ?>" alt="<?= $sopir['nama_sopir']  ?>" width="80px"></td>
                                            <td class="text-center"><?= $sopir['jenis_kelamin'] == "L" ? 'Laki - Laki' : 'Perempuan' ?></td>
                                            <td><?= $sopir['no_hp'] ?></td>
                                            <td><?= $sopir['alamat_sopir'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('sopir/ubah/' . $sopir['id_sopir']) ?>" class="btn btn-sm btn-warning mb-2"> <i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= base_url('sopir/hapus/' . $sopir['id_sopir']) ?>" class="btn  btn-sm btn-danger mb-2" onclick="return confirm('apakah anda yakin?')"> <i class="fas fa-trash"></i> Hapus</a>
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

<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>