<?php

final class UserRaw
{
  private $id;
  private $name;
  private $email;
  private $password;
  private $createdAt;
  private $updatedAt;

  public function __construct(
    int $id,
    string $name,
    string $email,
    string $password,
    string $createdAt,
    string $updatedAt
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
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

  public function email(): string
  {
    return $this->email;
  }

  public function password(): string
  {
    return $this->password;
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
