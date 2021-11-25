<?php
require_once(__DIR__ . '/../Lib/Redirect.php');
require_once(__DIR__ . '/../Lib/Session.php');
require_once(__DIR__ . '/../Repository/CategoryRepository.php');
$session = Session::getInstance();
$errors = [];
$user_id = $_SESSION['id'];
$name = filter_input(INPUT_POST, "name");
if(empty($name)) $errors['name'] = "カテゴリーを追加してください。";
if (!empty($errors)) {
  $session->setErrors($errors);
  Redirect::handler('/ToDo/category/index.php');
  die;
}
$userId = new UserId($user_id);
$categoryName = new CategoryName($name);

$categoryRepository = new CategoryRepository();
$categoryRepository->createCategories($categoryName,$userId);
Redirect::handler('/ToDo/category/index.php');