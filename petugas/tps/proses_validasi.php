<?php
  require_once("../../koneksi.php");

  $id_masuk       = $_POST['id_masuk'];
  $validasi       = $_POST['validasi'];


  $edit = mysqli_query($connect, "UPDATE limbah_masuk SET status='$validasi' WHERE id_masuk='$id_masuk'");

  ?>

  <script type="text/javascript">
      document.location = 'limbah_masuk.php';
  </script>