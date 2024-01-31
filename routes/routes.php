<?php

use Controller\_403Controller;
use Controller\_404Controller;
use Controller\AuthController;
use Controller\HomeController;

define('ROUTES', [
  '/error/403' => [_403Controller::class, 'index'],

  '/' => [HomeController::class, 'index'],
  '/login' => [AuthController::class, 'login'],
  '/register' => [AuthController::class, 'register'],
]);

define('DEFAULT_CONTROLLER', _404Controller::class);
define('DEFAULT_METHOD', 'index');
