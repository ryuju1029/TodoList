<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../Dao/CategoryDao.php');
require_once(__DIR__ . '/../Lib/Session.php');
$session = Session::getInstance();
$errors = $session->getErrorsWithDestroy();
$user_id = $_SESSION['id'];
$CategoryDao = new CategoryDao();
$Categories = $CategoryDao->findAll($user_id);
?>
<link rel="stylesheet" href="/ToDo/style.css">

<div class="homeDody">
  <form action="/ToDo/category/registrationCategory.php" method="post">
    <table align="center" class="categoryTable">
      <tr>
        <td colspan="3">
          <h1>カテゴリ一覧</h1>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <?php if (!empty($errors['name'])) : ?>
            <li><?php echo $errors['name']; ?></li>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td><input type="text" name="name" placeholder="カテゴリー追加" style="width:100px;"></td>
        <td><button type="submit" name="button">追加</button></td>
      </tr>
      <?php foreach ($Categories as $Category) : ?>
        <tr>
          <td><?php echo $Category->name(); ?></td>
          <td><a href="edit.php?id=<?php echo $Category->id() ?>">編集</a></td>
          <td><a href="delete.php?id=<?php echo $Category->id() ?>">削除</a></td>
        </tr>
      <?php endforeach; ?>
  </form>
  </table>
</div>