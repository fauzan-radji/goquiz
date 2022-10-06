<?php
session_start();
$isLoggedIn = isset($_SESSION['id']);
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          <h1 class="px-md-0 px-4">
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
          <?php else : ?>
          <a href="login.php" style="width: 300px" class="fs-5 btn primary">
            Login
          </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- <header class="mt-5 text-center">
      <img class="w-25" src="img/typo.svg" alt="GOQuiz" />
    </header>

    <main>
      <img src="img/logo.svg" />

      <div>
        <h1>Ayo belajar bahasa Gorontalo<br />dengan gratis di sini</h1>
        <a href="lesson.php" class="button button-1">Mulai</a>
        <a href="login.php" class="button">Login</a>
      </div>
    </main> -->
  </body>
</html>
