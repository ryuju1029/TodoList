<?php

final class TaskRaws
{
  private $id;
  private $userId;
  private $status;
  private $contents;
  private $categoryId;
  private $createdAt;
  private $updatedAt;
  private $deadline;
  private $name;

  public function __construct(
    int $id,
    string $userId,
    string $status,
    string $contents,
    string $categoryId,
    string $deadline,
    string $createdAt,
    string $updatedAt,
    string $name
  ) {
    $this->id = $id;
    $this->email = $userId;
    $this->status = $status;
    $this->contents = $contents;
    $this->categoryId = $categoryId;
    $this->deadline = $deadline;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
    $this->name = $name;
  }

  public function id(): int
  {
    return $this->id;
  }

  public function userId(): string
  {
    return $this->userId;
  }

  public function status(): string
  {
    return $this->status;
  }

  public function contents(): string
  {
    return $this->contents;
  }

  public function categoryId(): string
  {
    return $this->categoryId;
  }

  public function deadline(): string
  {
    return $this->deadline;
  }

  public function createdAt(): string
  {
    return $this->createdAt;
  }

  public function updatedAt(): string
  {
    return $this->updatedAt;
  }

  public function name(): string
  {
    return $this->name;
  }
}
