<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/nurul iman.png" type="image/ico" />

    <title>Pusdatin Nurul Iman | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <?php
    include '../koneksi.php';
    session_start();
    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['rules'] == "") {
        header("location:../index.php?pesan=unlogin");
    }
    ?>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="../assets/images/profile.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Assalamu'alaikum,</span>
                            <h2><?php echo $_SESSION['email']; ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <a href="index.php">
                                <h3>Beranda</h3>
                            </a>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Data <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="pengurus.php">Data Pengurus</a></li>
                                        <li><a href="keluarga.php">Data Keluarga Jamaah</a></li>
                                        <li><a href="santunan.php">Data Penerima Santunan</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="lapsantunan.php">Laporan Santunan</a></li>
                                        <li><a href="../logout.php">logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="">
                        <h2>Pusat Data Dan Informasi - Masjid Nurul Iman JatiPadang</h2>
                    </div>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col mt-3 " role="main">
                <!-- top tiles -->
                <div style="width:100%; height: 50px;"></div>
                <!-- end of user-activity-graph -->

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Penerima Bulan Ini</a>
                        </li>
                        <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Laporan Bulan</a>
                        </li>
                        <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Setting</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <div class="table-responsive">
                                <div class="mb-2">
                                    <a href="santunanreport.php"><button class="btn btn-primary"><i class="fa fa-print"> Cetak Data </i></button></a>
                                </div>
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th>
                                                <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">NIK </th>
                                            <th class="column-title">Nama </th>
                                            <th class="column-title">Jenis Kelamin </th>
                                            <th class="column-title">Tanggal Lahir </th>
                                            <th class="column-title">Rt / Rw </th>
                                            <th class="column-title no-link last"><span class="nobr">Status</span>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                            <th class="column-title">Cetak Surat </th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $batas = 50;
                                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                    $previous = $halaman - 1;
                                    $next = $halaman + 1;

                                    $data = mysqli_query($koneksi, "select * from penerima_santunan where aktif='Aktif'");
                                    $jumlah_data = mysqli_num_rows($data);
                                    $total_halaman = ceil($jumlah_data / $batas);

                                    $data_pegawai = mysqli_query($koneksi, "select * from penerima_santunan where aktif='Aktif' order by nama asc limit $halaman_awal, $batas");
                                    $nomor = $halaman_awal + 1;
                                    while ($d = mysqli_fetch_array($data_pegawai)) {
                                    ?>
                                        <tbody>
                                            <tr class="odd pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td>
                                                <td class=" "><?php echo $d['nik']; ?></td>
                                                <td class=" "><?php echo $d['nama']; ?></td>
                                                <td class=" "><?php echo $d['jenkel']; ?></td>
                                                <td class=" "><?php echo $d['tgl_lahir']; ?></td>
                                                <td class=" "><?php echo $d['rtrw']; ?></td>
                                                <td class="a-right a-right "><?php echo $d['status']; ?></td>
                                                <td><a href="suratsantunan.php?nik=<?php echo $d['nik']; ?>"><i class="fa fa-print"> Cetak Surat</i></a></td>
                                            </tr>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='?halaman=$previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='?halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- end recent activity -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                                <thead>
                                    <tr>
                                        <th>Bulan / Tahun</th>
                                        <th>Jumlah Tersalurkan</th>
                                        <th class="hidden-phone">Data Keseluruhan</th>
                                        <th>Persentase Kontribusi</th>
                                        <th>Cetak Laporan</th>
                                    </tr>
                                </thead>
                                <?php
                                $data = mysqli_query($koneksi, "select * from bulan");
                                while ($d = mysqli_fetch_array($data)) {
                                    $jumlah = $d['total'];
                                    $bulans = $d['bulan'];
                                ?>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($koneksi, "select * from santunan_bulanan where bulan='$bulans'");
                                        $jumlahdata    = mysqli_num_rows($sql);
                                        ?>
                                        <tr>
                                            <td><?php echo $d['bulan']; ?></td>
                                            <td><?php echo $jumlahdata; ?></td>
                                            <td><?php echo $d['total']; ?></td>
                                            <td class="vertical-align-mid">
                                                <?php
                                                $persendata = $jumlahdata / $jumlah * 100;
                                                $datas = number_format($persendata, 2);
                                                ?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-info" data-transitiongoal=" <?php echo $datas; ?>">
                                                        <?php echo $datas; ?> %
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="cetakbulanan.php?bulan=<?php echo $d['bulan']; ?>"><i class="fa fa-print"> Cetak Laporan</i></a></td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                            <!-- end user projects -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>nanti lagi kita setting seiring ide untuk pembaruan fitur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="../vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="../vendors/Flot/jquery.flot.js"></script>
        <script src="../vendors/Flot/jquery.flot.pie.js"></script>
        <script src="../vendors/Flot/jquery.flot.time.js"></script>
        <script src="../vendors/Flot/jquery.flot.stack.js"></script>
        <script src="../vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="../vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../vendors/moment/min/moment.min.js"></script>
        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>

</body>
ss

</html>