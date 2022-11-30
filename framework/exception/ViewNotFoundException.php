<?php

class ViewNotFoundException extends Exception
{
  public function __construct($message="The view has not been found")
  {
    parent::__construct($message, "0003");
  }
}