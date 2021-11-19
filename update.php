<?php
require_once(__DIR__ . '/Lib/Redirect.php');
require_once(__DIR__ . '/Domain/Entity/Task.php');
require_once(__DIR__ . '/Domain/Entity/User.php');
require_once(__DIR__ . '/Domain/Entity/Category.php');
require_once(__DIR__ . '/Repository/TaskRepository.php');
require_once(__DIR__ . '/Repository/CategoryRepository.php');
require_once(__DIR__ . '/Lib/Session.php');

$session = Session::getInstance();
$user_id = $session->get('id');
$contents = filter_input(INPUT_POST, "contents");
$deadline = filter_input(INPUT_POST, "deadline");
$category_id = filter_input(INPUT_POST, "category_id");
$id = filter_input(INPUT_POST, "id");
$status = filter_input(INPUT_POST, "status");
$status = (int)$status;
$categoryRepository = new CategoryRepository();
$categoryId = new CategoryId($category_id);
$category = $categoryRepository->findById($categoryId);
$taskId = new TaskId($id);
$userId = new UserId($user_id);
$taskStatus = new TaskStatus($status);
$taskContent = new TaskContent($contents);
$taskDeadline = new DateTime($deadline);
$task = new Task($taskId,$userId,$taskStatus,$taskContent,$category,$taskDeadline);
$taskRepository = new TaskRepository();
$taskRepository->update($task);
Redirect::handler('/ToDo/index.php');
