<?php

abstract class Dao
{
  protected $pdo;

  public function __construct()
  {
    $dsn = 'mysql:dbname=Todo;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $this->pdo = new PDO($dsn, $user, $password);
  }
}
