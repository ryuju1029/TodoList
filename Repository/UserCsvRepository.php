<?php
require_once(__DIR__ . '/../Domain/Entity/User.php');
require_once(__DIR__ . '/../Dao/UserDao.php');
require_once(__DIR__ . '/../UseCase/RepositoryInterface/UserRepository.php');

final class UserCsvRepository implements UserRepository
{
  private $userCsvDao;

  public function __construct()
  {
    // TODO: DI(依存性注入)ができていないので、ちょっと良くない
    $this->userCsvDao = new UserDao();
  }

  public function findByEmail(UserEmail $email): ?User
  {
    $userRaw = $this->userCsvDao->findByEmail($email->value());

    if (is_null($userRaw)) return null;

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

  public function create(NewUser $user): void
  {
    $name = $user->name()->value();
    $email = $user->email()->value();
    $password = $user->password()->value();
    $this->userCsvDao->createUser($name, $email, $password);
  }
}
