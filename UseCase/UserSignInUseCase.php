<?php
require_once(__DIR__ . '/../Domain/Entity/NewUser.php');
require_once(__DIR__ . '/../UseCase/UseCaseOutput/UserSignInUseCaseOutput.php');

final class UserSignInUseCase
{
  private $input;
  private $userRepository;
  private $session;

  public function __construct(
    UserSignInUseCaseInput $input,
    UserRepository $userRepository,
    $session
  ) {
    $this->input = $input;
    $this->userRepository = $userRepository;
    $this->session = $session;
  }

  public function handler()
  {
    if (is_null($this->existsUser())) {
      $userSignInUseCaseOutput = new UserSignInUseCaseOutput(false, 'アカウント情報が一致しません', '/ToDo/signin.php');
      $this->session->setErrors($userSignInUseCaseOutput->message());
      return $userSignInUseCaseOutput;
    }

    // 指定したハッシュがパスワードにマッチしているかチェック
    if ($this->verifyPassword()) {
      $userSignInUseCaseOutput = new UserSignInUseCaseOutput(false, 'アカウント情報が一致しません', '/ToDo/signin.php');
      $this->session->setErrors($userSignInUseCaseOutput->message());
      return $userSignInUseCaseOutput;
    }
    $this->holdUserInformation();
    return new UserSignInUseCaseOutput(true, 'アカウント情報が一致しました', '/ToDo/index.php');
  }

  public function findByUserEmail(): ?User
  {
    $userEmail = new UserEmail($this->input->email());
    return $this->userRepository->findByEmail($userEmail);
  }


  public function existsUser(): ?User
  {
    return $this->findByUserEmail();
  }

  public function verifyPassword(): bool
  {
    $user = $this->existsUser();
    return !$user->verifyPassword($this->input->password());
  }

  public function holdUserInformation(): void
  {
    // DBのユーザー情報をセッションに保存
    $this->session->setAuth($this->findByUserEmail()->id()->value(), $this->findByUserEmail()->name()->value());
  }
}
