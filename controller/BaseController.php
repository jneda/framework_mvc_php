<?php

class BaseController
{
  private $httpRequest;
  private $params;

  public function __construct($httpRequest)
  {
    $this->httpRequest = $httpRequest;
  }

  protected function view($filename)
  {
    if (file_exists("view/" . $filename . "php")) {
      ob_start();
      extract($this->params);
      include("view/" . $filename . ".php");
      $content = ob_get_clean();
    } else {
      throw new ViewNotFoundException();
    }
    
  }

  public function bindManager()
  {

  }

  public function addParam($name, $value)
  {
    $this->params[$name] = $value;
  }
}