<?php
	$dbhost = 'localhost'; 
	$dbuser = 'id14966392_siplimmus'; //ini hanya berlaku di Xampp
	$dbpass = 'SistemInformasiLimMed21_'; //ini hanya berlaku di Xampp
	$dbname = 'id14966392_siplim';

	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('koneksi gagal');

?>