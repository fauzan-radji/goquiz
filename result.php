<?php

session_start();

include('koneksi.php');
$userId = $_SESSION['id'];
$answers = json_decode($_POST['answer'], true);
$correctAnswerCount = 0;
$answerCount = count($answers);
foreach ($answers as $answer) {
  $id = $answer['questionId'];
  $answer = $answer['answer'];
  $correctAnswer = mysqli_query($con, "SELECT is_correct FROM question WHERE id_question = $id");
  $correctAnswer = mysqli_fetch_assoc($correctAnswer)['is_correct'];

  if ($correctAnswer === $answer) $correctAnswerCount++;
}

$percentage = $correctAnswerCount / $answerCount * 100;
$score = $correctAnswerCount * 10;

$kyu = mysqli_query($con, "SELECT kyu FROM profile WHERE id_profile = $userId");
$kyu = mysqli_fetch_assoc($kyu)['kyu'];
var_dump($kyu);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <script src="assets/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="css/color.css" />
    <title>Hasil</title>
  </head>
  <body>
    <div class="container py-5">
      <div class="row justify-content-center">
        <div
          class="col-md-8 d-flex align-items-center flex-column flex-md-row gap-5"
        >
          <img
            src="img/dani.png"
            class="rounded-circle"
            style="width: 150px; height: 150px; object-fit: cover"
          />
          <h2>Dhani Ardianto Syahdila</h2>
        </div>
      </div>

      <div class="row justify-content-center mt-md-5 mt-3">
        <div class="col-md-8 col-10">
          <div class="progress">
            <div
              id="progress-bar"
              class="progress-bar primary"
              role="progressbar"
              aria-label="Example with label"
              style="width: 0"
            >
              0%
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-md-5 mt-3 justify-content-center">
        <div class="col-md-3 col-6 mb-3">
          <div class="card border-success text-center">
            <div class="card-body">
              <h5 class="card-title fs-1" id="correctCount">4</h5>
              <p class="card-text">Benar</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
          <div class="card border-danger text-center">
            <div class="card-body">
              <h5 class="card-title fs-1" id="wrongCount">10</h5>
              <p class="card-text">Salah</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container fixed-bottom mb-md-5 mb-3">
      <div class="row justify-content-center">
        <div class="col-md-2 col-12 mb-2">
          <a class="btn btn-outline-primary w-100 fs-5 p-2" href="lesson.php">
            MAIN LAGI
          </a>
        </div>
        <div class="col-md-2 col-12 mb-2">
          <a class="btn primary w-100 fs-5 p-2" href="login.php"> LOGIN </a>
        </div>
      </div>
    </div>

    <script>
      const progressBar = document.getElementById("progress-bar");
      // update progress bar
      const percentage = `<?= number_format($percentage, 2, '.', ""); ?>%`
      progressBar.textContent = percentage;
      setTimeout(() => {
        progressBar.style.width = percentage;
      }, 10);

      const correctCount = document.getElementById('correctCount');
      correctCount.textContent = `<?= $correctAnswerCount ?>`;
      const wrongCount = document.getElementById('wrongCount');
      wrongCount.textContent = `<?= $answerCount - $correctAnswerCount ?>`;
    </script>
  </body>
</html>
