<?php

use function Core\extend;
use function Core\route;

?>

<?php function main()
{ ?>
  <form action="prosesregister.php" method="post">
    <div class="mb-md-5 mb-3 mt-md-2">
      <h2 class="fw-bold mb-4 text-uppercase">Daftar</h2>

      <div class="form-outline form-white mb-4">
        <label class="form-label" for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control form-control-lg" />
      </div>

      <div class="form-outline form-white mb-4">
        <label class="form-label" for="password">Kata Sandi</label>
        <input type="password" id="password" name="password" class="form-control form-control-lg" />
      </div>

      <div class="form-outline form-white mb-4">
        <label class="form-label" for="retypePassword">Ketik Ulang Kata Sandi</label>
        <input type="password" id="retypePassword" name="password" class="form-control form-control-lg" />
      </div>

      <button class="btn btn-outline-light btn-lg px-5" type="submit">
        Daftar
      </button>
    </div>
  </form>

  <div>
    <p class="mb-3">
      Sudah punya akun?
      <a href="<?= route('login') ?>" class="text-white-50 fw-bold">Masuk</a>
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