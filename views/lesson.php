<?php
session_start();
// Jika belum login
if(!isset($_SESSION['username'])) {
  echo "<script>alert('Anda tidak berwenang mengakses halaman ini!');window.location.href='login.php'</script>";
  die;
}

include('koneksi.php');
$result = mysqli_query($con, "SELECT * FROM question ORDER BY RAND() LIMIT 3");

include('header.php');
?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <script src="assets/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/color.css" />
    <script>
      const questions = [
<?php while($row = mysqli_fetch_assoc($result)) :?>
        {
          id: <?= $row['id_question'] ?>,
          question: `<?= $row['question'] ?>`,
          choices: [
            {
              id: "a",
              content: `<?= $row['answer_a'] ?>`,
            },
            {
              id: "b",
              content: `<?= $row['answer_b'] ?>`,
            },
            {
              id: "c",
              content: `<?= $row['answer_c'] ?>`,
            },
            {
              id: "d",
              content: `<?= $row['answer_d'] ?>`,
            },
          ],
        },
<?php endwhile; ?>
      ];
    </script>
    <style>
      label {
        cursor: pointer;
        user-select: none;
        min-height: 100px;
      }

      input[type="radio"] {
        display: none;
      }

      input[type="radio"]:checked + label {
        background-color: var(--primary);
        color: #fff;
      }
    </style>
    <title>Quiz</title>
  </head>
  <body>
    <div class="container">
      <div class="progress mt-md-5 mt-3">
        <div
          id="progress-bar"
          class="progress-bar primary"
          style="width: 0"
          role="progressbar"
          aria-label="Basic example"
        ></div>
      </div>

      <div class="row justify-content-center mt-5">
        <div class="col-md-8">
          <p class="fw-bold fs-2" id="question">Pertanyaan</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-4 col-6 mb-3">
          <input type="radio" name="choice" value="a" id="a" />
          <label class="card text-center" for="a">
            <div class="card-body d-flex justify-content-center align-items-center">
              <p class="card-text" id="choiceTextA">A</p>
            </div>
          </label>
        </div>
        <div class="col-md-4 col-6 mb-3">
          <input type="radio" name="choice" value="b" id="b" />
          <label class="card text-center" for="b">
            <div class="card-body d-flex justify-content-center align-items-center">
              <p class="card-text" id="choiceTextB">B</p>
            </div>
          </label>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-4 col-6 mb-3">
          <input type="radio" name="choice" value="c" id="c" />
          <label class="card text-center" for="c">
            <div class="card-body d-flex justify-content-center align-items-center">
              <p class="card-text" id="choiceTextC">C</p>
            </div>
          </label>
        </div>
        <div class="col-md-4 col-6 mb-3">
          <input type="radio" name="choice" value="d" id="d" />
          <label class="card text-center" for="d">
            <div class="card-body d-flex justify-content-center align-items-center">
              <p class="card-text" id="choiceTextD">D</p>
            </div>
          </label>
        </div>
      </div>
    </div>
    <div class="container fixed-bottom mb-md-5 mb-3">
      <div class="row justify-content-center">
        <div class="col-md-2 col-12 mb-2">
          <button
            type="button"
            id="buttonLewati"
            class="btn btn-outline-primary w-100 fs-5 p-2"
          >
            LEWATI
          </button>
        </div>
        <div class="col-md-2 col-12 mb-2">
          <button
            type="button"
            id="buttonLanjut"
            class="btn primary w-100 fs-5 p-2"
          >
            LANJUT
          </button>
        </div>
      </div>
    </div>

    <script src="js/quiz.js"></script>
  </body>
</html>
