<html>
<header>
<link rel="stylesheet" href="../../tambahan/alert.css">
</header>
<script src="../../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data limbah keluar berhasil ditambahkan",
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
                text: "Data limbah keluar gagal ditambahkan",
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
  $tgl_keluar   = date("Y/m/d");
  $jumlah       = $_POST['jumlah'];
  $satuan       = $_POST['satuan'];
  $id_tujuan    = $_POST['id_tujuan'];
  $bukti        = $_POST['bukti'];

  if($satuan=='ton'){
    $jumlah = $jumlah*1000;
  }

  $insert = mysqli_query($connect, "INSERT INTO limbah_keluar (id_petugas, tgl_keluar, jumlah_keluar, id_tujuan, bukti_no_dokumen) VALUES ('$id_petugas', '$tgl_keluar', '$jumlah', '$id_tujuan', '$bukti')");

  if($insert){
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