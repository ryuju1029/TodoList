<?php
require_once(__DIR__ . '/Dao/TaskDao.php');
$contents = filter_input(INPUT_POST, "contents");
$title = filter_input(INPUT_POST, "deadline");
$id = filter_input(INPUT_POST, "id");
$taskDao = new TaskDao();
$taskDao->update($deadline, $contents, $id);
header('Location: mypage.php');
