<html>
<header>
<link rel="stylesheet" href="../tambahan/alert.css">
</header>
<script src="../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data Jenis Limbah berhasil dihapus",
                type: "success",
                timer: 2000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_jenis.php';
          });
    	}
    	function gagal () {
    		swal({ 
                title: "GAGAL !",
                text: "Data Jenis Limbah gagal dihapus",
                type: "error",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'kelola_jenis.php';
          });
    	}
</script>
</html>

<?php
  require_once("../koneksi.php");

  
  $id_jenis     = $_GET['id_jenis'];
  

  $delete = mysqli_query($connect, "DELETE from jenis_limbah WHERE id_jenis='$id_jenis'");

  if($delete){
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