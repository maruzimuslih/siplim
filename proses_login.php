<html>
<header>
<link rel="stylesheet" href="tambahan/alert.css">
</header>
<script src="tambahan/alert.min.js"></script>
<script type="text/javascript">
    	
    	function gagallogin() {
    		swal({ 
                title: "GAGAL !",
                text: "Username atau password yang Anda masukkan salah. Silahkan login kembali!",
                type: "error",
                timer: 1000,
                showConfirmButton: false 
          },
               function(){
                  //event to perform on click of ok button of sweetalert
                  document.location = 'index.php';
          });
    	}
</script>
</html>

<?php
	include "koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	$login 	= mysqli_query($connect, "SELECT * FROM akun WHERE username='$username' AND password='$password'");
	$row 	= mysqli_fetch_array($login);
	
	session_start();
	$_SESSION['id_akun'] = $row['id_akun'];
	$_SESSION['level']   = $row['level'];
	$_SESSION['status']	 = "login";

	if($row['level'] == "pimpinan"){
		header('location: kepala/index.php');
	}else if($row['level'] == "petugas"){
		$query = mysqli_query($connect, "SELECT * FROM petugas WHERE id_akun='".$_SESSION['id_akun']."'");
		$jabatan = mysqli_fetch_array($query);
		if ($jabatan['jabatan']=='petugas tps') {
			header('location: petugas/tps/index.php');
		}elseif ($jabatan['jabatan']=='petugas ruang') {
			header('location: petugas/ruang/index.php');
		}else{

		}
		
	}else if($row['level'] == "admin"){
			header('location: admin/index.php');
	}else{
			?>
			<script type="text/javascript">
      		gagallogin();
    		</script>
    		<?php
	}

	$connect->close();
?>