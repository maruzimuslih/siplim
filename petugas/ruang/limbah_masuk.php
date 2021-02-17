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
                        <div class="header-wrap">

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
        <!-- DATA TABLE -->
            <div class="col-md-12" style="min-height: 69%">    
                <div class="table-data__tool"  style="padding-top: 50px;">
                    <div class="table-data__tool-left">
                        <h3 class="title-5">Limbah Masuk ke TPS</h3>
                    </div>
                    <div class="table-data__tool-right">
                        
                    </div>
                </div>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="row form-group">
                            <div class="col col-md-12" style="max-width: 70%;">
                                <form action="" method="GET">    
                                    <div class="input-group">
                                        <input name="keyword" class="form-control" type="text" placeholder="Cari">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-search" style="font-size: 22.5px;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="tambah.php" class="au-btn au-btn-icon au-btn--green au-btn--small"> 
                            <i class="zmdi zmdi-plus"></i>Tambah</a>
                    </div>
                </div>
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                
                                <th class="text-center">No</th>
                                <th class="text-center">Jenis Limbah</th>
                                <th class="text-center">Sumber Limbah</th>
                                <th class="text-center">Tanggal Masuk</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Petugas</th>
                                <th class="text-center">Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_GET['keyword'])){
                                    $cari = $_GET['keyword'];
                                    $q_tabel = mysqli_query($connect, "SELECT * FROM limbah_masuk join ruangan on limbah_masuk.id_ruangan = ruangan.id_ruangan join jenis_limbah on limbah_masuk.id_jenis = jenis_limbah.id_jenis join petugas on limbah_masuk.id_petugas = petugas.id_petugas WHERE jenis LIKE '%$cari%' OR nama_ruangan LIKE '%$cari%' OR tgl_masuk LIKE '%$cari%' OR jumlah_masuk LIKE '%$cari%' OR nama_petugas LIKE '%$cari%' ORDER BY id_masuk DESC ");             
                                }else{
                                    $q_tabel = mysqli_query($connect, "SELECT * FROM limbah_masuk join ruangan on limbah_masuk.id_ruangan = ruangan.id_ruangan join jenis_limbah on limbah_masuk.id_jenis = jenis_limbah.id_jenis join petugas on limbah_masuk.id_petugas = petugas.id_petugas ORDER BY id_masuk DESC");
                                }
                                $no = 0;
                                while($tabel = mysqli_fetch_array($q_tabel)){
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
                                    <?php
                                     if($tabel['status']==0){
                                        echo "<span style='font-size: 14px; color:red;'> Belum divalidasi </span>";
                                     }elseif ($tabel['status']==1) {
                                        echo "<span style='font-size: 14px; color:green;'> Sudah divalidasi </span>";
                                     }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $tabel['nama_petugas'];?>
                                </td>

                                <?php
                                    if($tabel['nama_petugas']==$profil['nama_petugas']){
                                ?>
                                    <td class="text-center">
                                        <div class="table-data-feature">
                                            
                                            <a href="halaman_edit.php?id_masuk=<?php echo $tabel['id_masuk']; ?>" class="item" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <button class="item" data-placement="top" data-toggle="modal" data-target="#smallmodal<?php echo $tabel['id_masuk']; ?>" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>

                                            <div class="modal fade" id="smallmodal<?php echo $tabel['id_masuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="smallmodalLabel"></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Yakin ingin mengahpus?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <a href="proses_hapus.php?id_masuk=<?php echo $tabel['id_masuk']; ?>" class="btn btn-primary">Ya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                <?php 
                                    }else{
                                        echo "<td> </td>";
                                    }
                                ?>
                            </tr>
                            <tr class="spacer"></tr>

                            <?php    
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
                                <!-- END DATA TABLE -->
            <div ></div>
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