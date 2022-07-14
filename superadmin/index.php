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
            <?php

            $sql = mysqli_query($koneksi, "select * from penerima_santunan");
            $jumlahdata    = mysqli_num_rows($sql);
            $sql2 = mysqli_query($koneksi, "select * from penerima_santunan where aktif='Aktif'");
            $aktif    = mysqli_num_rows($sql2);
            $sql3 = mysqli_query($koneksi, "select * from penerima_santunan where  status='Yatim'");
            $yatim    = mysqli_num_rows($sql3);
            $sql4 = mysqli_query($koneksi, "select * from penerima_santunan where  status='Dhuafa'");
            $dhuafa  = mysqli_num_rows($sql4);
            $sql5 = mysqli_query($koneksi, "select * from penerima_santunan where  status='Janda'");
            $Janda  = mysqli_num_rows($sql5);
            $sql6 = mysqli_query($koneksi, "select * from penerima_santunan where  status='Lansia Tidak Mampu'");
            $lansia  = mysqli_num_rows($sql6);
            ?>
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
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row" style="display: inline-block;">
                    <div class="tile_count">
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Penerima Santunan</span>
                            <div class="count"><?php echo $jumlahdata; ?></div>
                            <span class="count_bottom"><i class="green">-----</i></span>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Aktif Bulan Ini </span>
                            <div class="count"><?php echo $aktif; ?></div>
                            <span class="count_bottom"><i class="green">-----</i></span>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Jumlah Yatim</span>
                            <div class="count green"><?php echo $yatim; ?></div>
                            <span class="count_bottom"><i class="green">-----</i></span>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Jumlah Janda</span>
                            <div class="count"><?php echo $Janda; ?></div>
                            <span class="count_bottom"><i class="green">-----</i></span>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Jumlah Dhuafa</span>
                            <div class="count"><?php echo $dhuafa; ?></div>
                            <span class="count_bottom"><i class="green">-----</i></span>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Lansia Tidak Mampu </span>
                            <div class="count"><?php echo $lansia; ?></div>
                            <span class="count_bottom"><i class="green">-----</i></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 ">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                                <h2>Jenis Kelamin</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                $sql7 = mysqli_query($koneksi, "select * from penerima_santunan where  jenkel='Laki-laki'");
                                $jumlahlaki  = mysqli_num_rows($sql7);
                                $sql8 = mysqli_query($koneksi, "select * from penerima_santunan where  jenkel='Perempuan'");
                                $jumlahcewe  = mysqli_num_rows($sql8);
                                ?>
                                <table class="" style="width:100%">
                                    <tr>
                                        <td>
                                            <table class="tile_info">
                                                <tr>
                                                    <td>Persentase</td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $persencowok = $jumlahlaki / $jumlahdata * 100;
                                                    $persencowoks = number_format($persencowok, 2);
                                                    ?>
                                                    <td>
                                                        <p><i class="fa fa-square blue"></i>Laki-Laki </p>
                                                    </td>
                                                    <td><?php echo $persencowoks; ?></td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $persencewek = $jumlahcewe / $jumlahdata * 100;
                                                    $persenceweks = number_format($persencewek, 2);
                                                    ?>
                                                    <td>
                                                        <p><i class="fa fa-square red"></i>Perempuan </p>
                                                    </td>
                                                    <td><?php echo $persenceweks; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="widget_summary">
                                                <div class="w_left w_25">
                                                    <span>Laki-Laki</span>
                                                </div>
                                                <div class="w_center w_55">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jumlahlaki ?>%;"></div>
                                                    </div>
                                                </div>
                                                <div class="w_right w_20">
                                                    <span><?php echo $jumlahlaki ?></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="widget_summary">
                                                <div class="w_left w_25">
                                                    <span>Perempuan</span>
                                                </div>
                                                <div class="w_center w_55">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jumlahcewe ?>%;"></div>
                                                    </div>
                                                </div>
                                                <div class="w_right w_20">
                                                    <span><?php echo $jumlahcewe ?></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                                <h2>Persentase Status </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="" style="width:100%">
                                    <tr>
                                        <td>
                                            <table class="tile_info">
                                                <tr>
                                                    <td>Persentase</td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $persenyatim = $yatim / $jumlahdata * 100;
                                                    $persenyatims = number_format($persenyatim, 2);
                                                    ?>
                                                    <td>
                                                        <p><i class="fa fa-square blue"></i>Yatim </p>
                                                    </td>
                                                    <td><?php echo $persenyatims; ?>%</td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $persenjanda = $Janda / $jumlahdata * 100;
                                                    $persenjandas = number_format($persenjanda, 2);
                                                    ?>
                                                    <td>
                                                        <p><i class="fa fa-square red"></i>Janda </p>
                                                    </td>
                                                    <td><?php echo $persenjandas; ?>%</td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $persendhuafa = $dhuafa / $jumlahdata * 100;
                                                    $persendhuafas = number_format($persendhuafa, 2);
                                                    ?>
                                                    <td>
                                                        <p><i class="fa fa-square grey"></i>Dhuafa </p>
                                                    </td>
                                                    <td><?php echo $persendhuafas; ?>%</td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $persenlansia = $lansia / $jumlahdata * 100;
                                                    $persenlansias = number_format($persenlansia, 2);
                                                    ?>
                                                    <td>
                                                        <p><i class="fa fa-square green"></i>Lansia </p>
                                                    </td>

                                                    <td><?php echo $persenlansias; ?>%</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /page content -->

                <!-- footer content -->

                <!-- /footer content -->
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