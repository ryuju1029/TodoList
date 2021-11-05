<?php
require_once(__DIR__ . '/../ValueObject/UserEmail.php');
require_once(__DIR__ . '/../ValueObject/UserId.php');
require_once(__DIR__ . '/../ValueObject/UserName.php');
require_once(__DIR__ . '/../ValueObject/UserPassword.php');


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
  ) {
    $this->id = $id;
    $this->name = $name;
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

  /**
   * ユーザーが入力したパスワードを検証する。
   *
   * @param string $inputPassword 入力されたパスワード
   * @return boolean パスワードが正しければtrue
   */
  public function verifyPassword(string $inputPassword): bool
  {
    return password_verify($inputPassword, $this->password->value());
  }
}
