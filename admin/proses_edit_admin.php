<html>
<header>
<link rel="stylesheet" href="../tambahan/alert.css">
</header>
<script src="../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data Admin berhasil diubah",
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
                text: "Data Admin gagal diubah",
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

  $id_akun     = $_POST['id_akun'];
  $nama        = $_POST['nama'];
  $jabatan     = $_POST['jabatan'];
  $username    = $_POST['username'];
  $password    = $_POST['password'];
  $level       = $_POST['level'];

  $edit = mysqli_query($connect, "UPDATE akun SET username='$username', password='$password', level='$level' WHERE id_akun='$id_akun'");

  $edit_admin = mysqli_query($connect, "UPDATE admin SET nama_admin='$nama', jabatan='$jabatan' WHERE id_akun='$id_akun'");

  if($edit && $edit_admin){
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