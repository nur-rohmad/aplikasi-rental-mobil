<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "bianca rentcar" ?></title>
    <link rel="icon" href="<?= base_url('assets/sb-admin-2') ?>/img/logo_biancarentcar.png">
    <link href="<?= base_url('assets/sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="<?= base_url('assets/sb-admin-2') ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/sb-admin-2') ?>/vendor/fullcalendar/main.min.css" rel="stylesheet">
</head>

<body>
    <!-- mabnar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="#"><i><?= strtoupper("bianca rentcar") ?></i></a>/
            <a href="<?= base_url('auth/login') ?>?" class="btn btn-outline-light float-right">Login</a>
        </div>
    </nav>
    <!-- end mabnar -->
    <!-- jumbotron -->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img class="float-right /" src="<?= base_url('assets/sb-admin-2') ?>/img/logo_biancarentcar.png" alt="logo" width="120%">
                </div>
                <div class="col-md-10 ml-lg-n5">
                    <h1 class="">BIANCA RENTCAR</h1>
                    <p class="font-italic" style="font-size: 20px; font-weight: 900;">Cepat, Aman, Nyaman</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->
    <!-- about -->
    <div class="row " style="margin-top: 4rem;">
        <div class="col-md-12 text-center">
            <h4 style="font-weight: bold;">Apa itu BIANCA RENTCAR ?</h4>
        </div>
        <div class="container-fluid">
            <div class="row ml-lg-4">
                <div class="col-md-6">
                    <p class="mt-lg-4" style="font-size: 25px; line-height: 50px; text-align: justify; text-indent: 40px;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ipsa reprehenderit placeat minima aliquam commodi adipisci provident, voluptate ad ullam quisquam quasi reiciendis. Ad cum eveniet adipisci vel illo iure nulla aspernatur amet quos facilis nihil velit nam, porro animi vitae explicabo. Architecto eius deserunt enim!
                    </p>
                </div>
                <div class="col-md-6 "> <img class="float-right /" src="<?= base_url('assets/sb-admin-2') ?>/img/logo_biancarentcar.png" alt="logo" width="100%"> </div>
            </div>
        </div>
    </div>
    <!-- end about -->
    <!-- produk -->
    <div class="row mt-4 pt-2 " style="background-color: #EAECF4;">
        <div class="col-md-12 text-center">
            <h4 style="font-weight: bold; margin-top: 1em;">Daftar Mobil</h4>
        </div>
        <div class="row container-fluid d-flex justify-content-center  mt-4">
            <?php foreach ($data_mobil as $key => $result) : ?>
                <div class="mx-4 mb-sm-4">
                    <a class="text-reset text-decoration-none" href="#" data-toggle="modal" data-target="#exampleModal-<?= $key ?>">
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
    <!-- end produk -->

    <!-- footter -->
    <footer class="bg-primary text-center text-white py-3">
        <div class="row">
            <div class="col-4 text-left ml-4">
                <table class="mt-5">
                    <tr>
                        <td> <i class="fab fa-whatsapp fa-3x"></i></td>
                        <td>
                            <h3 class="pt-2 pl-3">0838 9601 1251</h3>
                        </td>
                    </tr>
                    <tr>
                        <td> <i class="fas fa-map-marked-alt fa-3x"></i></td>
                        <td>
                            <h3 class="pt-2 pl-3">Tanon Utara, Tanon, Kec. Papar, Kabupaten Kediri, Jawa Timur 64153</h3>
                        </td>
                    </tr>
                    <tr>
                        <td> <i class="fas fa-envelope fa-3x"></i></td>
                        <td>
                            <h3 class="pt-2 pl-3">retcarmobil@gmail.com</h3>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-7 m-md-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.0971563995577!2d112.08522131477731!3d-7.67270369446857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1123048c76b29946!2zN8KwNDAnMjEuNyJTIDExMsKwMDUnMTQuNyJF!5e0!3m2!1sid!2sid!4v1659440613981!5m2!1sid!2sid" width="100%" height="300" style="border:0; justify-content: center;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <a href="" target="_blank">Fernando Toni</a> &copy; Aplikasi Rental Mobil <?= date('Y') ?></span>
    </footer>
    <!-- end footter -->

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
    <!-- end modal -->
    <!-- java script -->
    <script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/sb-admin-2') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/sb-admin-2') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/sb-admin-2') ?>/js/sb-admin-2.min.js"></script>
    <!-- end java script -->
</body>

</html>