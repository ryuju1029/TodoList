<?php
require_once(__DIR__ . '/../ValueObject/UserEmail.php');
require_once(__DIR__ . '/../ValueObject/UserId.php');
require_once(__DIR__ . '/../ValueObject/UserName.php');
require_once(__DIR__ . '/../ValueObject/UserPassword.php');


/**
 * 会員登録時のUserエンティティ
 */
final class NewUser
{
  private $name;
  private $email;
  private $password;

  public function __construct(
    UserName $name,
    UserEmail $email,
    UserPassword $password
  ) {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
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
