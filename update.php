<?php
require_once(__DIR__ . '/Dao/TaskDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');
$contents = filter_input(INPUT_POST, "contents");
$deadline = filter_input(INPUT_POST, "deadline");
$category_id = filter_input(INPUT_POST, "category_id");
$id = filter_input(INPUT_POST, "id");
$taskDao = new TaskDao();
$taskDao->update($id, $contents, $category_id, $deadline);
Redirect::handler('/ToDo/index.php');
