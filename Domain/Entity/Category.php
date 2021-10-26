<?php

final class Category
{
  private $id;
  private $UserId;

  public function __construct(
    CategoryId $id,
    CategoryUserId $UserId
  ) {
    $this->id = $id;
    $this->UserId = $UserId;
  }

  public function id(): CategoryId
  {
    return $this->id;
  }

  public function UserId(): CategoryUserId
  {
    return $this->UserId;
  }
}
