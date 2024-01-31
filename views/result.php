<?php

session_start();

include('utils.php');

$isLoggedIn = isset($_SESSION['id']);
$userId = $_SESSION['id'];
$answers = json_decode($_POST['answer'], true);
$finishTime = $_POST['finish-time'];

$answersCount = count($answers);
$correctAnswersCount = getCorrectAnswersCount($answers);

$percentage = $correctAnswersCount / $answersCount * 100;
$score = $correctAnswersCount * 10;

$historyCount = getHistoryCount($finishTime);
if($historyCount <= 0) {
  // push new history
  pushHistory($userId, $score, $finishTime);
}

$exp = getExp($userId);
$user = getProfile($userId);
$name = $user['nama'];
$profil = $user['profile'];

$history = getHistory($userId, 20);

include('header.php');
?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <script src="assets/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="css/color.css" />
    <script src="js/chart.min.js"></script>
    <title>Hasil</title>
  </head>
  <body>
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 d-flex align-items-center flex-column flex-md-row gap-3">
          <img
            src="img/profile-pict/<?= $profil ?>"
            class="rounded-circle"
            style="width: 150px; height: 150px; object-fit: cover"
          />
          <h2 class="mx-3"><?= $name ?></h2>
        </div>
      </div>

      <div class="row mt-md-5 mt-3 justify-content-center gap-3">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <canvas id="resultChart" width="1" height="1"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-flex flex-column gap-3">
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
            label: 'Hasil Jawaban',
            data: [<?= $correctAnswersCount ?>, <?= $answersCount - $correctAnswersCount ?>],
            backgroundColor: [
              'rgb(54, 162, 235)',
              'rgb(255, 99, 132)',
            ],
            hoverOffset: 8
          }]
        }
      });

      
      const history = <?= json_encode($history) ?>;
      const historyCtx = document.getElementById("historyChart").getContext("2d");
    </script>
    <script src="js/history.js"></script>
    <!-- <script>
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
    </script> -->
  </body>
</html>
