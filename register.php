<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <script src="assets/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/background.css" />
    <link rel="stylesheet" href="css/color.css" />
    <title>Daftar</title>
  </head>
  <body>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem">
            <div class="card-body p-md-5 p-4">

              <form action="prosesregister.php" method="post">
              <div class="mb-md-5 mb-3 mt-md-2">
                <h2 class="fw-bold mb-4 text-uppercase">Daftar</h2>

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
                    <label class="form-label" for="password"
                      >Kata Sandi</label
                    >
                    <input
                      type="password"
                      id="password"
                      name="password"
                      class="form-control form-control-lg"
                    />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="retypePassword"
                      >Ketik Ulang Kata Sandi</label
                    >
                    <input
                      type="password"
                      id="retypePassword"
                      name="password"
                      class="form-control form-control-lg"
                    />
                  </div>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit">
                    Daftar
                  </button>
                </div>

                <div>
                  <p class="mb-0">
                    Sudah punya akun?
                    <a href="login.html" class="text-white-50 fw-bold">Masuk</a>
                  </p>
                </div>
              </form>  

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
