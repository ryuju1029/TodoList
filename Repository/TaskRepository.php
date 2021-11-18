<?php
require_once(__DIR__ . '/../Domain/Entity/Task.php');
require_once(__DIR__ . '/../Domain/Entity/Category.php');
require_once(__DIR__ . '/../Domain/Entity/User.php');
require_once(__DIR__ . '/../Domain/Entity/JoinTaskCategory.php');
require_once(__DIR__ . '/../Domain/Entity/NewTask.php');
require_once(__DIR__ . '/../Domain/Factory/TaskFactory.php');
require_once(__DIR__ . '/../Dao/TaskDao.php');

final class TaskRepository
{
  /**
   * @var TaskDao
   */
  private $taskDao;

  public function __construct()
  {
    // TODO: DI(依存性注入)ができていないので、ちょっと良くない
    $this->taskDao = new TaskDao();
  }
  
  public function create(NewTask $newTask):void
  {
    $this->taskDao->create($newTask->userId()->value(),$newTask->contents()->value(), $newTask->categoryId()->value(), $newTask->deadline()->value());
  }

  public function findAllByStatus(TaskStatus $status, UserId $userId, string $order): array
  {
    $taskRaws = $this->taskDao->findAllByStatus($status->value(), $userId->value(), $order);

    $tasks = [];
    foreach ($taskRaws as $taskRaw) {
      $tasks[] = TaskFactory::create($taskRaw);
    }
    return $tasks;
  }

  public function findById(TaskId $id): ?Task
  {
    $taskRaw = $this->taskDao->findById($id->value());
    if (is_null($taskRaw)) return null;

    $taskId = new TaskId($taskRaw->id());
    $userId = new UserId($taskRaw->userId());
    $status = new TaskStatus($taskRaw->status());
    $contents = new TaskContent($taskRaw->contents());
    $deadline = new DateTime($taskRaw->deadline());
    $createdAt = new TaskCreatedAt($taskRaw->createdAt());
    $updateAt = new TaskUpdateAt($taskRaw->updatedAt());
    $category = new Category(
      new CategoryId($taskRaw->categoryId()),
      $userId,
      new CategoryName($taskRaw->categoryName())
    );

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

  public function SearchByTask(TaskStatus $status, UserId $userId, TaskContent $contents)
  {
    $taskRaws = $this->taskDao->searchByTask($status->value(), $userId->value(), $contents->value());

    $tasks = [];
    foreach ($taskRaws as $task) {
      // TODO: FactoryクラスにTaskEntityを組み立てる処理を移す
      $taskId = new TaskId($task->id());
      $userId = new UserId($task->userId());
      $status = new TaskStatus($task->status());
      $contents = new TaskContent($task->contents());
      $deadline = new DateTime($task->deadline());
      $createdAt = new TaskCreatedAt($task->createdAt());
      $updateAt = new TaskUpdateAt($task->updatedAt());
      $category = new Category(
        new CategoryId($task->categoryId()),
        $userId,
        new CategoryName($task->categoryName())
      );

      $tasks[] = new Task(
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
    return $tasks;
  }

  public function delete(taskId $id): void
  {
    $this->taskDao->delete($id->value());
  }
}
