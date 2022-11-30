<?php

class HttpRequest
{
  private $url;
  private $method;
  private $params;
  private $route;

  public function __construct()
  {
    $this->url = $_SERVER['REQUEST_URI'];
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->params = array();
  }

  public function getUrl()
  {
    return $this->url;
  }

  public function getMethod()
  {
    return $this->method;
  }

  public function getParams()
  {
    return $this->params;
  }

  public function setRoute($route)
  {
    $this->route = $route;
  }

  public function bindParam()
  {
    switch($this->method)
    {
      case "GET":
      case "DELETE":
        if (preg_match("#" . $this->route->path . "#", $this->url, $matches)) {
          for ($i = 1; $i < count($matches); $i++) {
            $this->params[] = $matches[$i];
          }
        }
      
      case "POST":
      case "PUT":
        foreach($this->route->getParams as $param) {
          if (isset($_POST[$param])) {
            $this->params[] = $_POST[$param];
          }
        }
    }
  }
}
