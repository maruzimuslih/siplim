<html>
<header>
<link rel="stylesheet" href="../tambahan/alert.css">
</header>
<script src="../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data Pihak Ketiga berhasil diubah",
                type: "success",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_tujuan.php';
          });
    	}
    	function gagal () {
    		swal({ 
                title: "GAGAL !",
                text: "Data Pihak Ketiga gagal diubah",
                type: "error",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_tujuan.php';
          });
    	}
</script>
</html>

<?php
  require_once("../koneksi.php");

  $id_tujuan   = $_POST['id_tujuan'];
  $nama        = $_POST['nama'];
  
  $edit = mysqli_query($connect, "UPDATE tujuan SET nama_tujuan='$nama' WHERE id_tujuan='$id_tujuan'");

  if($edit){
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