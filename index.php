<?php
require_once('header.php');
require_once('Dao/TaskDao.php');
session_start();
if (empty($_SESSION['id'])) header('Location: top.php');
$user_id = $_SESSION['id'];
$status = 0;
if (isset($_POST['incomplete'])) $status = 0;
if (isset($_POST['completion'])) $status = 1;
$taskDao = new TaskDao();
$tasks = $taskDao->findStatus($status, $user_id);
?>

<link rel="stylesheet" href="/ToDo/style.css">

<div class="homeDody">
  <div class="indexSubmitContnts">
    <form action="index.php" method="POST">
      <button type="submit" name="incomplete">未完了</button>
      <button type="submit" name="completion">完了</button>
    </form>
  </div>
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
      <tr>
        <td><?php echo $task->contents(); ?></td>
        <td><?php echo $task->deadline(); ?></td>
        <td><?php echo $task->name(); ?></td>
        <td>
          <?php if ($status == 0) : ?>
            <a>完了</a>
          <?php endif; ?>
        </td>
        <td>
          <?php if ($status == 1) : ?>
            <a>未完了</a>
          <?php endif; ?>
        </td>
        <td>編集</td>
        <td>削除</td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>