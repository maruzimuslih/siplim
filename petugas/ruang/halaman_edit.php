<?php
  session_start();
  if($_SESSION['level'] != "petugas" || $_SESSION['status'] != "login") {
    header('location:../../index.php');
  }

  require_once("../../koneksi.php");

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
    <link href="../../css/font-face.css" rel="stylesheet" media="all">
    <link href="../../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="../../vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="../../images/icon/pmi.png" style="width: 80px; vertical-align: middle; "> <b style="color: white; font-size: 30px; vertical-align: middle; ">SIPLIM</b>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="../../images/icon/petugas.png" alt="Petugas" />
                    </div>
                    <!-- <h4 class="name">admin</h4> -->
                    <h4 class="name"><?php echo $profil['nama_petugas']; ?></h4>
                    <a href="../../logout.php">Logout</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Beranda
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a href="limbah_masuk.php">
                                <i class="fas fa-arrow-circle-down"></i>Limbah Masuk TPS</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
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
                                            <li class="list-inline-item">Limbah Masuk TPS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
                            <div class="col-lg-8" style="margin: 50px auto;">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit Limbah Masuk TPS</strong>
                                    </div>
                                    <?php
                                    
                                      $q_tabel = mysqli_query($connect, "SELECT * FROM limbah_masuk join ruangan on limbah_masuk.id_ruangan = ruangan.id_ruangan where limbah_masuk.id_masuk='".$_GET['id_masuk']."'");
                                        $tabel = mysqli_fetch_array($q_tabel);
                                    ?>
                                    <div class="card-body card-block">
                                        <form action="proses_edit.php" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Petugas</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"><?php echo $profil['nama_petugas'];?></p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Jenis Limbah</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="hidden" class="form-control" name="id_petugas" value="<?php echo $profil['id_petugas']; ?>">
                                                    <select name="id_jenis" class="form-control" required>
                                                        <option value="" hidden > Pilih </option>
                                                            <?php
                                                            $q_jenis = mysqli_query($connect, "SELECT * FROM jenis_limbah ORDER BY jenis");
                                                            while($jenis = mysqli_fetch_array($q_jenis)){
                                                            if($jenis['id_jenis']==$tabel['id_jenis']){
                                                            echo "<option selected value='".$jenis['id_jenis']."'> ".$jenis['jenis']." </option>";
                                                            }else{
                                                                echo "<option value='".$jenis['id_jenis']."'> ".$jenis['jenis']." </option>";
                                                            }
                                                            }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="disabled-input" class=" form-control-label">Tanggal Masuk</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="tgl_masuk" placeholder="<?php echo date("d-m-Y", strtotime($tabel['tgl_masuk'])); ?>" disabled="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Sumber Limbah</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="id_ruangan" class="form-control" required>
                                                        <option value="" hidden > Pilih Ruangan</option>
                                                            <?php
                                                            $q_ruang = mysqli_query($connect, "SELECT * FROM ruangan ORDER BY nama_ruangan");
                                                            while($ruang = mysqli_fetch_array($q_ruang)){
                                                            if($ruang['id_ruangan']==$tabel['id_ruangan']){
                                                            echo "<option selected value='".$ruang['id_ruangan']."'> ".$ruang['nama_ruangan']." </option>";
                                                            }else{
                                                                echo "<option value='".$ruang['id_ruangan']."'> ".$ruang['nama_ruangan']." </option>";
                                                            }
                                                            }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Jumlah Limbah</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type='hidden' name='validasi' value='0'>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $tabel['jumlah_masuk']; ?>" name="jumlah" class="form-control">
                                                        <input type="hidden" class="form-control" name="id_masuk" value="<?php echo $_GET['id_masuk']; ?>">
                                                        <div class="input-group-btn">
                                                            <div class="btn-group">
                                                                <select name="satuan" class="form-control" required>
                                                                    <option value="kg">Kg</option>
                                                                    <option value="ton">Ton</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <small class="form-text text-muted">Penulisan desimal menggunakan titik</small>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Simpan
                                            </button>
                                            <a href="limbah_masuk.php" class="btn btn-secondary btn-sm">
                                                <i class="fa fa-arrow-left"></i> Kembali
                                            </a>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>

            <section>
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
    <script src="../../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../vendor/slick/slick.min.js">
    </script>
    <script src="../../vendor/wow/wow.min.js"></script>
    <script src="../../vendor/animsition/animsition.min.js"></script>
    <script src="../../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../vendor/select2/select2.min.js">
    </script>
    <script src="../../vendor/vector-map/jquery.vmap.js"></script>
    <script src="../../vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="../../vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../../vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="../../js/main.js"></script>

</body>

</html>
<!-- end document-->