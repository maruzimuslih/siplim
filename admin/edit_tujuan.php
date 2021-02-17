<?php
  session_start();
  if($_SESSION['level'] != "admin" || $_SESSION['status'] != "login") {
    header('location:../index.php');
  }

  require_once("../koneksi.php");

  // $id_pengguna = $_SESSION['id_akun'];
  // $query = mysqli_query($connect, "SELECT * FROM akun WHERE id_akun = '$id_akun'");
  // $profil = mysqli_fetch_array($query);
  if($_SESSION['level']=='admin'){
     $query = mysqli_query($connect, "SELECT * FROM admin WHERE id_akun = '".$_SESSION['id_akun']."'");
     $profil = mysqli_fetch_array($query);
  }elseif ($_SESSION['level']=='petugas') {
     $query = mysqli_query($connect, "SELECT * FROM petugas WHERE id_akun = '".$_SESSION['id_akun']."'");
     $profil = mysqli_fetch_array($query);
  }elseif ($_SESSION['level']=='pimpinan') {
     $query = mysqli_query($connect, "SELECT * FROM kepala WHERE id_akun = '".$_SESSION['id_akun']."'");
     $profil = mysqli_fetch_array($query);
  }else{

  }
?>

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>SIPLIM | UDD PMI Kabupaten Banyumas</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="../vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="../images/icon/pmi.png" style="width: 80px; vertical-align: middle; "> <b style="color: white; font-size: 30px; vertical-align: middle; ">SIPLIM</b>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1 ps ps--active-y">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="../images/icon/admin.png" alt="Admin" />
                    </div>
                    <!-- <h4 class="name">admin</h4> -->
                    <h4 class="name"><?php echo $profil['nama_admin']; ?></h4>
                    <a href="../logout.php">Logout</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Beranda
                            </a>
                        </li>
                        <li>
                            <a href="kelola_jenis.php">
                                <i class="fas fa-warning"></i>Kelola Jenis Limbah</a>
                        </li>
                        <li>
                            <a href="kelola_ruangan.php">
                                <i class="fas fa-hospital-o"></i>Kelola Sumber Limbah</a>
                            </a>
                        </li>
                        <li class="active">
                            <a href="kelola_tujuan.php">
                                <i class="fas fa-truck"></i>Kelola Pihak Ketiga</a>
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-users"></i>Kelola Pengguna
                                <span class="arrow" style="padding-top: 23px;">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="kelola_admin.php">
                                        <i class="fas fa-circle-o"></i>Admin</a>
                                </li>
                                <li>
                                    <a href="kelola_kepala.php">
                                        <i class="fas fa-circle-o"></i>Pimpinan</a>
                                </li>
                                <li>
                                    <a href="kelola_petugas.php">
                                        <i class="fas fa-circle-o"></i>Petugas</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2 content-wrapper" style="min-height: 100%">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb p-t-100">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="index.php">Beranda</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Kelola Pihak Ketiga</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- DATA TABLE -->
             <div class="col-lg-8" style="margin: 50px auto;">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Data Pihak Ketiga</strong>
                    </div>
                    <?php
                      $q_tabel = mysqli_query($connect, "SELECT * FROM tujuan where id_tujuan='".$_GET['id_tujuan']."'");
                        $tabel = mysqli_fetch_array($q_tabel);
                    ?>
                    <div class="card-body card-block">
                        <form action="proses_edit_tujuan.php" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Nama Pihak Ketiga</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <!-- <input type="hidden" class="form-control" name="id_admin" value="<?php echo $profil['id_admin']; ?>"> -->
                                    <input type="hidden" class="form-control" name="id_tujuan" value="<?php echo $_GET['id_tujuan']; ?>">
                                    <input type="text" name="nama" class="form-control" value="<?php echo $tabel['nama_tujuan']; ?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Simpan
                            </button>
                            <a href="kelola_tujuan.php" class="btn btn-secondary btn-sm">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
          <!-- END DATA TABLE -->

            <section style="padding-top: 149px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2019 UDD PMI Kabupaten Banyumas. All rights reserved. Design by Moch. Muslih Maruzi.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>
    <script src="../vendor/vector-map/jquery.vmap.js"></script>
    <script src="../vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="../vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->