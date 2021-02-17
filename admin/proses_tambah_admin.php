<html>
<header>
<link rel="stylesheet" href="../tambahan/alert.css">
</header>
<script src="../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data Admin berhasil ditambahkan",
                type: "success",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_admin.php';
          });
    	}
    	function gagal () {
    		swal({ 
                title: "GAGAL !",
                text: "Data Admin gagal ditambahkan",
                type: "error",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_admin.php';
          });
    	}
</script>
</html>

<?php
  require_once("../koneksi.php");

  
  $nama        = $_POST['nama'];
  $jabatan     = $_POST['jabatan'];
  $username    = $_POST['username'];
  $password    = $_POST['password'];
  $level       = $_POST['level'];

  $insert = mysqli_query($connect, "INSERT INTO akun (username, password, level) VALUES ('$username', '$password', '$level')");

  $query = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username' ");
  $akun = mysqli_fetch_array($query);

  $in_admin = mysqli_query($connect, "INSERT INTO admin (nama_admin, jabatan, id_akun) VALUES ('$nama', '$jabatan', '".$akun['id_akun']."')");

  if($insert && $in_admin){
?>
    <script type="text/javascript">
      berhasil();
    </script>
<?php
  } else{
?>
    <script type="text/javascript">
      gagal();
    </script>
<?php
  }
?>