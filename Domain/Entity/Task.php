<?php
require_once(__DIR__ . '/../ValueObject/TaskId.php');
require_once(__DIR__ . '/../ValueObject/UserId.php');
require_once(__DIR__ . '/../ValueObject/TaskStatus.php');
require_once(__DIR__ . '/../ValueObject/TaskContent.php');
require_once(__DIR__ . '/../Entity/Category.php');
require_once(__DIR__ . '/../ValueObject/TaskDeadline.php');
require_once(__DIR__ . '/../ValueObject/TaskCreatedAt.php');
require_once(__DIR__ . '/../ValueObject/TaskUpdateAt.php');

final class Task
{
    private $id;
    private $userId;
    private $status;
    private $contents;
    private $category;
    private $deadline;

    public function __construct(
        TaskId $id,
        UserId $userId,
        TaskStatus $status,
        TaskContent $contents,
        Category $category,
        $deadline,
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->status = $status;
        $this->contents = $contents;
        $this->category = $category;
        $this->deadline = $deadline;
    }

    public function id(): TaskId
    {
        return $this->id;
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    public function status(): TaskStatus
    {
        return $this->status;
    }

    public function contents(): TaskContent
    {
        return $this->contents;
    }

    public function category(): Category
    {
        return $this->category;
    }

    public function deadline(): DateTime
    {
        return $this->deadline;
    }
}
