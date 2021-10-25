<?php
require_once(__DIR__ . '/../Dao/CategoryDao.php');
require_once(__DIR__ . '/../Lib/Redirect.php');
require_once(__DIR__ . '/../Lib/Session.php');
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
$CategoryDao = new CategoryDao();
$CategoryDao->createCategories($name, $user_id);
Redirect::handler('/ToDo/category/index.php');