<?php

session_start();

include('koneksi.php');
$isLoggedIn = isset($_SESSION['id']);
$userId = $_SESSION['id'];
$answers = json_decode($_POST['answer'], true);
$finishTime = $_POST['finish-time'];

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

$exp = mysqli_query($con, "SELECT exp FROM profile WHERE id_profile = $userId");
$exp = intval(mysqli_fetch_assoc($exp)['exp']);

$historyCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS jumlah_baris FROM history WHERE finish_time='$finishTime'"))['jumlah_baris'];
if(intval($historyCount) <= 0) {
  // push new history
  mysqli_query($con, "INSERT INTO history (id_user, point, finish_time) VALUES ($userId, $score, '$finishTime')");

  // update user's exp
  $exp += $score;
  mysqli_query($con, "UPDATE profile SET exp = $exp WHERE id_profile = $userId");
}

$user = mysqli_query($con, "SELECT nama, profile FROM profile WHERE id_profile = $userId");
$user = mysqli_fetch_assoc($user);
$name = $user['nama'];
$profil = $user['profile'];

$result = mysqli_query($con, "SELECT * FROM history WHERE id_user = $userId");
$history = [];
while($row = mysqli_fetch_assoc($result)) {
  $history[] = $row;
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <script src="assets/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="css/color.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
      integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <title>Hasil</title>
  </head>
  <body>
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 d-flex align-items-center flex-column flex-md-row gap-3">
          <img
            src="img/profile-pict/<?= $profil ?>.svg"
            class="rounded-circle"
            style="width: 150px; height: 150px; object-fit: cover"
          />
          <h2 class="mx-3"><?= $name ?></h2>
        </div>
      </div>

      <!-- <div class="row justify-content-center mt-md-5 mt-3">
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
      </div> -->
      <div class="row mt-md-5 mt-3 justify-content-center gap-3">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <canvas id="resultChart" width="1" height="1"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex flex-column gap-3">
          <div class="card">
            <div class="card-body">
              <canvas id="historyChart" width="2" height="1"></canvas>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h3 class="card-title text-center text-success"><?= $exp ?> exp</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mb-md-5 mb-3">
      <div class="row justify-content-center">
        <div class="col-md-4 col-12 mb-2">
          <a class="btn primary w-100 fs-5 p-2" href="lesson.php">
            Main lagi
          </a>
        </div>
        <div class="col-md-4 col-12 mb-2">
          <a class="btn btn-outline-primary w-100 fs-5 p-2" href="dashboard.php">Kembali ke dashboard</a>
        </div>
      </div>
    </div>

    <script>
      const resultCtx = document.getElementById('resultChart').getContext('2d');

      const myChart = new Chart(resultCtx, {
        type: 'doughnut',
        data: {
          labels: [
            'Benar',
            'Salah',
          ],
          datasets: [{
            label: 'My First Dataset',
            data: [<?= $correctAnswerCount ?>, <?= $answerCount - $correctAnswerCount ?>],
            backgroundColor: [
              'rgb(54, 162, 235)',
              'rgb(255, 99, 132)',
            ],
            hoverOffset: 8
          }]
        }
      });

      
    </script>
    <script>
      const history = <?= json_encode($history) ?>;
      const historyCtx = document.getElementById("historyChart").getContext("2d");
      const borderColor = getComputedStyle(document.body).getPropertyValue(
        "--dark-primary"
      );
      const chart = new Chart(historyCtx, {
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
