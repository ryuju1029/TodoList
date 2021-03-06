<?php

final class CategoryRaws
{
  private $id;
  private $name;
  private $userId;
  private $createdAt;
  private $updatedAt;

  public function __construct(
    int $id,
    string $name,
    int $userId,
    string $createdAt,
    string $updatedAt
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->userId = $userId;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
  }

  public function id(): int
  {
    return $this->id;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function userId(): int
  {
    return $this->userId;
  }

  public function createdAt(): string
  {
    return $this->createdAt;
  }

  public function updatedAt(): string
  {
    return $this->updatedAt;
  }
}
