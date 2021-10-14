<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Dao/CategoryDao.php');
require_once(__DIR__ . '/Dao/TaskDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');

session_start();
$user_id = $_SESSION['id'];
$status = 0;
$categoryId = filter_input(INPUT_POST, "category");
$contents = filter_input(INPUT_POST, "contents");
$deadline = filter_input(INPUT_POST, "deadiine");

if (empty($categoryId)) $errors[] = 'カテゴリーが空です。';
if (empty($contents)) $errors[] = '内容が空です。';
if (empty($deadline)) $errors[] = '期限が空です。';
if (isset($errors)) {
    $_SESSION['errors'] = $errors;
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

