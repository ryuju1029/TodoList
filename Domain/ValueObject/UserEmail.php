<?php

final class UserEmail
{
  private $value;

  public function __construct(string $value)
  {
    if (!preg_match('/@/', $value)) {
      throw new Exception("Emailにはメールアドレスを入力してください");
    }
    $this->value = $value;
  }

  public function value(): string
  {
    return $this->value;
  }
}
