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
  private $deadiine;

  public function __construct(
    int $id,
    string $userId,
    string $status,
    string $contents,
    string $categoryId,
    string $deadiine,
    string $createdAt,
    string $updatedAt
  ) {
    $this->id = $id;
    $this->email = $userId;
    $this->status = $status;
    $this->contents = $contents;
    $this->categoryId = $categoryId;
    $this->deadiine = $deadiine;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
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

  public function deadiine(): string
  {
    return $this->deadiine;
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
