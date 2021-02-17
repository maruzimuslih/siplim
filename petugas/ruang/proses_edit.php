<html>
<header>
<link rel="stylesheet" href="../../tambahan/alert.css">
</header>
<script src="../../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data limbah masuk berhasil diubah",
                type: "success",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'limbah_masuk.php';
          });
    	}
    	function gagal () {
    		swal({ 
                title: "GAGAL !",
                text: "Data limbah masuk gagal diubah",
                type: "error",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'limbah_masuk.php';
          });
    	}
</script>
</html>

<?php
  require_once("../../koneksi.php");

  $id_petugas   = $_POST['id_petugas'];
  $id_masuk     = $_POST['id_masuk'];
  $id_jenis     = $_POST['id_jenis'];
  $id_ruangan   = $_POST['id_ruangan'];
  $jumlah       = $_POST['jumlah'];
  $satuan       = $_POST['satuan'];
  $validasi     = $_POST['validasi'];

  if($satuan=='ton'){
    $jumlah = $jumlah*1000;
  }

  $edit = mysqli_query($connect, "UPDATE limbah_masuk SET id_petugas='$id_petugas', id_jenis='$id_jenis', id_ruangan='$id_ruangan', jumlah_masuk='$jumlah', status='$validasi' WHERE id_masuk='$id_masuk'");

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