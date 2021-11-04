<?php

final class TaskContent
{
  private $value;

  public function __construct(int $value)
  {
    if (empty($value)) {
      throw new Exception('contentは文字を入力してください');
    }

    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}
