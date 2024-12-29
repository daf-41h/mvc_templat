<?php

function load_core($className) {
  $path_to_file = '../src/core/'.$className.'.php';
  if(file_exists($path_to_file)) {
    require_once ($path_to_file);
  }
}

spl_autoload_register('load_core');