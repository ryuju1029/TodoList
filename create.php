<?php
require_once('header.php');
require_once(__DIR__ . '/Dao/CategoryDao.php');
require_once(__DIR__ . '/Lib/Session.php');
session_start();

$session = Session::getInstance();
$errorContent = $session->getErrorContentWithDestroy();
$errorDeadline = $session->getErrorDeadlineWithDestroy();

$user_id = $session->get('id');

$CategoryDao = new CategoryDao();
$categories = $CategoryDao->findAll($user_id);
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
        <td><?php if (isset($errorContent)) : ?> <li><?php echo $errorContent; ?></li> <?php endif; ?></td>
        <td><?php if (isset($errorDeadline)) : ?> <li><?php echo $errorDeadline; ?></li> <?php endif; ?></td>
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