<?php

use function Core\extend;
use function Core\route;

?>

<?php function main()
{ ?>
  <form action="proseslogin.php" method="post">
    <div class="mb-md-5 mb-3 mt-md-2">
      <h2 class="fw-bold mb-4 text-uppercase">Masuk</h2>

      <div class="form-outline form-white mb-4">
        <label class="form-label" for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control form-control-lg" />
      </div>

      <div class="form-outline form-white mb-4">
        <label class="form-label" for="password">Kata Sandi</label>
        <input type="password" id="password" name="password" class="form-control form-control-lg" />
      </div>

      <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">
        Masuk
      </button>
    </div>
  </form>

  <div>
    <p class="mb-3">
      Belum punya akun?
      <a href="<?= route('register') ?>" class="text-white-50 fw-bold">
        Daftar
      </a>
    </p>
    <p>
      <a href="<?= route('/') ?>" class="text-white-50 fw-bold">
        Kembali ke halaman utama
      </a>
    </p>
  </div>
<?php } ?>

<?php extend('auth', [
  'title' => 'Daftar'
]); ?>