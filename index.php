<?php
require_once('header.php');
//require_once('Dao/TaskDao.php');
require_once(__DIR__ . '/Repository/TaskRepository.php');
session_start();
if (empty($_SESSION['id'])) header('Location: top.php');
$user_id = $_SESSION['id'];
$status = 0;
if (isset($_POST['incomplete'])) $status = 0;
if (isset($_POST['completion'])) $status = 1;
$taskRepository = new TaskRepository();
$contents = filter_input(INPUT_POST, "contents");
$order = filter_input(INPUT_POST, "order") == "asc" ? "asc" : "desc";
$taskStatus = new TaskStatus($status);
$userId = new UserId($user_id);
if (!empty($contents)){
  $taskContent = new TaskContent($contents);
  $tasks = $taskRepository->SearchByTask($taskStatus, $userId, $taskcontent);
} 
if (empty($contents)) $tasks = $taskRepository->findAllByStatus($taskStatus, $userId, $order);

?>

<link rel="stylesheet" href="/ToDo/style.css">

<div class="homeDody">
  <div class="indexSubmitContnts">
    <form action="index.php" method="POST">
      <button type="submit" name="incomplete">未完了</button>
      <button type="submit" name="completion">完了</button>
    </form>
    <form action="index.php" method="POST">
      <input type="text" name="contents" placeholder="キーワードを入力">
      <input type="submit" value="検索">
    </form>
    <form action="index.php" method="POST">
      <button type="submit" name="order" value="asc">締切昇降順</button>
      <button type="submit" name="order" value="desc">締切降下順</button>
    </form>
  </div>



  <form action="updateStatus.php" method="post">
    <table align="center" class="categoryTable">
      <tr>
        <td colspan="3">
          <?php if ($status == 0) : ?>
            <h1>未完了タスク一覧</h1>
          <?php endif; ?>
          <?php if ($status == 1) : ?>
            <h1>完了タスク一覧</h1>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td><a>タスク名</a></td>
        <td><a>締め切り</a></td>
        <td><a>カテゴリー</a></td>
      </tr>
      <?php foreach ($tasks as $task) : ?>
        <input type="hidden" name="id" value="<?php if (!empty($task->id()->value())) echo (htmlspecialchars($task->id()->value(), ENT_QUOTES, 'UTF-8')); ?>">
        <tr>
          <td><?php echo $task->contents()->value(); ?></td>
          <td><?php echo $task->deadline()->format("Y/m/d/"); ?></td>
          <td><?php echo $task->category()->name()->value(); ?></td>
          <td>
            <?php if ($status == 0) : ?>
              <a type="submit" href="/ToDo/updateStatus.php?id=<?php echo $task->id()->value(); ?>">完了</a>
            <?php endif; ?>
          </td>
          <td>
            <?php if ($status == 1) : ?>
              <a type="submit" href="/ToDo/updateStatus.php?id=<?php echo $task->id()->value(); ?>">未完了</a>
            <?php endif; ?>
          </td>

          <td>
            <a href="/ToDo/edit.php?id=<?php echo $task->id()->value(); ?>">編集</a>
          </td>
          <td>
            <a href="/ToDo/delete.php?id=<?php echo $task->id()->value(); ?>">削除</a>
          </td>

        </tr>
      <?php endforeach; ?>
    </table>
  </form>
</div>