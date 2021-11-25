<?php
require_once(__DIR__ . '/../../Domain/Entity/User.php');
require_once(__DIR__ . '/../../Dao/UserDao.php');

/**
 * UserRepositoryのインターフェース
 */
interface UserRepository
{
  /**
   * メールアドレスに一致するでUserエンティティを取得する
   * 
   * @param UserEmail $email
   * @return User|null
   */
  public function findByEmail(UserEmail $email): ?User;
  
  /**
   * NewUserのValueObjectを渡して保存する
   *
   * @param NewUser $user
   * @return void
   */
  public function create(NewUser $user): void;
}
