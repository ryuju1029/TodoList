<?php
require_once(__DIR__ . '/Lib/Session.php');

session_start();
$session = Session::getInstance();
$errorEmail = $session->getErrorsEmailWithDestroy();
$errorPassword = $session->getErrorsPasswordWithDestroy();
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
          <?php if (isset($errorEmail)) : ?>
            <li><?php echo $errorEmail; ?></li>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td class="sigContent"><input type="text" name="email" placeholder="Email" style="width:300px;"></td>
      </tr>
      <tr>
        <td align=left>
          <?php if (isset($errorPassword)) : ?>
            <li><?php echo $errorPassword; ?></li>
          <?php endif; ?>
        </td>
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