<?php
require_once(__DIR__ . '/Repository/UserMysqlRepository.php');
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Lib/Session.php');
require_once(__DIR__ . '/Domain/ValueObject/UserEmail.php');

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

$userRepository = new UserMysqlRepository();
$userEmail = new UserEmail($email);
$user = $userRepository->findByEmail($userEmail);


// ガード節
// ユーザーが見つからなかったとき
if (is_null($user)) {
  $errors['AccountMismatch'] = "アカウント情報が一致しません";
  $session->setErrors($errors);
  Redirect::handler('/ToDo/signin.php');
}

// 指定したハッシュがパスワードにマッチしているかチェック
if (!$user->verifyPassword(($password))) {
  $errors['AccountMismatch'] = "アカウント情報が一致しません";
  $session->setErrors($errors);
  Redirect::handler('/ToDo/signin.php');
}

// DBのユーザー情報をセッションに保存
$session->setAuth($user->id()->value(), $user->name()->value());
Redirect::handler('/ToDo/index.php');