<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Dao/CategoryDao.php');
require_once(__DIR__ . '/Dao/TaskDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');

session_start();
$user_id = $_SESSION['id'];
$status = 0;
$categoryId = filter_input(INPUT_POST, "category_Id");
$contents = filter_input(INPUT_POST, "contents");
$deadline = filter_input(INPUT_POST, "deadline");

if (empty($contents)) $errorContent = '内容を入力してください。';
if (empty($deadline)) $errorDeadline = '期限を入力してください。';
if (isset($errorContent) || isset($errorDeadline)) {
    $_SESSION['errorContent'] = $errorContent;
    $_SESSION['errorDeadline'] = $errorDeadline;
    Redirect::handler('/ToDo/create.php');
}

$TaskDao = new TaskDao();
$TaskDao->create(
    $user_id,
    $status,
    $contents,
    $categoryId, 
    $deadline
);
Redirect::handler('/ToDo/index.php');

