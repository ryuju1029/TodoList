<?php
require_once(__DIR__ . '/Dao/UserDao.php');
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

$userDao = new UserDao();
$user = $userDao->emailsignin($email);

session_start();
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($password, $user->password())) {
  //DBのユーザー情報をセッションに保存
  $_SESSION['id'] = $user->id();
  $_SESSION['name'] = $user->name();
  $msg = 'ログインしました。';
  $link = '<a href="index.php">ホーム</a>';
} else {
  $msg = 'メールアドレスもしくはパスワードが間違っています。';
  $link = '<a href="signin.php">戻る</a>';
}
?>

<?php echo $msg; ?>
<?php echo $link; ?> 