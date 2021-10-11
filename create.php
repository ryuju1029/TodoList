<?php
require_once('header.php');
?>

<table>
  <form action="signup_complete.php" method="post">
    <tr>
      <td colspan="3">
        <h1>タスクを追加</h1>
      </td>
    </tr>
    <tr>
      <td><input type="text" name="name" placeholder="カテゴリーを追加" style="width:100px;"></td>
      <td><input type="text" name="name" placeholder="タスクを追加" style="width:100px;"></td>
      <td><input type="text" name="name" placeholder="User name" style="width:100px;"></td>
      <td><button type="submit" name="button">追加</button></td>
    </tr>
  </form>
</table>