<html>
<header>
<link rel="stylesheet" href="../tambahan/alert.css">
</header>
<script src="../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data Jenis Limbah berhasil ditambahkan",
                type: "success",
                timer: 1000,
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
                text: "Data Jenis Limbah gagal ditambahkan",
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

  
  $jenis        = $_POST['jenis'];
  
  $insert = mysqli_query($connect, "INSERT INTO jenis_limbah (jenis) VALUES ('$jenis')");

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