<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$passwordConfirm = filter_input(INPUT_POST, "password_confirm");

session_start();
if (empty($name)) $errorsName = '名前を入れてください';
if (empty($email)) $errorsEmail = 'Emailを入れてください';
if (empty($password)) $errorsPassword = 'Passwordを入れてください';
if (empty($passwordConfirm)) $errorsPasswordConfirm = '確認用Passwordを入れてください';
if ($password !== $passwordConfirm) $errorsPassword = 'passwordが一致しません';
// フォームに入力されたmailがすでに登録されていないかチェック
$userDao = new UserDao();
$user = $userDao->findByEmail($email);

if (isset($user)) $errorsEmail[] = '同じEmailが使用されています';
if (isset($errorsName) || isset($errorsEmail) || isset($errorsPassword)) {
  $_SESSION['errorsName'] = $errorsName;
  $_SESSION['errorsEmail'] = $errorsEmail;
  $_SESSION['errorsPassword'] = $errorsPassword;
  $_SESSION['errorsPasswordConfirm'] = $errorsPasswordConfirm;
  Redirect::handler('/ToDo/signup.php');
  die;
}
// 登録されていなければinsert 
$userDao = new UserDao();
$userDao->createUser($name, $email, $password);
Redirect::handler('/ToDo/index.php');