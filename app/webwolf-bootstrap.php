<?php

namespace WebWolf;


spl_autoload_register(function ($class) {

  $prefix = __NAMESPACE__ . '\\';
  $base_dir = WW_ENGINE_DIR . 'app/';

  $len = strlen($prefix);

  if (strncmp($prefix, $class, $len) !== 0) {
    return;
  }

  $relative_class = substr($class, $len);
  $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

  if (file_exists($file)) {
    require $file;
  }
});

App::instance();

