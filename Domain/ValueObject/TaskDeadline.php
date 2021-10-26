<?php

final class TaskDeadline
{
  private $value;

  public function __construct(int $value)
  {
    if ($value < date('Y-m-d')) {
      throw new Exception('Deadlineは過ぎた日程を入力しないでください');
    }

    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}
