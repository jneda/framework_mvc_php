<?php

class BDD
{
  private $bdd;
  private static $instance;

  public static function getInstance($datasource)
  {
    if (empty(self::$instance)) {
      self::$instance = new BDD($datasource);
    }
    return self::$instance->bdd;
  }

  private function __construct($datasource)
  {
    $this->bdd = new PDO("mysql:dbname=" . $datasource->dbname . ";host="
      . $datasource->host, $datasource->user, $datasource->password);
  }
}
