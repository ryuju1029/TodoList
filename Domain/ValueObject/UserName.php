<?php

final class UserName
{
  private $value;

  public function __construct(int $value)
  {
    if (empty($value)) {
      throw new Exception("Nameを入力してください");
    }
    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}
