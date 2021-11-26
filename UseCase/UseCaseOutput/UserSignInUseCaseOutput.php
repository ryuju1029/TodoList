<?php

final class UserSignInUseCaseOutput
{
  private $isSuccess;
  private $message;
  private $redirectPath;

  public function __construct(bool $isSuccess, string $message, string $redirectPath)
  {
    $this->isSuccess = $isSuccess;
    $this->message = $message;
    $this->redirectPath = $redirectPath;
  }

  public function isSuccess(): bool
  {
    return $this->isSuccess;
  }

  public function message(): array
  {
    $errors['AccountMismatch'] = $this->message;
    return $errors; 
  }

  public function redirectPath(): string
  {
    return $this->redirectPath;
  }
}
