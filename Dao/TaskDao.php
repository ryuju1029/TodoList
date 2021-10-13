<?php
require_once(__DIR__ . '/Dao.php');

final class TaskDao extends Dao
{
  public function createTask($user_id,$status,$contents,$category_id, $deadiine)
  {
    $sql = "INSERT INTO tasks(user_id, status, contents, category_id, deadiine) VALUES (:user_id, :status, :contents, :category_id, :deadiine)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':contents', $contents);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->bindValue(':deadiine', $deadiine);
    $stmt->execute();
  }
}