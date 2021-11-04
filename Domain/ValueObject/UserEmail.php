<?php

final class UserEmail
{
  private $value;

  public function __construct(int $value)
  {
    if (!preg_match('/@/', $value)) {
      throw new Exception("Emailにはメールアドレスを入力してください");
    }
    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}
