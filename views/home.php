<?php

use function Core\asset;
use function Core\extend;
use function Core\route;

?>

<?php function container()
{
  global $isLoggedIn;
?>
  <div class="row justify-content-center pt-4 mb-4">
    <div class="col-md-3 col-8">
      <img class="w-100" src="<?= asset('img/typo.svg') ?>" alt="GOQuiz" />
    </div>
  </div>

  <div class="row justify-content-center pt-md-5 mt-5 gap-5">
    <div class="col-md-4">
      <img class="w-100" style="max-height: 30vh" src="<?= asset('img/logo.svg') ?>" />
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center gap-md-3 gap-2">
      <h1 class="px-md-0 px-4 text-center">
        Ayo belajar bahasa Gorontalo dengan gratis di sini
      </h1>
      <?php if ($isLoggedIn) : ?>
        <a href="lesson.php" style="width: 300px" class="fs-5 btn primary">
          Mulai
        </a>
        <a href="dashboard.php" style="width: 300px" class="fs-5 btn btn-outline-primary">
          Ke Dashboard
        </a>
      <?php else : ?>
        <a href="<?= route('login') ?>" style="width: 300px" class="fs-5 btn primary">
          Masuk
        </a>
      <?php endif; ?>
    </div>
  </div>
<?php } ?>

<?php
extend('base', [
  'title' => 'Home',
  'isLoggedIn' => $isLoggedIn
]);
