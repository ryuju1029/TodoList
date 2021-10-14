<?php
require_once(__DIR__ . '/Dao.php');

final class TaskDao extends Dao
{
  public function create(
    int $user_id,
    string $contents,
    int $category_id,
    string $deadiine
  ): void {
    // ヒアドキュメント
    $sql = <<<EOF
    INSERT INTO 
      tasks
    (user_id, contents, category_id, deadiine) 
    VALUES 
    (:user_id, :contents, :category_id, :deadiine)";
EOF;
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':contents', $contents);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->bindValue(':deadiine', $deadiine);
    $stmt->execute();
  }
}
