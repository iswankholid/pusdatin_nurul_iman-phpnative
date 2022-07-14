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
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_content">
                            <div>
                                <h2>Ubah Data Penerima</h2>
                            </div>
                            <?php
                            include '../koneksi.php';
                            $id = $_GET['id'];
                            $data = mysqli_query($koneksi, "select * from penerima_santunan where id='$id'");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <form class="form-label-left input_mask" action="editpenerimaproses.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="nik" name="nik" required value="<?php echo $d['nik']; ?>">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo $d['nama']; ?>">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="number" class="form-control has-feedback-left" id="hp" name="hp" value="<?php echo $d['hp']; ?>">
                                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $d['tgl_lahir']; ?>">
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Jenis Kelamin</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control" name="jk" id="jk">
                                                <option <?php echo ($d['jenkel'] == 'Laki-laki') ? "selected" : "" ?>>Laki-laki</option>
                                                <option <?php echo ($d['jenkel'] == 'Perempuan') ? "selected" : "" ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Rt/Rw</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control" name="rt" id="rt">
                                                <option <?php echo ($d['rtrw'] == '01/06') ? "selected" : "" ?>>01/06</option>
                                                <option <?php echo ($d['rtrw'] == '09/06') ? "selected" : "" ?>>09/06</option>
                                                <option <?php echo ($d['rtrw'] == '02/06') ? "selected" : "" ?>>02/06</option>
                                                <option <?php echo ($d['rtrw'] == '03/06') ? "selected" : "" ?>>03/06</option>
                                                <option <?php echo ($d['rtrw'] == '11/06') ? "selected" : "" ?>>11/06</option>
                                                <option <?php echo ($d['rtrw'] == 'Lainnya') ? "selected" : "" ?>>Lainnya</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Status</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control" name="status" id="status">
                                                <option <?php echo ($d['status'] == 'Yatim') ? "selected" : "" ?>>Yatim</option>
                                                <option <?php echo ($d['status'] == 'Dhuafa') ? "selected" : "" ?>>Dhuafa</option>
                                                <option <?php echo ($d['status'] == 'Janda') ? "selected" : "" ?>>Janda</option>
                                                <option <?php echo ($d['status'] == 'Lansia') ? "selected" : "" ?>>Lansia</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Aktif</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control" name="aktif" id="aktif">
                                                <option <?php echo ($d['aktif'] == 'Aktif') ? "selected" : "" ?>>Aktif</option>
                                                <option <?php echo ($d['aktif'] == 'Tidak') ? "selected" : "" ?>>Tidak</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Keterangan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" value="<?php echo $d['ket']; ?>" name="ket" id="ket">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group row">
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <button type="submit" class="btn btn-primary">Ubah data</button>
                                        </div>
                                    </div>

                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Developer: Aufa Media
                </div>
                <div class="clearfix"></div>
            </footer>
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