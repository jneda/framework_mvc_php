<?php

$configFile = file_get_contents("config/config.json");
$config = json_decode($configFile);

spl_autoload_register(function ($class) use ($config) {
  foreach ($config->autoloadFolders as $folder) {
    if (file_exists($folder . '/' . $class . '.php')) {
      require_once($folder . '/' . $class . '.php');
      break;
    }
  }
});

try {
  $httpRequest = new HttpRequest();
  $router = new Router();
  $httpRequest->setRoute($router->findRoute($httpRequest));
} catch (Exception $e) {
  echo "An error occurred";
}
