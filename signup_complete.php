<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Lib/Session.php');
$session = Session::getInstance();
$errors = [];
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$passwordConfirm = filter_input(INPUT_POST, "password_confirm");

session_start();
if (empty($name)) $errors['name'] = '名前を入れてください';
if (empty($email)) $errors['email'] = 'Emailを入れてください';
if (empty($password)) $errors['password'] = 'Passwordを入れてください';
if (empty($passwordConfirm)) $errors['passwordConfirm'] = '確認用Passwordを入れてください';
if ($password !== $passwordConfirm) $errors['password'] = 'passwordが一致しません';
// フォームに入力されたmailがすでに登録されていないかチェック
$userDao = new UserDao();
$user = $userDao->findByEmail($email);

if (!empty($user)) $errors['email'] = '同じEmailが使用されています';
if (!empty($errors)) {
  $session->setErrors($errors);
  Redirect::handler('/ToDo/signup.php');
  die;
}
// 登録されていなければinsert 
$userDao = new UserDao();
$userDao->createUser($name, $email, $password);
Redirect::handler('/ToDo/index.php');