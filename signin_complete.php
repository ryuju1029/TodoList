<?php
require_once(__DIR__ . '/Repository/UserMysqlRepository.php');
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Lib/Session.php');
require_once(__DIR__ . '/Domain/ValueObject/UserEmail.php');
require_once(__DIR__ . '/UseCase/UseCaseInput/UserSignInUseCaseInput.php');
require_once(__DIR__ . '/UseCase/UserSignInUseCase.php');

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$session = Session::getInstance();
$errors = [];

if (empty($email)) $errors['email'] = "Emailを入力してください";
if (empty($password)) $errors['password'] = "Passwordを入力してください";

if (!empty($errors)) {
  $session->setErrors($errors);
  Redirect::handler('/ToDo/signin.php');
}

$useCaseInput = new UserSignInUseCaseInput($email, $password);
$userRepository = new UserMysqlRepository();
$useCase = new UserSignInUseCase($useCaseInput, $userRepository, $session);
$useCaseOutput = $useCase->handler();
Redirect::handler($useCaseOutput->redirectPath());