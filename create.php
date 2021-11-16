<?php
require_once('header.php');
require_once(__DIR__ . '/Lib/Session.php');
require_once(__DIR__ . '/Repository/CategoryRepository.php');
$session = Session::getInstance();
$errors = $session->getErrorsWithDestroy();
$userId = $session->get('id');
$categoryRepository = new CategoryRepository();
$userId = new UserId($userId);
$categories = $categoryRepository->findAll($userId);
?>

<link rel="stylesheet" href="/ToDo/style.css">

<div class="homeDody">
  <form action="add_task_complete.php" method="post">
    <table align="center">
      <tr>
        <td colspan="3" align="center">
          <h1>タスクを追加</h1>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><?php if (!empty($errors['content'])) : ?> <li><?php echo $errors['content']; ?></li> <?php endif; ?></td>
        <td><?php if (!empty($errors['deadline'])) : ?> <li><?php echo $errors['deadline']; ?></li> <?php endif; ?></td>
      </tr>
      <tr>
        <td>
          <select name="category_id">
            <?php foreach ($categories as $category) : ?>
              <option value="<?php echo $category->id(); ?>"><?php echo $category->name(); ?></option>
            <?php endforeach; ?>
          </select>
        </td>
        <td><input type="text" name="contents" placeholder="タスクを追加" style="width:220px;"></td>
        <td><input type="date" name="deadline" style="width:220px;"></td>
        <td><button type="submit" name="button">追加</button></td>
      </tr>
    </table>
  </form>
</div>