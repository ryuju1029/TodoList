<?php
require_once(__DIR__ . '/../ValueObject/TaskId.php');
require_once(__DIR__ . '/../ValueObject/UserId.php');
require_once(__DIR__ . '/../ValueObject/TaskStatus.php');
require_once(__DIR__ . '/../ValueObject/TaskContent.php');
require_once(__DIR__ . '/../ValueObject/CategoryId.php');
require_once(__DIR__ . '/../ValueObject/TaskDeadline.php');
require_once(__DIR__ . '/../ValueObject/TaskCreatedAt.php');

final class Task
{
    private $id;
    private $userId;
    private $status;
    private $contents;
    private $categoryId;
    private $deadline;
    private $createdAt;

    public function __construct(
        TaskId $id,
        UserId $userId,
        TaskStatus $status,
        TaskContent $contents,
        CategoryId $categoryId,
        TaskDeadline $deadline,
        TaskCreatedAt $createdAt
    )

    {
        $this->id = $id;
        $this->userId = $userId;
        $this->status = $status;
        $this->contents = $contents;
        $this->categoryId = $categoryId;
        $this->deadline = $deadline;
        $this->createdAt = $createdAt; 
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

    public function categoryId(): CategoryId
    {
        return $this->categoryId;
    }

    public function deadline(): TaskDeadline
    {
        return $this->deadline;
    }

    public function createdAt(): TaskCreatedAt
    {
        return $this->createdAt;
    }
}
