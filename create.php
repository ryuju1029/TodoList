<?php
require_once('header.php');
require_once(__DIR__ . '/Dao/CategoriesDao.php');
session_start();
$user_id = $_SESSION['id'];
$CategoriesDao = new CategoriesDao();
$Categories = $CategoriesDao->findAll($user_id);
?>

<link rel="stylesheet" href="/ToDo/style.css">

<div class="homeDody">
  <table align="center">
    <form action="add_task_complete.php" method="post">
      <tr>
        <td colspan="3" align="center">
          <h1>タスクを追加</h1>
        </td>
      </tr>
      <tr>
        <td>
          <select name="category">
            <?php foreach ($Categories as $Category) : ?>
              <option><?php echo $Category->name(); ?></option>
            <?php endforeach; ?>
          </select>
        </td>
        <td><input type="text" name="contents" placeholder="タスクを追加" style="width:130px;"></td>
        <td><input type="date" name="deadiine" style="width:140px;"></td>
        <td><button type="submit" name="button">追加</button></td>
      </tr>
    </form>
  </table>
</div>