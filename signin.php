<?php
require_once(__DIR__ . '/Lib/Session.php');

session_start();
$session = Session::getInstance();
$errors = $session->getErrorsWithDestroy();
?>

<link rel="stylesheet" href="style.css">
<div class="sig">
  <form action="signin_complete.php" method="post">
    <table align="center" class="sigTable">
      <tr>
        <th class="sigContent">ログイン</th>
      </tr>
      <tr>
        <td align=left>
          <?php foreach ($errors as $error) : ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </td>
      </tr>
      <tr>
        <td class="sigContent"><input type="text" name="email" placeholder="Email" style="width:300px;"></td>
      </tr>
      <tr>
        <td class="sigContent"><input type="password" name="password" placeholder="Password" style="width:300px;"></td>
      </tr>
      <tr>
        <td class="sigContentButton" align="center"><button type="submit" name="button">ログイン</button></td>
      </tr>
      <tr>
        <td align="center"><a href="./signup.php">アカウントを作る</a></td>
      </tr>
    </table>
  </form>
</div>