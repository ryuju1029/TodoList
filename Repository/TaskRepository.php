<?php
require_once(__DIR__ . '/../Domain/Entity/Task.php');
require_once(__DIR__ . '/../Domain/Entity/Category.php');
require_once(__DIR__ . '/../Dao/TaskDao.php');

final class TaskRepository
{
  private $TaskDao;

  public function __construct()
  {
    // TODO: DI(依存性注入)ができていないので、ちょっと良くない
    $this->taskDao = new TaskDao();
  }

  public function findAllByStatus(TaskStatus $status, UserId $userId): array
  {
    $taskRaws = $this->taskDao->findById($status->value(), $userId->value(), $status);

    if ($taskRaws === false) return [];

    $taskRows = [];
    foreach ($taskRows as $task) {
      $taskId = new TaskId($task->id());
      $userId = new UserId($task->userId());
      $status = new TaskStatus($task->status());
      $contents = new TaskContent($task->contents());
      $categoryId = new CategoryId($task->categoryId());
      $deadline = new TaskDeadline($task->deadline());
      $createdAt = new TaskCreatedAt($task->createdAt());
      $taskRows[] = new Task(
        $taskId,
        $userId,
        $status,
        $contents,
        $categoryId,
        $deadline,
        $createdAt
      );
    }
    return $taskRows;
  }

  public function findById(TaskId $id): ?Task
  {
    $taskRaws = $this->taskDao->findById($id->value());
    if ($taskRaws === false) return null;
 
    $taskId = new TaskId($taskRaws->id());
    $userId = new UserId($taskRaws->userId());
    $status = new TaskStatus($taskRaws->status());
    $contents = new TaskContent($taskRaws->contents());
    $categoryId = new CategoryId($taskRaws->categoryId());
    $deadline = new TaskDeadline($taskRaws->deadline());
    $createdAt = new TaskCreatedAt($taskRaws->createdAt());
    return new Task(
      $taskId,
      $userId,
      $status,
      $contents,
      $categoryId,
      $deadline,
      $createdAt
    );
  }

  public function SearchByTask(TaskStatus $status, UserId $userId, TaskContent $contents)
  {
    $taskRaws = $this->taskDao->findById($status->value(), $userId->value(), $contents->value());

    if ($taskRaws === false) return [];

    $taskRows = [];
    foreach ($taskRaws as $task) {
      $taskId = new TaskId($task->id());
      $userId = new UserId($task->userId());
      $status = new TaskStatus($task->status());
      $contents = new TaskContent($task->contents());
      $categoryId = new CategoryId($task->categoryId());
      $deadline = new TaskDeadline($task->deadline());
      $createdAt = new TaskCreatedAt($task->createdAt());
      $taskRows[] = new Task(
        $taskId,
        $userId,
        $status,
        $contents,
        $categoryId,
        $deadline,
        $createdAt
      );
    }
    return $taskRows;
  }

  public function delete(taskId $id): void
  {
    $this->taskDao->delete($id->value());
  }
}
