<?php
include('header.php');
?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <script src="assets/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/background.css" />
    <link rel="stylesheet" href="css/color.css" />
    <title>Masuk</title>
  </head>
  <body>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem">
            <div class="card-body p-md-5 p-4">

              <form action="proseslogin.php" method="post">
                <div class="mb-md-5 mb-3 mt-md-2">
                  <h2 class="fw-bold mb-4 text-uppercase">Masuk</h2>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input
                      type="text"
                      id="username"
                      name="username"
                      class="form-control form-control-lg"
                    />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <input
                      type="password"
                      id="password"
                      name="password"
                      class="form-control form-control-lg"
                    />
                  </div>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">
                    Masuk
                  </button>
                </div>
              </form>

              <div>
                <p class="mb-3">
                  Belum punya akun?
                  <a href="register.php" class="text-white-50 fw-bold">
                    Daftar
                  </a>
                </p>
                <p>
                  <a href="index.php" class="text-white-50 fw-bold">
                    Kembali ke halaman utama
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
