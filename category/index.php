<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../Lib/Session.php');
require_once(__DIR__ . '/../Repository/CategoryRepository.php');
$session = Session::getInstance();
$errors = $session->getErrorsWithDestroy();
$user_id = $_SESSION['id'];
$userId = new UserId($user_id);
$categoryRepository = new CategoryRepository();
$categories = $categoryRepository->findAll($userId);
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
      <?php foreach ($categories as $category) : ?>
        <tr>
          <td><?php echo $category->name(); ?></td>
          <td><a href="edit.php?id=<?php echo $category->id() ?>">編集</a></td>
          <td><a href="delete.php?id=<?php echo $category->id() ?>">削除</a></td>
        </tr>
      <?php endforeach; ?>
  </form>
  </table>
</div>