<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pusdatin | NI </title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <link rel="../shortcut icon" href="assets/images/nurul iman.png">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <?php
    include '../koneksi.php';
    ?>
    <div class=" mx-auto" style="width: 600px;">
        <div class="col-md-12 col-sm-12">
            <div class="text-center">
                <img src="../assets/images/nurul iman.png" alt="" height="125">
                <h2>Pusat Data dan Informasi</h2>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Lengkap Penerima <small>Santunan</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php
                    include '../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "select * from penerima_santunan where id='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <ul class="list-unstyled timeline">
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>NIK</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a><?php echo $d['nik']; ?></a>
                                        </h2>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>Nama</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a><?php echo $d['nama']; ?></a>
                                        </h2>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>Jenis Kelamin</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a><?php echo $d['jenkel']; ?></a>
                                        </h2>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>Tanggal Lahir</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a><?php echo $d['tgl_lahir']; ?></a>
                                        </h2>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>Rt/Rw</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a><?php echo $d['rtrw']; ?></a>
                                        </h2>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>No HP</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a><?php echo $d['hp']; ?></a>
                                        </h2>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>Status</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a><?php echo $d['status']; ?></a>
                                        </h2>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>Aktif</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a><?php echo $d['aktif']; ?></a>
                                        </h2>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>Keterangan</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a><?php echo $d['ket']; ?></a>
                                        </h2>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="mr-3 mt-2 mb-3 float-right">
                <a href="santunan.php" class="alert alert-success" role="alert">Kembali Ke Data</a>
            </div>
        </div>
    </div>
</body>

</html>