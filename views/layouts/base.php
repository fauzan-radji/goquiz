<?php

use function Core\asset;
use function Core\component;
use function Core\section;

?>
<!DOCTYPE html>
<html lang="en">

<?php component('head', [
  'title' => $title
]) ?>

<body>
  <div class="container">
    <?php section('container') ?>
  </div>
</body>

</html>