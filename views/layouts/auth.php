<?php

use function Core\component;
use function Core\section;

?>
<!DOCTYPE html>
<html lang="en">

<?php component('head', [
  'title' => $title
]) ?>

<body>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem">
          <div class="card-body p-md-5 p-4">
            <?php section('main') ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>