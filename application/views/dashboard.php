<?php include 'partials/navbar.php'; ?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php include 'partials/topbar.php'; ?>
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
            <hr>
            <div class="row">
                <div class="col-xl-<?= $_SESSION['user']['role'] == 'pengguna' ? '6' : '3' ?> col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Mobil</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $mobil ?> Mobil</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-car fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-<?= $_SESSION['user']['role'] == 'pengguna' ? '6' : '3' ?> col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Pesanan</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pesanan ?> Pesanan</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-receipt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($_SESSION['user']['role'] == 'admin') :  ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Pemesan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pemesan ?> Pemesan</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Akun</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $akun['jumlah_akun'] ?> Akun</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- celender -->
            <div class="row">
                <div class="card col-md-6  mb-4">
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
                <?php if ($_SESSION['user']['role'] == 'admin') : ?>
                    <!-- Produk terlaris -->
                    <div class="col-md-6">
                        <div class="card   mb-4">
                            <div class="card-header">
                                <h5>Mobil paling dicari</h5>
                            </div>
                            <div class="card-body">
                                <div id="myChart2"></div>
                                <?php
                                $label_bar = "";
                    $jumlah_bar = "";
                    foreach ($mobil_favorit as $data) {
                        $nama_mobil = $data['nama_mobil'];

                        $label_bar .= "'$nama_mobil'" . ", ";
                        //mengambil data jumlah
                        $total = $data['jumlah'];
                        $jumlah_bar .= "'$total'" . ", ";
                    };

                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- end Produk terlaris -->
                <?php endif; ?>



                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header">
                            <strong>Akun yang sedang login</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3">
                                    <img src="<?= base_url('uploads') . '/' . $_SESSION['user']['photo'] ?>" alt="<?= $_SESSION['user']['nama'] ?>" class="img-thumbnail mb-4">
                                </div>
                                <div class="col-md-9">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><b><?= $_SESSION['user']['nama'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><b><?= $_SESSION['user']['username'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Hak Akses User</td>
                                            <td>:</td>
                                            <td><b><?= $_SESSION['user']['role'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal & Jam Login</td>
                                            <td>:</td>
                                            <td><b><?= $_SESSION['user']['waktu'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Server</td>
                                            <td>:</td>
                                            <td><b><?= $_SERVER['SERVER_NAME'] ?></b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'partials/footer.php' ?>
</div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script src="<?= base_url('assets/sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/sb-admin-2/') ?>/vendor/fullcalendar/main.min.js"></script>
<script>
    var d = new Date();
    var calendarLeftEl = document.getElementById('calendar-left');
    var calendarRightEl = document.getElementById('calendar-right');
    // var recentDate = formatDate(d.setMonth(d.getMonth()));
    $.ajax({
        url: '<?= base_url('dashboard/get_tanggal_pesanan') ?>',
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
<script src="<?= base_url('assets/sb-admin-2/') ?>/vendor/apexchart/apexcharts.min.js"></script>
<script>
    var options = {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'Jumlah Penyewa',
            data: [<?= $jumlah_bar ?>]
        }],
        colors: ['#00FF5F'],
        xaxis: {
            categories: [<?= $label_bar ?>],
            title: {
                text: 'Nama Mobil',
            },
        },
        yaxis: [{
            title: {
                text: 'Jumlah Penjualan',
            },
        }]
    }

    var chart = new ApexCharts(document.querySelector("#myChart2"), options);

    chart.render();
</script>
</body>

</html>