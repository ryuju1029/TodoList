<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Lib/Session.php');

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

$userDao = new UserDao();
$user = $userDao->emailsignin($email);


// ガード節
// ユーザーが見つからなかったとき
if (empty($user)) {
  $errors['AccountMismatch'] = "アカウント情報が一致しません";
  $session->setErrors($errors);
  Redirect::handler('/ToDo/signin.php');
}

// 指定したハッシュがパスワードにマッチしているかチェック
if (!password_verify($password, $user->password())) {
  $errors['AccountMismatch'] = "アカウント情報が一致しません";
  $session->setErrors($errors);
  Redirect::handler('/ToDo/signin.php');
}

// DBのユーザー情報をセッションに保存
$_SESSION['id'] = $user->id();
$_SESSION['name'] = $user->name();
Redirect::handler('/ToDo/index.php');