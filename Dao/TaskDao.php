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

  public function findAllByStatus($status, $user_id): array
  {
    $sql = <<<EOF
      SELECT 
        t.id,
        t.user_id,
        t.contents,
        t.status,
        t.deadline,
        t.created_at,
        t.updated_at,
        c.id as category_id,
        c.name as category_name
      FROM 
        tasks t
      JOIN 
        categories c 
      ON t.category_id = c.id 
      WHERE 
        t.status = :status 
        AND t.user_id = :user_id
EOF;
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($tasks === false) return [];

    $taskRows = [];
    foreach ($tasks as $task) {
      $taskRows[] = new TaskRaws(
        $task['id'],
        $task['user_id'],
        $task['status'],
        $task['contents'],
        $task['category_id'],
        $task['deadline'],
        $task['created_at'],
        $task['updated_at'],
        $task['category_name']
      );
    }
    return $taskRows;
  }

  public function update(?string $contents, string $deadline, int $id)
  {
    $sql = "UPDATE tasks SET deadline = :deadline, contents = :contents WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $params = array(':deadline' => $deadline, ':contents' => $contents, ':id' => $id,);
    $stmt->execute($params);
  }

  public function delete(int $id)
  {
    $sql = "DELETE FROM tasks WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
  }
}
