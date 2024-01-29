<?php

function env($key, $default = null) {
  $file = file_get_contents(".env");
  $lines = explode("\n", $file);
  foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line)) continue;
    $line = explode("=", $line);
    if ($line[0] == $key) {
      return $line[1];
    }
  }

  return $default;
}

define("DB_HOST", env("DB_HOST", "localhost"));
define("DB_USER", env("DB_USER", "root"));
define("DB_PASS", env("DB_PASS", ""));
define("DB_NAME", env("DB_NAME", "goquiz"));
