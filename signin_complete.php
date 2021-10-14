<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
session_start();
if(empty($email)) $errors[] = "Emailを入力してください";
if(empty($password)) $errors[] = "Passwordを入力してください";
if (isset($errors)) {
  $_SESSION['errors'] = $errors;
  Redirect::handler('/ToDo/signin.php');
  die;
}
$userDao = new UserDao();
$user = $userDao->emailsignin($email);

session_start();
if(isset($user)){
  //指定したハッシュがパスワードにマッチしているかチェック
  if (password_verify($password, $user->password()) && isset($user)) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $user->id();
    $_SESSION['name'] = $user->name();
    Redirect::handler('/ToDo/index.php');
  } else {
    $errors[] =  "Passwordが一致しません";
    $_SESSION['errors'] = $errors;
    Redirect::handler('/ToDo/signin.php');
  }
}else{
  $errors[] =  "Emailが一致しません";
  $_SESSION['errors'] = $errors;
  Redirect::handler('/ToDo/signin.php');
}

?>
