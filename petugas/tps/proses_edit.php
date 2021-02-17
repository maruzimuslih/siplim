<html>
<header>
<link rel="stylesheet" href="../../tambahan/alert.css">
</header>
<script src="../../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data limbah keluar berhasil diubah",
                type: "success",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'limbah_keluar.php';
          });
    	}
    	function gagal () {
    		swal({ 
                title: "GAGAL !",
                text: "Data limbah keluar gagal diubah",
                type: "error",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'limbah_keluar.php';
          });
    	}
</script>
</html>

<?php
  require_once("../../koneksi.php");

  $id_petugas   = $_POST['id_petugas'];
  $id_keluar    = $_POST['id_keluar'];
  $bukti        = $_POST['bukti'];
  $id_tujuan    = $_POST['id_tujuan'];
  $jumlah       = $_POST['jumlah'];
  $satuan       = $_POST['satuan'];

  if($satuan=='ton'){
    $jumlah = $jumlah*1000;
  }

  $edit = mysqli_query($connect, "UPDATE limbah_keluar SET id_petugas='$id_petugas', bukti_no_dokumen='$bukti', id_tujuan='$id_tujuan', jumlah_keluar='$jumlah' WHERE id_keluar='$id_keluar'");

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