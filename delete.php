<?php
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Repository/TaskRepository.php');
$id = filter_input(INPUT_GET, "id");
$taskRepository = new TaskRepository();
$taskId = new TaskId($id);
$taskRepository->delete($taskId);
header('Location: index.php');
Redirect::handler('/ToDo/index.php');
