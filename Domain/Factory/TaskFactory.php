<?php

require_once(__DIR__ . '/../Entity/Task.php');
require_once(__DIR__ . '/../Entity/Category.php');
require_once(__DIR__ . '/../Entity/User.php');
require_once(__DIR__ . '/../Entity/JoinTaskCategory.php');

final class TaskFactory
{
  public static function create(TaskJoinCategoryRaw $taskRaw): Task
  {
    $taskId = new TaskId($taskRaw->id());
    $userId = new UserId($taskRaw->userId());
    $status = new TaskStatus($taskRaw->status());
    $contents = new TaskContent($taskRaw->contents());
    $deadline = new DateTime($taskRaw->deadline());
    $createdAt = new TaskCreatedAt($taskRaw->createdAt());
    $updateAt = new TaskUpdateAt($taskRaw->updatedAt());
    $category = self::createCategory($taskRaw);

    return new Task(
      $taskId,
      $userId,
      $status,
      $contents,
      $category,
      $deadline,
      $createdAt,
      $updateAt
    );
  }

  private static function createCategory(TaskJoinCategoryRaw $taskRaw): Category
  {
    return new Category(
      new CategoryId($taskRaw->categoryId()),
      new UserId($taskRaw->userId()),
      new CategoryName($taskRaw->categoryName())
    );
  }
}
