<?php

use function Core\asset;

?>

<head>
  <title><?= $title ?></title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="<?= asset('img/logo-light.svg') ?>" type="image/x-icon">
  <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>" />
  <script src="<?= asset('assets/js/bootstrap.min.js') ?>" defer></script>
  <link rel="stylesheet" href="<?= asset('css/font.css') ?>" />
  <link rel="stylesheet" href="<?= asset('css/background.css') ?>" />
  <link rel="stylesheet" href="<?= asset('css/color.css') ?>" />
</head>