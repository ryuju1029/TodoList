<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
session_start();
if(empty($email)) $errorsEmail = "Emailを入力してください";
if(empty($password)) $errorsPassword = "Passwordを入力してください";
if (isset($errorsEmail) || isset($errorsPassword)) {
  $_SESSION['errorsEmail'] = $errorsEmail;
  $_SESSION['errorsPassword'] = $errorsPassword;

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
    $errorsPassword =  "Passwordが一致しません";
    $_SESSION['errorsPassword'] = $errorsPassword;
    Redirect::handler('/ToDo/signin.php');
  }
}else{
  $errorsEmail =  "Emailが一致しません";
  $_SESSION['errorsEmail'] = $errorsEmail;
  Redirect::handler('/ToDo/signin.php');
}

?>
