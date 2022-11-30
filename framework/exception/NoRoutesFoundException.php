<?php

class NoRoutesFoundException extends Exception
{
  public function __construct($message = "No routes have been found")
  {
    parent::__construct($message, "0002");
  }
}