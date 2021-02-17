<html>
<header>
<link rel="stylesheet" href="../tambahan/alert.css">
</header>
<script src="../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data Petugas berhasil ditambahkan",
                type: "success",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_petugas.php';
          });
    	}
    	function gagal () {
    		swal({ 
                title: "GAGAL !",
                text: "Data Petugas gagal ditambahkan",
                type: "error",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_petugas.php';
          });
    	}
</script>
</html>

<?php
  require_once("../koneksi.php");

  
  $nama        = $_POST['nama'];
  $jabatan     = $_POST['jabatan'];
  $alamat      = $_POST['alamat'];
  $id_kepala   = $_POST['id_kepala'];
  $no_hp       = $_POST['no_hp'];
  $jk          = $_POST['jk'];
  $username    = $_POST['username'];
  $password    = $_POST['password'];
  $level       = $_POST['level'];

  $insert = mysqli_query($connect, "INSERT INTO akun (username, password, level) VALUES ('$username', '$password', '$level')");

  $query = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username' ");
  $akun = mysqli_fetch_array($query);

  $in_petugas = mysqli_query($connect, "INSERT INTO petugas (nama_petugas, jabatan, alamat, id_kepala, no_hp, id_akun, jenis_kelamin) VALUES ('$nama', '$jabatan', '$alamat', '$id_kepala', '$no_hp', '".$akun['id_akun']."', '$jk')");

  if($insert && $in_petugas){
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