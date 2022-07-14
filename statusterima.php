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
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/nurul iman.png">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <?php
    include 'koneksi.php';
    ?>
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <div>
                        <div>
                            <img src="assets/images/nurul iman.png" alt="" height="125">
                        </div>
                    </div>

                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "sukses") {
                            echo "<div class='alert alert-info'>Data Telah Masuk !</div>";
                        }
                    }
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                            echo "<div class='alert alert-danger'>Ops Dia Sudah Melakukan Scan Sebelumnya !</div>";
                        }
                    }
                    ?>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <h1>Pusdatin-Nurul Iman!</h1>
                        <p>©2021 All Rights Reserved. Masjid Jami' Nurul Iman Jati Padang. Privacy and Terms</p>
                        <div class="clearfix"></div>
                        <br />
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>