<?php

class HttpRequest
{
  private $url;
  private $method;
  private $params;

  public function __construct()
  {
    $this->url = $_SERVER['REQUEST_URI'];
    $this->method = $_SERVER['REQUEST_METHOD'];
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
}