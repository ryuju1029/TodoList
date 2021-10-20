<?php

final class Task
{
    private $id;

    public function __construct(
        TaskId $id
    )
    {
        $this->id = $id;
    }

    public function id(): TaskId
    {
        return $this->id;
    }
}
