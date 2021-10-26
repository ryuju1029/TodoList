<?php

final class User
{
  private $id;

  public function __construct(
    UserId $id
  )
  {
    $this->id = $id;
  }

  public function id(): UserId
  {
    return $this->id;
  }
}