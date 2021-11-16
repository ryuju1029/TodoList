<?php

final class TaskCreatedAt
{
  private $value;

  public function __construct(string $value)
  {
    if ($value < date('Y-m-d')) {
      throw new Exception('Deadlineは過ぎた日程を入力しないでください');
    }

    $this->value = $value;
  }

  public function value(): string
  {
    return $this->value;
  }
}
