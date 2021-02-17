<html>
<header>
<link rel="stylesheet" href="../../tambahan/alert.css">
</header>
<script src="../../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data limbah masuk berhasil dihapus",
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
                text: "Data limbah masuk gagal dihapus",
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

  
  $id_masuk     = $_GET['id_masuk'];
  

  $delete = mysqli_query($connect, "DELETE from limbah_masuk WHERE id_masuk='$id_masuk'");

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