<?php

class Router
{
  private $listRoute;

  public function __construct()
  {
    $stringRoute = file_get_contents('config/route.json');
    $this->listRoute = json_decode($stringRoute);
  }

  public function findRoute($httpRequest)
  {
    $routeFound = array_filter($this->listRoute, function ($route) use ($httpRequest) {
      return preg_match("#^" . $route->path . "$#", $httpRequest->getUrl()) && $route->method === $httpRequest->getMethod();
    });

    $numberRoutes = count($routeFound);
    if ($numberRoutes > 1) {
      throw new MultipleRoutesFoundException();
    } else if ($numberRoutes === 0) {
      throw new NoRoutesFoundException();
    } else {
      return new Route(array_shift($routeFound));
    }
  }
}
