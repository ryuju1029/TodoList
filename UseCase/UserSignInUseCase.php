<?php
require_once(__DIR__ . '/../Domain/Entity/NewUser.php');
require_once(__DIR__ . '/../UseCase/UseCaseOutput/UserSignInUseCaseOutput.php');
require_once(__DIR__ . '/../Lib/Redirect.php');

final class UserSignInUseCase
{
  private $input;
  private $userRepository;
  private $session;

  public function __construct(
    UserSignInUseCaseInput $input,
    UserRepository $userRepository,
    Session $session
  ) {
    $this->input = $input;
    $this->userRepository = $userRepository;
    $this->session = $session;
  }

  public function handler()
  {
    $user = $this->existsUser();
    // 指定したハッシュがパスワードにマッチしているかチェック
    if ($this->verifyPassword($user)) {
      $this->putErrorMessageInSession();
    }
    $this->holdUserInformation($user);
    return new UserSignInUseCaseOutput(true, 'アカウント情報が一致しました', '/ToDo/index.php');
  }

  public function existsUser(): User
  {
    $user = $this->findByUserEmail();
    if (is_null($user)) {
      $this->putErrorMessageInSession();
    }
    return $user;
  }

  public function findByUserEmail(): ?User
  {
    $userEmail = new UserEmail($this->input->email());
    return $this->userRepository->findByEmail($userEmail);
  }

  public function putErrorMessageInSession(): void
  {
    $userSignInUseCaseOutput = new UserSignInUseCaseOutput(false, 'アカウント情報が一致しません', '/ToDo/signin.php');
    $errors['AccountMismatch'] = $userSignInUseCaseOutput->message();
    $this->session->setErrors($errors);
    Redirect::handler('/ToDo/signin.php');
  }

  public function verifyPassword($user): bool
  {
    return !$user->verifyPassword($this->input->password());
  }

  public function holdUserInformation($user): void
  {
    // DBのユーザー情報をセッションに保存
    $this->session->setAuth($user->id()->value(), $user->name()->value());
  }
}
