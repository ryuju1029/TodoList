<?php
require_once(__DIR__ . '/Dao/UserDao.php');
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$passwordConfirm = filter_input(INPUT_POST, "password_confirm");

if ($password !== $passwordConfirm) {
  header('Location: signup.php');
  die;
}
// フォームに入力されたmailがすでに登録されていないかチェック
$userDao = new UserDao();
$user = $userDao->findByEmail($email);

if (!empty($user)) {
  header('Location: signup.php');
  die;
}
// 登録されていなければinsert 
$userDao = new UserDao();
$userDao->createUser($name, $email, $password);
header('Location: index.php');
?>
