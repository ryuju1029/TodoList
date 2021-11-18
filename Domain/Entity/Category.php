<?php
require_once(__DIR__ . '/../ValueObject/CategoryId.php');
require_once(__DIR__ . '/../ValueObject/UserId.php');
require_once(__DIR__ . '/../ValueObject/CategoryName.php');

final class Category
{
  private $id;
  private $userId;
  private $name;

  public function __construct(
    CategoryId $id,
    UserId $userId,
    categoryName $name
  ) {
    $this->id = $id;
    $this->userId = $userId;
    $this->name = $name;
  }

  public function id(): CategoryId
  {
    return $this->id;
  }

  public function userId(): UserId
  {
    return $this->userId;
  }

  public function name(): CategoryName
  {
    return $this->name;
  }
}
