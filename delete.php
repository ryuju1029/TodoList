<?php
//require_once(__DIR__ . '/Dao/TaskDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Repository/TaskRepository.php');
$id = filter_input(INPUT_GET, "id");
// $blogDao = new TaskDao();
// $blogDao->delete($id);
$taskRepository = new TaskRepository();
$taskRepository->delete($id);
header('Location: index.php');
Redirect::handler('/ToDo/index.php');
