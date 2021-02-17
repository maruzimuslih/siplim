<html>
<header>
<link rel="stylesheet" href="../tambahan/alert.css">
</header>
<script src="../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data Petugas berhasil diubah",
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
                text: "Data Petugas gagal diubah",
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

  $id_akun     = $_POST['id_akun'];
  $nama        = $_POST['nama'];
  $jabatan     = $_POST['jabatan'];
  $alamat      = $_POST['alamat'];
  $id_kepala   = $_POST['id_kepala'];
  $no_hp       = $_POST['no_hp'];
  $jk          = $_POST['jk'];
  $username    = $_POST['username'];
  $password    = $_POST['password'];
  $level       = $_POST['level'];

  $edit = mysqli_query($connect, "UPDATE akun SET username='$username', password='$password', level='$level' WHERE id_akun='$id_akun'");

  $edit_petugas = mysqli_query($connect, "UPDATE petugas SET nama_petugas='$nama', jabatan='$jabatan', alamat='$alamat', id_kepala='$id_kepala', no_hp='$no_hp', jenis_kelamin='$jk' WHERE id_akun='$id_akun'");

  if($edit && $edit_petugas){
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