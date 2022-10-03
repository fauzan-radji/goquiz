<?php

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$insert = mysqli_query($con,"INSERT INTO profile (username,password) VALUES ('$username','$password') ");

if($insert){
	echo "<script>alert('Berhasil Mendaftarkan Akun'); window.document.location.href='login.php';</script>";
}else{
	echo "<script>alert('Gagal Mendaftarkan Akun'); window.document.location.href='register.php';</script>";
}
?>