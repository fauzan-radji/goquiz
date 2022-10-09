<?php
session_start();
// Jika belum login
if(!isset($_SESSION['id'])) {
  echo "<script>alert('Anda tidak berwenang mengakses halaman ini!');window.location.href='login.php'</script>";
  die;
}

include('utils.php');

// update profile
if(isset($_POST['edit'])) {
  $id = $_POST['userId'];
  $username = $_POST['username'];
  $nama = $_POST['nama'];
  $profil = $_POST['profil'];

  updateProfile($id, $username, $nama, $profil);
}

$id = $_SESSION['id'];

$profile = getProfile($id);

$userId = $profile['id'];
$username = $profile['username'];
$nama = $profile['nama'];
$profil = $profile['profile'];
$exp = getExp($userId);

$history = getHistory($id, 20);

$profilePicts = getProfilePicts();

include('header.php');
?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/color.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="js/chart.min.js"></script>

    <style>
      input[type="radio"]:checked + label > .profile-pict {
        opacity: 1;
      }

      .label-wrapper {
        grid-template-columns: repeat(auto-fill, minmax(5em, 1fr));
      }

      label:has(.profile-pict) {
        cursor: pointer;
      }

      .profile-pict {
        opacity: 0.2;
        aspect-ratio: 1 / 1;
        object-fit: cover;
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
              src="img/profile-pict/<?= $profil ?>"
              alt="Foto Profil"
              class="d-inline-block align-text-top rounded-circle"
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
              <canvas id="chart" width="2" height="1"></canvas>
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
            <div class="label-wrapper d-grid gap-1">
              <?php foreach ($profilePicts as $pict) : ?>
              <input type="radio" name="profil" id="<?= $pict ?>" value="<?= $pict ?>" style="display: none;" <?= ($profil === $pict) ? 'checked' : ''; ?>>
              <label for="<?= $pict ?>"><img class="w-100 rounded-circle profile-pict" src="img/profile-pict/<?= $pict ?>"></label>
              <?php endforeach; ?>
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
      const historyCtx = document.getElementById("chart").getContext("2d");
    </script>
    <script src="js/history.js"></script>
  </body>
</html>
