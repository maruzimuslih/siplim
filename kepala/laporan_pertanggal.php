<?php
  session_start();
  if($_SESSION['level'] != "pimpinan" || $_SESSION['status'] != "login") {
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

  $q_masuk = mysqli_query($connect, "SELECT SUM(jumlah_masuk) FROM limbah_masuk");
  $masuk = mysqli_fetch_row($q_masuk);
  mysqli_free_result($q_masuk);
  $q_keluar = mysqli_query($connect, "SELECT SUM(jumlah_keluar) FROM limbah_keluar");
  $keluar = mysqli_fetch_row($q_keluar);
  mysqli_free_result($q_keluar);

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
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="../images/icon/pimpinan.png" alt="Pimpinan" />
                    </div>
                    <!-- <h4 class="name">admin</h4> -->
                    <h4 class="name"><?php echo $profil['nama_kepala']; ?></h4>
                    <a href="../logout.php">Logout</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Beranda
                            </a>
                        </li>
                        <li>
                            <a href="limbah_masuk.php">
                                <i class="fas fa-arrow-circle-down"></i>Limbah Masuk TPS</a>
                        </li>
                        <li>
                            <a href="limbah_keluar.php">
                                <i class="fas fa-arrow-circle-up"></i>Limbah Keluar TPS</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-file-text"></i>Laporan per Kategori
                                <span class="arrow" style="padding-top: 23px;">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="laporan_perjenis.php">
                                        <i class="fas fa-circle-o"></i>Laporan per Jenis</a>
                                </li>
                                <li>
                                    <a href="laporan_perruangan.php">
                                        <i class="fas fa-circle-o"></i>Laporan per Ruangan</a>
                                </li>
                            </ul>
                        </li>   
                        <li class="active">
                            <a href="laporan_pertanggal.php">
                                <i class="fas fa-file-text"></i>Laporan per Tanggal</a>
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
                                            <li class="list-inline-item">Laporan per Tanggal</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <div class="col col-md-12" style="max-width: 70%; padding-bottom: 300px;">
                <div class="table-data__tool"  style="padding-top: 50px;">
                    <div class="table-data__tool-left">
                        <h3 class="title-5">Laporan Per Tanggal</h3>
                    </div>
                    <div class="table-data__tool-right">
                        
                    </div>
                </div>
                <form class="form-inline" action="" method="post" >
                    <div class="form-group">
                        <br>
                        <label>Pilih Tanggal:</label>
                        <div class="input-group" >
                            <input type="date" class="form-control" id="datepicker" name="tgl_awal" style="width: 160px;">
                            <label> - </label>
                            <input type="date" class="form-control" id="datepicker" name="tgl_akhir" style="width: 160px;">
                        </div>
                        <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-primary">
                    </div>
                </form>
            </div>

            <?php
                if (isset($_POST['tampilkan'])) {
                    $tgl_awal   = $_POST['tgl_awal'];
                    $tgl_akhir  = $_POST['tgl_akhir'];
                    $tanggal_aw = date('Y-m-d', strtotime(str_replace('/', '-', $tgl_awal)));
                    $tanggal_ak = date('Y-m-d', strtotime(str_replace('/', '-', $tgl_akhir)));
                    $hasil      = mysqli_query($connect, "SELECT * FROM limbah_masuk JOIN ruangan on limbah_masuk.id_ruangan = ruangan.id_ruangan join jenis_limbah on limbah_masuk.id_jenis = jenis_limbah.id_jenis join petugas on limbah_masuk.id_petugas = petugas.id_petugas WHERE tgl_masuk BETWEEN '$tanggal_aw' AND '$tanggal_ak' ORDER BY id_masuk DESC ");
                    $hasil2     = mysqli_query($connect, "SELECT * FROM limbah_keluar JOIN tujuan on limbah_keluar.id_tujuan = tujuan.id_tujuan join petugas on limbah_keluar.id_petugas = petugas.id_petugas WHERE tgl_keluar BETWEEN '$tanggal_aw' AND '$tanggal_ak' ORDER BY id_keluar DESC ");

            ?>
            
            <div class="col-md-12" style="margin-top: -250px;">
            <section class="card">
                <div class="row card-boody" style="padding-top: 20px">
                    <div class="col-lg-12">
                      <h2 class="page-header" style="text-align: center;">
                        <i class="fa fa-bar-file"></i>LAPORAN LIMBAH MEDIS PERTANGGAL<br>UDD Palang Merah Indonesia Kabupaten Banyumas  
                      </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="table-responsive m-b-40" style="padding: 30px 10px 1px;">
                    <table class="table table-bordered table-data3" id="table">
                        <p style="font-size: 20px">Rincian Limbah Masuk TPS</p>
                        <thead>
                            
                            <tr>
                                
                                <th class="text-center">No</th>
                                <th class="text-center">Jenis Limbah</th>
                                <th class="text-center">Sumber Limbah</th>
                                <th class="text-center">Tanggal Masuk</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Petugas</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                while ($tabel = mysqli_fetch_assoc($hasil)) {
                                $no++;
                            ?>
                                <tr class="tr-shadow">
                                    <td class="text-center">
                                        <?php echo $no; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tabel['jenis'];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tabel['nama_ruangan'];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo date('d-m-Y',strtotime($tabel['tgl_masuk']));?>
                                    </td>
                                    <td class="text-center"> 
                                        <?php 
                                            if($tabel['jumlah_masuk']<1000){
                                                echo $tabel['jumlah_masuk'] .' Kg';        
                                            }else{
                                                $tabel['jumlah_masuk']=$tabel['jumlah_masuk']/1000;
                                                echo $tabel['jumlah_masuk'] . ' Ton';
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tabel['nama_petugas'];?>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>

                            <?php    
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive m-b-40" style="padding: 0px 10px 50px;">    
                    <table class="table table-bordered table-data3" id="table">
                        <p style="font-size: 20px">Rincian Limbah Keluar TPS</p>
                        <thead>
                            
                            <tr>
                                    
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal Keluar</th>
                                <th class="text-center">Jumlah Limbah</th>
                                <th class="text-center">Tujuan Peyerahan</th>
                                <th class="text-center">Bukti No. Dokumen</th>
                                <th class="text-center">Petugas</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                while ($tabel2 = mysqli_fetch_assoc($hasil2)) {
                                $no++;
                            ?>
                                <tr class="tr-shadow">
                                    <td class="text-center">
                                        <?php echo $no; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo date('d-m-Y',strtotime($tabel2['tgl_keluar']));?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                            if($tabel2['jumlah_keluar']<1000){
                                                echo $tabel2['jumlah_keluar'] .' Kg';        
                                            }else{
                                                $tabel2['jumlah_keluar']=$tabel2['jumlah_keluar']/1000;
                                                echo $tabel2['jumlah_keluar'] . ' Ton';
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tabel2['nama_tujuan'];?>
                                    </td>
                                    <td class="text-center"> 
                                        <?php echo $tabel2['bukti_no_dokumen'];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tabel2['nama_petugas'];?>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>

                            <?php    
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="row" style="padding-left: 25px; padding-bottom: 15px;">
                <!-- <form action="print_laporan_pertanggal.php" method="post" class="form-horizontal">
                    <input type="hidden" class="form-control" name="tgl_awal1" value="<?php echo $tanggal_aw; ?>">
                    <input type="hidden" class="form-control" name="tgl_akhir1" value="<?php echo $tanggal_ak; ?>"> -->
                        <div class="col-xs-12">
                          <a href="print_laporan_pertanggal.php?tgl_awal1=<?php echo $tanggal_aw;?>&tgl_akhir1=<?php echo $tanggal_ak;?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                        </div>
                <!-- </form> -->
                </div>
            </div> 
            <?php
                }
            ?>
            </section>

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