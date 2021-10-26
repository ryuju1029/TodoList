<?php

final class Task
{
    private $id;
    private $UserId;
    private $Status;
    private $CategoryId;
    private $Deadline;

    public function __construct(
        TaskId $id,
        TaskUserId $UserId,
        TaskStatus $Status,
        TaskCategoryId $CategoryId,
        TaskDeadline $Deadline
    )

    {
        $this->id = $id;
        $this->UserId = $UserId;
        $this->Status = $Status;
        $this->Deadline = $Deadline;
    }

    public function id(): TaskId
    {
        return $this->id;
    }

    public function UserId(): TaskUserId
    {
        return $this->UserId;
    }

    public function Status(): TaskStatus
    {
        return $this->Status;
    }

    public function CategoryId(): TaskCategoryId
    {
        return $this->CategoryId;
    }

    public function Deadline(): TaskDeadline
    {
        return $this->Deadline;
    }
}
