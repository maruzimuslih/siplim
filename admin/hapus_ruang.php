<html>
<header>
<link rel="stylesheet" href="../tambahan/alert.css">
</header>
<script src="../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data Sumber Limbah berhasil dihapus",
                type: "success",
                timer: 2000,
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
                text: "Data Sumber Limbah gagal dihapus",
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

  
  $id_ruangan     = $_GET['id_ruangan'];
  

  $delete = mysqli_query($connect, "DELETE from ruangan WHERE id_ruangan='$id_ruangan'");

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