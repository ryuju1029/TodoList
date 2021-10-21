<?php
require_once(__DIR__ . '/Dao/TaskDao.php');
require_once(__DIR__ . '/Dao/CategoryDao.php');
require_once(__DIR__ . '/Lib/Session.php');

$id = filter_input(INPUT_GET, "id");
$taskDao = new TaskDao();
$task = $taskDao->findById($id);

$session = Session::getInstance();
$user_id = $session->get('id');
$CategoryDao = new CategoryDao();
$categories = $CategoryDao->findAll($user_id);

?>
<link rel="stylesheet" href="/ToDo/style.css">

<h1 style="text-align:center">タスク編集</h1>

<form action="update.php" method="post">
  <input type="hidden" name="id" value="<?php if (!empty($task->id())) echo (htmlspecialchars($task->id(), ENT_QUOTES, 'UTF-8')); ?>">
  <table align="center">
    <tr>
      <td>
        <select name="category_id">
          <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category->id(); ?>"><?php echo $category->name(); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </td>
      <td><input type="text" name="contents" value="<?php if (!empty($task->contents())) echo (htmlspecialchars($task->contents(), ENT_QUOTES, 'UTF-8')); ?>"></td>
      <td><input type="date" name="deadline" value="<?php if (!empty($task->deadline())) echo (htmlspecialchars($task->deadline(), ENT_QUOTES, 'UTF-8')); ?>"></td>
      <td><button type="submit" name="button">追加</button></td>
  </table>

</form>