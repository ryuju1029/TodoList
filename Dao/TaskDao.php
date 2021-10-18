<?php
require_once(__DIR__ . '/Dao.php');
require_once(__DIR__ . '/../Dto/TaskRaw.php');

final class TaskDao extends Dao
{
  public function create(
    $user_id,
    $contents,
    $category_id,
    $deadline
  ): void {
    // ヒアドキュメント
    $sql = <<<EOF
    INSERT INTO 
      tasks
    (user_id, contents, category_id, deadline) 
    VALUES 
    (:user_id, :contents, :category_id, :deadline);
    EOF;
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':contents', $contents);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->bindValue(':deadline', $deadline);
    $stmt->execute();
  }

  public function findStatus($status,$user_id)
  {
    $sql = "SELECT * FROM tasks JOIN categories ON tasks.category_id = categories.id WHERE tasks.status = :status AND tasks.user_id = :user_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($tasks === false) return [];
    $taskRows = [];
    foreach ($tasks as $task){
      $taskRows[] = new TaskRaws(
        $task['id'],
        $task['user_id'],
        $task['status'],
        $task['contents'],
        $task['category_id'],
        $task['deadline'],
        $task['created_at'],
        $task['updated_at'],
        $task['name']
      );
    } 
    return $taskRows; 
  }

}
