<?php
require_once(__DIR__ . '/../Domain/Entity/NewUser.php');
require_once(__DIR__ . '/../UseCase/UseCaseOutput/UserSignUpUseCaseOutput.php');

final class UserSignUpUseCase
{
  /**
   * ユーザー新規登録ユースケースを実行するために必要な入力値
   * 
   * 今回は「名前」「メールアドレス」「パスワード」
   */
  private $input;
  private $userRepository;

  public function __construct(UserSignUpUseCaseInput $input)
  {
    $this->input = $input;
    // TODO: DI(依存性注入)した方が望ましい
    $this->userRepository = new UserRepository();
  }

  /**
   * ユースケースクラスは一つだけのpublicメソッドを持つように作る
   */
  public function handler(): UserSignUpUseCaseOutput
  {
    if ($this->existsUser()) {
      return new UserSignUpUseCaseOutput(false, '同じEmailが使用されています', '/ToDo/signup.php');
    }

    $this->createUser();
    return new UserSignUpUseCaseOutput(true, 'ユーザー登録に成功しました', '/ToDo/index.php');
  }

  /**
   * メールアドレスでユーザーを検索する処理
   * 
   * @return User|null
   */
  private function findUserByEmail(): ?User
  {
    $userEmail = new UserEmail($this->input->email());
    return $this->userRepository->findByEmail($userEmail);
  }

  /**
   * ユーザー登録処理
   */
  private function createUser(): void
  {
    $userName = new UserName($this->input->name());
    $userEmail = new UserEmail($this->input->email());
    $userPassword = new UserPassword($this->input->password());
    $user = new NewUser(
      $userName,
      $userEmail,
      $userPassword
    );
    $this->userRepository->create($user);
  }

  /**
   * すでにユーザーが存在するかの判定
   * 
   * @return bool 存在する場合はtrue
   */
  private function existsUser(): bool
  {
    $user = $this->findUserByEmail();
    return !is_null($user);
  }
}
