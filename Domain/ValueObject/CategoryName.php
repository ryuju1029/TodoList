<?php

final class CategoryName
{
  private $value;

  public function __construct(string $value)
  {
    if (empty($value)) {
      throw new Exception('CategoryNameを入力してください');
    }

    $this->value = $value;
  }

  public function value(): string
  {
    return $this->value;
  }
}
