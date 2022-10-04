<?php
	include "koneksi.php";

	$id_profile = $_POST['userId'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
    $password = $_POST['password'];
	$profil = $_POST['profil'];

	$select = mysqli_query($con,"SELECT * FROM profile where id_profile ='$id_profile' ");
	$cek = mysqli_num_rows($select);
	
	if($cek > 0){
		$update = mysqli_query($con,"UPDATE pengguna SET nama='$nama', username='$username', password='$password', profil='$profil' WHERE id_profile = '$id_profile' ");
		if($update){
			echo "<script>alert('Berhasil Mengupdate Data');</script>";
		}else{
			echo "<script>alert('Gagal Mengupdate Data'); window.document.location.href='dashboard.php';</script>";
		}
	}else{
		echo "<script>alert('Data Tidak Ditemukan');</script>";
	}

?>