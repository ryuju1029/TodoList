<?php
require_once(__DIR__ . '/Repository/TaskRepository.php');
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Lib/Session.php');
require_once(__DIR__ . '/Domain/Entity/NewTask.php');

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
$userId = new UserId($user_id);
$contents = new TaskContent($contents);
$categoryId = new CategoryId($category_id);
$deadline = new TaskDeadline($deadline);
$newTask = new NewTask($userId,$contents,$categoryId,$deadline);

$taskRepository = new TaskRepository();
$taskRepository->create($newTask);

Redirect::handler('/ToDo/index.php');

