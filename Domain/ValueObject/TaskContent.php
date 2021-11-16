<?php

final class TaskContent
{
  private $value;

  public function __construct(string $value)
  {
    if (empty($value)) {
      throw new Exception('contentは文字を入力してください');
    }

    $this->value = $value;
  }

  public function value(): string
  {
    return $this->value;
  }
}
