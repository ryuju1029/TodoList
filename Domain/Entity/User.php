<?php

final class User
{
  private $id;
  private $name;
  private $email;
  private $password;

  public function __construct(
    UserId $id,
    UserName $name,
    UserEmail $email,
    UserPassword $password
  )
  {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
  }

  public function id(): UserId
  {
    return $this->id;
  }

  public function name(): UserName
  {
    return $this->name;
  }

  public function email(): UserEmail
  {
    return $this->email;
  }

  public function password(): UserPassword
  {
    return $this->password;
  }
}