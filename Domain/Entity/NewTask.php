<?php
require_once(__DIR__ . '/../ValueObject/TaskId.php');
require_once(__DIR__ . '/../ValueObject/UserId.php');
require_once(__DIR__ . '/../ValueObject/TaskStatus.php');
require_once(__DIR__ . '/../ValueObject/TaskContent.php');
require_once(__DIR__ . '/../ValueObject/CategoryId.php');
require_once(__DIR__ . '/../ValueObject/TaskDeadline.php');
require_once(__DIR__ . '/../ValueObject/TaskCreatedAt.php');
require_once(__DIR__ . '/../ValueObject/TaskUpdateAt.php');

final class NewTask
{
    private $userId;
    private $status;
    private $contents;
    private $categoryId;
    private $deadline;

    public function __construct(
        UserId $userId,
        TaskContent $contents,
        CategoryId $categoryId,
        TaskDeadline $deadline
    ) {
        $this->userId = $userId;
        $this->contents = $contents;
        $this->categoryId = $categoryId;
        $this->deadline = $deadline;
        $this->status = new TaskStatus(0);
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
}
