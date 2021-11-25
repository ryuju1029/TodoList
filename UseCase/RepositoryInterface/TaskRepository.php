<?php
require_once(__DIR__ . '/../Domain/Entity/Task.php');
require_once(__DIR__ . '/../Domain/Entity/Category.php');
require_once(__DIR__ . '/../Domain/Entity/User.php');
require_once(__DIR__ . '/../Domain/Entity/JoinTaskCategory.php');
require_once(__DIR__ . '/../Domain/Entity/NewTask.php');
require_once(__DIR__ . '/../Domain/Factory/TaskFactory.php');
require_once(__DIR__ . '/../Dao/TaskDao.php');

interface TaskRepositoryInterface
{
  public function create(NewTask $newTask): void;

  public function update(Task $task): void;
  
  public function findAllByStatus(TaskStatus $status, UserId $userId, string $order): array;
  
  public function findById(TaskId $id): ?Task;
  
  public function SearchByTask(TaskStatus $status, UserId $userId, TaskContent $contents);
  
  public function delete(taskId $id): void;
  
  public function updateStatus(TaskId $id, TaskStatus $taskStatus): void;
}
