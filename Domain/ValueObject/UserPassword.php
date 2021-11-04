<?php

final class UserPassword
{
  private $value;

  public function __construct(int $value)
  {
    if (empty($value)) {
      throw new Exception("Passwordを入力してください");
    }
    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}
