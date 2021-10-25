<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Dao/CategoryDao.php');
require_once(__DIR__ . '/Dao/TaskDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Lib/Session.php');
$session = Session::getInstance();
$errors = [];
$user_id = $_SESSION['id'];
$category_id = filter_input(INPUT_POST, "category_id");
$contents = filter_input(INPUT_POST, "contents");
$deadline = filter_input(INPUT_POST, "deadline");

if (empty($contents)) $errors['content'] = '内容を入力してください。';
if (empty($deadline)) $errors['deadline'] = '期限を入力してください。';
if (!empty($errors)){
    $session->setErrors($errors);
    Redirect::handler('/ToDo/create.php');
}

$TaskDao = new TaskDao();
$TaskDao->create(
    $user_id,
    $contents,
    $category_id, 
    $deadline
);
Redirect::handler('/ToDo/index.php');

