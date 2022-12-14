<?php
session_start();
$isLoggedIn = isset($_SESSION['id']);

include('header.php');
?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/color.css" />
    <link rel="stylesheet" href="css/background.css" />
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <title>GOQuiz</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center pt-4 mb-4">
        <div class="col-md-3 col-8">
          <img class="w-100" src="img/typo.svg" alt="GOQuiz" />
        </div>
      </div>

      <div class="row justify-content-center pt-md-5 mt-5 gap-5">
        <div class="col-md-4">
          <img class="w-100" style="max-height: 30vh" src="img/logo.svg" />
        </div>
        <div
          class="col-md-6 d-flex flex-column justify-content-center align-items-center gap-md-3 gap-2"
        >
          <h1 class="px-md-0 px-4 text-center">
            Ayo belajar bahasa Gorontalo dengan gratis di sini
          </h1>
          <?php if($isLoggedIn) : ?>
          <a
            href="lesson.php"
            style="width: 300px"
            class="fs-5 btn primary"
          >
            Mulai
          </a>
          <a
            href="dashboard.php"
            style="width: 300px"
            class="fs-5 btn btn-outline-primary"
          >
            Ke Dashboard
          </a>
          <?php else : ?>
          <a href="login.php" style="width: 300px" class="fs-5 btn primary">
            Masuk
          </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </body>
</html>
