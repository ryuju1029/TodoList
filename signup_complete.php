<?php
require_once(__DIR__ . '/Repository/UserRepository.php');
require_once(__DIR__ . '/Domain/Entity/User.php');
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Lib/Session.php');
require_once(__DIR__ . '/UseCase/UseCaseInput/UserSignUpUseCaseInput.php');
require_once(__DIR__ . '/UseCase/UserSignUpUseCase.php');
$session = Session::getInstance();
$errors = [];
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$passwordConfirm = filter_input(INPUT_POST, "password_confirm");

if (empty($name)) $errors['name'] = '名前を入れてください';
if (empty($email)) $errors['email'] = 'Emailを入れてください';
if (empty($password)) $errors['password'] = 'Passwordを入れてください';
if (empty($passwordConfirm)) $errors['passwordConfirm'] = '確認用Passwordを入れてください';
if ($password !== $passwordConfirm) $errors['password'] = 'passwordが一致しません';


$useCaseInput = new UserSignUpUseCaseInput($name, $email, $password);
$useCase = new UserSignUpUseCase($useCaseInput);
$useCaseOutput = $useCase->handler();

if (!$useCaseOutput->isSuccess()) {
  $errors['name'] = $useCaseOutput->message();
  $session->setErrors($errors);
}

Redirect::handler($useCaseOutput->redirectPath());
