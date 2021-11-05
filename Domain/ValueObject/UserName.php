<?php

final class UserName
{
  private $value;

  public function __construct(string $value)
  {
    if (empty($value)) {
      throw new Exception("Nameを入力してください");
    }
    $this->value = $value;
  }

  public function value(): string
  {
    return $this->value;
  }
}
