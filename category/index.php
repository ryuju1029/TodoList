<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../Dao/CategoriesDao.php');
session_start();
$user_id = $_SESSION['id'];
$CategoriesDao = new CategoriesDao();
$Categories = $CategoriesDao->findAll($user_id);

?>

<table>
  <form action="/ToDo/category/registrationCategory.php" method="post">
    <tr>
      <td colspan="3">
        <h1>カテゴリ一覧</h1>
      </td>
    </tr>
    <tr>
      <td><input type="text" name="name" placeholder="カテゴリー追加" style="width:100px;"></td>
      <td><button type="submit" name="button">追加</button></td>
    </tr>
    <?php foreach ($Categories as $Category) : ?>
      <tr>
        <td><?php echo $Category->name() ;?></td>
        <td>編集</td>
        <td>削除</td>
      </tr>
    <?php endforeach; ?>
  </form>
</table>