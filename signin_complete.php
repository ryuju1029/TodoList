<?php
require_once(__DIR__ . '/Dao/UserDao.php');

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

$userDao = new UserDao();
$user = $userDao->emailsignin($email);

session_start();
if(isset($user)){
  //指定したハッシュがパスワードにマッチしているかチェック
  if (password_verify($password, $user->password()) && isset($user)) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $user->id();
    $_SESSION['name'] = $user->name();
    header('Location: index.php');
  } else {
    header('Location: signin.php');
  }
}else{
  header('Location: signin.php');
}

?>
