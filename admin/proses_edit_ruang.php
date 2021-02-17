<html>
<header>
<link rel="stylesheet" href="../tambahan/alert.css">
</header>
<script src="../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data Sumber Limbah berhasil diubah",
                type: "success",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_ruangan.php';
          });
    	}
    	function gagal () {
    		swal({ 
                title: "GAGAL !",
                text: "Data Sumber Limbah gagal diubah",
                type: "error",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_ruangan.php';
          });
    	}
</script>
</html>

<?php
  require_once("../koneksi.php");

  $id_ruangan  = $_POST['id_ruangan'];
  $nama        = $_POST['nama'];
  
  $edit = mysqli_query($connect, "UPDATE ruangan SET nama_ruangan='$nama' WHERE id_ruangan='$id_ruangan'");

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