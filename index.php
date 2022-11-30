<?php

$configFile = file_get_contents("config/config.json");
$config = json_decode($configFile);

spl_autoload_register(function($class) use ($config) {
  foreach($config->autoloadFolders as $folder) {
    if (file_exists($folder . '/' . $class . '.php')) {
      require_once($folder . '/' . $class . '.php');
      break;
    }
  }
});