<?php
require_once(__DIR__ . '/Repository/TaskRepository.php');
require_once(__DIR__ . '/Lib/Redirect.php');
$id = filter_input(INPUT_GET, "id");
$taskRepository = new TaskRepository();
$taskId = new TaskId($id);
$task = $taskRepository->findById($taskId);
$status = $task->status()->value() === 0 ? 1 : 0;
$taskStatus = new TaskStatus($status);
$taskRepository->updateStatus($taskId, $taskStatus);

Redirect::handler('/ToDo/index.php');
