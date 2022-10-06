<?php
include('koneksi.php');
session_start();
// Jika belum login
if(!isset($_SESSION['username'])) {
  echo "<script>alert('Anda tidak berwenang mengakses halaman ini!');window.location.href='login.php'</script>";
  die;
}

// update profile
if(isset($_POST['edit'])) {
  $userId = $_POST['userId'];
  $username = $_POST['username'];
  $nama = $_POST['nama'];
  $profil = $_POST['profil'];

  mysqli_query($con, "UPDATE profile SET nama = '$nama', username = '$username', profile = '$profil' WHERE id_profile = $userId");
}

$id = $_SESSION['id'];
$sql = mysqli_query($con,"SELECT * FROM profile WHERE id_profile = $id");
$select = mysqli_fetch_assoc($sql);

$userId = $select['id_profile'];
$username = $select['username'];
$nama = $select['nama'];
$exp = $select['exp'];
$profil = $select['profile'];

$result = mysqli_query($con, "SELECT * FROM history WHERE id_user = $userId");

$history = [];
while($row = mysqli_fetch_assoc($result)) {
  $history[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/color.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
      integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <style>
      input[type="radio"]:checked + label > .profile-pict {
        opacity: 1;
      }

      label:has(.profile-pict) {
        cursor: pointer;
      }

      .profile-pict {
        opacity: 0.2;
      }
    </style>
    <title>Dasbor</title>
  </head>
  <body>
    <nav class="navbar dark-primary">
      <div class="container">
        <div class="dropdown">
          <button
            class="navbar-nama d-flex align-items-center gap-3"
            data-bs-toggle="dropdown"
          >
            <img
              src="img/profile-pict/<?= $profil ?>.svg"
              alt="Logo"
              width="30"
              height="24"
              class="d-inline-block align-text-top"
            />
            <?= $username ?>
          </button>
          <ul class="dropdown-menu">
            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profil</button></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item text-danger" href="logout.php">Keluar</a></li>
          </ul>
        </div>
        <span class="exp"><?= $exp ?> exp</span>
      </div>
    </nav>

    <div class="container">
      <div class="row mt-3 mt-md-5 justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <canvas id="chart" width="3" height="1"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3 mt-md-5 justify-content-center">
        <div class="col-md-4 col-8">
          <a href="lesson.php" class="btn primary w-100 fs-5 p-2">Main</a>
        </div>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="POST" autocomplete="off">
        <input type="hidden" value="<?= $userId ?>" name="userId">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editProfileModalLabel">Edit Profil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input
              type="text"
              name="username"
              class="form-control"
              id="username"
              value="<?= $username ?>"
            />
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input
              type="text"
              name="nama"
              class="form-control"
              id="nama"
              value="<?= $nama ?>"
            />
          </div>
          <div class="mb-3">
            <p class="form-label">Foto Profil</p>
            <div class="d-flex justify-content-center">
              <input type="radio" name="profil" id="asd" value="asd" style="display: none;" <?= ($profil === 'asd') ? 'checked' : ''; ?>>
              <label for="asd"><img class="w-100 rounded-circle profile-pict" src="img/profile-pict/asd.svg"></label>
              <input type="radio" name="profil" id="jkl" value="jkl" style="display: none;" <?= ($profil === 'jkl') ? 'checked' : ''; ?>>
              <label for="jkl"><img class="w-100 rounded-circle profile-pict" src="img/profile-pict/jkl.svg"></label>
              <input type="radio" name="profil" id="ghj" value="ghj" style="display: none;" <?= ($profil === 'ghj') ? 'checked' : ''; ?>>
              <label for="ghj"><img class="w-100 rounded-circle profile-pict" src="img/profile-pict/ghj.svg"></label>
              <input type="radio" name="profil" id="qwe" value="qwe" style="display: none;" <?= ($profil === 'qwe') ? 'checked' : ''; ?>>
              <label for="qwe"><img class="w-100 rounded-circle profile-pict" src="img/profile-pict/qwe.svg"></label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn primary" name="edit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <script>
      const history = <?= json_encode($history) ?>;
      const ctx = document.getElementById("chart").getContext("2d");
      const borderColor = getComputedStyle(document.body).getPropertyValue(
        "--dark-primary"
      );
      const chart = new Chart(ctx, {
        type: "line",
        data: {
          labels: history.map((e,i) => i + 1),
          datasets: [
            {
              label: "Riwayat Poin",
              data: history.map(e => e.point),
              fill: true,
              borderColor: borderColor,
              tension: 0.1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    </script>
  </body>
</html>
