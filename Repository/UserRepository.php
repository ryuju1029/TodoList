<?php
require_once(__DIR__ . '/../Domain/Entity/User.php');
require_once(__DIR__ . '/../Dao/UserDao.php');

final class UserRepository
{
  private $UserDao;

  public function __construct()
  {
    // TODO: DI(依存性注入)ができていないので、ちょっと良くない
    $this->userDao = new UserDao();
  }

  public function findByEmail(UserEmail $email): ?User
  {
    $userRaw = $this->userDao->findByEmail($email->value());

    if ($userRaw === false) return null;

    $userId = new UserId($userRaw->id());
    $userName = new UserName($userRaw->name());
    $userEmail = new UserEmail($userRaw->email());
    $userPassword = new UserPassword($userRaw->password());

    return new User(
      $userId,
      $userName,
      $userEmail,
      $userPassword
    );
  }

  public function emailsignin(UserEmail $email): ?UserRaw
  {
    $userRaw = $this->userDao->emailsignin($email->value());

    if ($userRaw === false) return null;

    $userId = new UserId($userRaw->id());
    $userName = new UserName($userRaw->name());
    $userEmail = new UserEmail($userRaw->email());
    $userPassword = new UserPassword($userRaw->password());

    return new User(
      $userId,
      $userName,
      $userEmail,
      $userPassword
    );
  }
}
