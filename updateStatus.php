<?php
require_once(__DIR__ . '/Dao/TaskDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');
$id = filter_input(INPUT_GET, "id");
$taskDao = new TaskDao();
$task = $taskDao->findById($id);
$status = $task->status() === 0 ? 1 : 0;
$task = $taskDao->updateStatus($id, $status);
Redirect::handler('/ToDo/index.php');
