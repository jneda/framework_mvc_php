<?php

class MultipleRoutesFoundException extends Exception
{
  public function __construct($message="More than 1 routes have been found")
  {
    parent::__construct($message, "0001");
  }
}