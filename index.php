<?php
  require_once("koneksi.php");

  session_start();
  if(isset($_SESSION['id_akun'])) {
    if($_SESSION['level'] == "kepala"){
      header('location: kepala/index.php');
    } else if($_SESSION['level'] == "petugas"){
        $query = mysqli_query($connect, "SELECT * FROM petugas WHERE id_akun='".$_SESSION['id_akun']."'");
        $jabatan = mysqli_fetch_array($query);
        if ($jabatan['jabatan']=='petugas tps') {
            header('location: petugas/tps/index.php');
        }elseif ($jabatan['jabatan']=='petugas ruang') {
            header('location: petugas/ruang/index.php');
        }
    } else if($_SESSION['level'] == "admin"){
      header('location: admin/index.php');    
    } else{
      echo "<script>alert('Nama lengkap atau password Anda SALAH !');</script>";
      echo "<script>window.location='index.php';</script>";
    }
  }
  
?>
<!DOCTYPE html>
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
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5" style="background-image: url(images/icon/bg-login.png); background-size:cover; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; -ms-background-size:cover; min-height:100%;">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            
                                <img src="images/icon/pmi.png" alt="PMI">
                            
                        </div>
                        <div class="login-logo">
                            <h4> Sistem Informasi Pengelolaan Limbah Medis </h4>
                            <h4> UDD PMI Banyumas </h4>
                        </div>
                        <div class="login-form">
                            <form action="proses_login.php" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input name="username" class="form-control" id="username" type="text" placeholder="Masukkan Username Anda">
                                    </div>                            
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <input name="password" class="form-control" id="password" type="password" placeholder="Masukkan Password Anda">
                                    </div>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->