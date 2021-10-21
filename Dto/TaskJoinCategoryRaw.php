<?php

final class TaskJoinCategoryRaw
{
  private $id;
  private $userId;
  private $status;
  private $contents;
  private $categoryId;
  private $createdAt;
  private $updatedAt;
  private $deadline;
  private $categoryName;

  public function __construct(
    int $id,
    int $userId,
    string $status,
    string $contents,
    int $categoryId,
    string $deadline,
    string $createdAt,
    string $updatedAt,
    string $categoryName
  ) {
    $this->id = $id;
    $this->userId = $userId;
    $this->status = $status;
    $this->contents = $contents;
    $this->categoryId = $categoryId;
    $this->deadline = $deadline;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
    $this->categoryName = $categoryName;
  }

  public function id(): int
  {
    return $this->id;
  }

  public function userId(): int
  {
    return $this->userId;
  }

  public function status(): int
  {
    return $this->status;
  }

  public function contents(): string
  {
    return $this->contents;
  }

  public function categoryId(): int
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

  public function categoryName(): string
  {
    return $this->categoryName;
  }
}
