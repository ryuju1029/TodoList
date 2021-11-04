<?php

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
        TaskCategoryId $categoryId,
        TaskDeadline $deadline,
        TaskCreatedAt $createdAt
    )

    {
        $this->id = $id;
        $this->userId = $userId;
        $this->status = $status;
        $this->contents = $contents;
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

    public function categoryId(): TaskCategoryId
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
