<?php

include("koneksi.php");

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = mysqli_query($con, "SELECT * FROM profile WHERE username='$username' AND password='$password'");
  $profile = mysqli_fetch_array($sql);
  $row = mysqli_num_rows($sql);

  if ($row > 0) {
    session_start();
    $_SESSION['id'] = $profile['id'];
    header('Location: dashboard.php');
  } else {
    echo "<script>alert('Terjadi kesalahan saat anda login');window.location.href='login.php'</script>";
  }
}
