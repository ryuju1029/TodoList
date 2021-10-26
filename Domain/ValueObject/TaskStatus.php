<?php

final class TaskStatus
{
  private $value;

  public function __construct(int $value)
  {
    if ($value < 0 || $value > 1) {
      throw new Exception('Statusは0か1で指定してください');
    }

    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}
