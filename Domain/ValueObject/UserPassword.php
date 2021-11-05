<?php

final class UserPassword
{
  private $value;

  public function __construct(string $value)
  {
    if (empty($value)) {
      throw new Exception("Passwordを入力してください");
    }
    $this->value = $value;
  }

  public function value(): string
  {
    return $this->value;
  }
}
