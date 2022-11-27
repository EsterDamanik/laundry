<?php
include("configbaru.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pw = $_POST['password'];


  $querypengguna = pg_query("INSERT INTO pengguna (email, password, nama) VALUES ('$email','$pw','$nama')");
	$ambiliduser = pg_query("SELECT iduser, email FROM pengguna WHERE email = '$email'");
	$ambiliduser2 = pg_fetch_array($ambiliduser);

	// apakah query berhasil?
    if( $querypengguna){
		header("Location: page_pengguna.php?iduser=".$iduser."&status_daftar=sukses");
    } else {
		header("Location: index.php?status_daftar=gagal");
    }


} else {
	die("Akses dilarang...");
}
?>
