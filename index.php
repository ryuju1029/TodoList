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
$contents = filter_input(INPUT_POST, "contents");
$order = filter_input(INPUT_POST, "order") == "asc" ? "asc" : "desc";
if (!empty($contents)) $tasks = $taskDao->SearchByTask($status, $user_id, $contents);
if (empty($contents)) $tasks = $taskDao->findAllByStatus($status, $user_id, $order);
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
        <input type="hidden" name="id" value="<?php if (!empty($task->id())) echo (htmlspecialchars($task->id(), ENT_QUOTES, 'UTF-8')); ?>">
        <tr>
          <td><?php echo $task->contents(); ?></td>
          <td><?php echo $task->deadline(); ?></td>
          <td><?php echo $task->categoryName(); ?></td>
          <td>
            <?php if ($status == 0) : ?>
              <a type="submit" href="/ToDo/updateStatus.php?id=<?php echo $task->id(); ?>">完了</a>
            <?php endif; ?>
          </td>
          <td>
            <?php if ($status == 1) : ?>
              <a type="submit" href="/ToDo/updateStatus.php?id=<?php echo $task->id(); ?>">未完了</a>
            <?php endif; ?>
          </td>

          <td>
            <a href="/ToDo/edit.php?id=<?php echo $task->id(); ?>">編集</a>
          </td>
          <td>
            <a href="/ToDo/delete.php?id=<?php echo $task->id(); ?>">削除</a>
          </td>

        </tr>
      <?php endforeach; ?>
    </table>
  </form>
</div>