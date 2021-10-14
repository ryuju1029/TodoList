<?php
require_once(__DIR__ . '/Lib/Session.php');

session_start();
$session = Session::getInstance();
$errors = $session->getErrorsWithDestroy();
?>

<link rel="stylesheet" href="style.css">
<div class="sig">


  <form action="signup_complete.php" method="post">

    <table align="center" class="sigTable">
      <tr>
        <th>新規登録</th>
      </tr>
      <tr>
        <td align=left>
          <?php foreach ($errors as $error) : ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </td>
      </tr>
      <tr>
        <td class="sigcontent"><input type="text" name="name" placeholder="User name" style="width:300px;"></td>
      </tr>
      <tr>
        <td class="sigcontent"><input type="text" name="email" placeholder="Email" style="width:300px;"></td>
      </tr>
      <tr>
        <td class="sigcontent"><input type="password" name="password" placeholder="Password" style="width:300px;"></td>
      </tr>
      <tr>
        <td class="sigcontent"><input type="password" name="password_confirm" placeholder="Password確認" style="width:300px;"></td>
      </tr>
      <tr>
        <td class="signupTable" align="center"><button type="submit" name="button">アカウント作成</button></td>
      </tr>
      <tr>
        <td align="center"><a href="./signin.php">ログイン画面へ</a></td>
      </tr>
    </table>
  </form>
</div>