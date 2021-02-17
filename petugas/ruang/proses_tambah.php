<html>
<header>
<link rel="stylesheet" href="../../tambahan/alert.css">
</header>
<script src="../../tambahan/alert.min.js"></script>
<script type="text/javascript">
    	function berhasil () {
    		swal({ 
                title: "BERHASIL !",
                text: "Data limbah masuk berhasil ditambahkan",
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
                text: "Data limbah masuk gagal ditambahkan",
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
  $id_jenis     = $_POST['id_jenis'];
  $tgl_masuk    = date("Y/m/d");
  $id_ruangan   = $_POST['id_ruangan'];
  $jumlah       = $_POST['jumlah'];
  $satuan       = $_POST['satuan'];

  if($satuan=='ton'){
    $jumlah = $jumlah*1000;
  }

  $insert = mysqli_query($connect, "INSERT INTO limbah_masuk (id_petugas, id_jenis, tgl_masuk, id_ruangan, jumlah_masuk) VALUES ('$id_petugas', '$id_jenis', '$tgl_masuk', '$id_ruangan', '$jumlah')");

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