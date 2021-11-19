<?php
require_once(__DIR__ . '/Lib/Session.php');
require_once(__DIR__ . '/Repository/TaskRepository.php');
require_once(__DIR__ . '/Repository/CategoryRepository.php');
require_once(__DIR__ . '/Lib/Session.php');

$id = filter_input(INPUT_GET, "id");

$taskRepository = new TaskRepository();
$taskId = new TaskId($id);
$task = $taskRepository->findById($taskId);
$session = Session::getInstance();
$user_id = $session->get('id');
$categoryRepository = new CategoryRepository();
$userId = new UserId($user_id);
$categories = $categoryRepository->findAll($userId);
?>
<link rel="stylesheet" href="/ToDo/style.css">

<h1 style="text-align:center">タスク編集</h1>

<form action="update.php" method="post">
  <input type="hidden" name="id" value="<?php if (!empty($task->id()->value())) echo (htmlspecialchars($task->id()->value(), ENT_QUOTES, 'UTF-8')); ?>">
  <input type="hidden" name="status" value="<?php if (!empty($task->status()->value())) echo (htmlspecialchars($task->status()->value(), ENT_QUOTES, 'UTF-8')); ?>">
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
      <td><input type="text" name="contents" value="<?php if (!empty($task->contents())) echo (htmlspecialchars($task->contents()->value(), ENT_QUOTES, 'UTF-8')); ?>"></td>
      <td><input type="date" name="deadline" value="<?php if (!empty($task->deadline())) echo (htmlspecialchars($task->deadline()->format("Y/m/d/"), ENT_QUOTES, 'UTF-8')); ?>"></td>
      <td><button type="submit" name="button">追加</button></td>
  </table>

</form>