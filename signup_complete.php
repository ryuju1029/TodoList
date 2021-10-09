<?php
require_once(__DIR__ . '/Dao/UserDao.php');
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$passwordConfirm = filter_input(INPUT_POST, "password_confirm");

if ($password !== $passwordConfirm) {
  echo '<h1>パスワードが一致しません</h1>';
  echo '<a href="signup.php">戻る</a>';
  die;
}
// フォームに入力されたmailがすでに登録されていないかチェック
$userDao = new UserDao();
$user = $userDao->findByEmail($email);

if (!empty($user)) {
  echo '<h1>同じメールアドレスが存在します。</h1>';
  echo '<a href="signup.php">戻る</a>';
  die;
}
// 登録されていなければinsert 
$userDao = new UserDao();
$userDao->createUser($name, $email, $password);
?>

<h1>会員登録が完了しました</h1>
<a href="signin.php">戻る</a>