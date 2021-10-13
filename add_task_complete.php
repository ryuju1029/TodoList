<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Dao/CategoriesDao.php');
require_once(__DIR__ . '/Dao/TaskDao.php');
session_start();
$user_id = $_SESSION['id'];
$status = 0;
$name = filter_input(INPUT_POST, "category");
$contents = filter_input(INPUT_POST, "contents");
$deadiine = filter_input(INPUT_POST, "deadiine");

$CategoriesDao = new CategoriesDao();
$Categories = $CategoriesDao->findByName($name);

$category_id = $Categories->id();

$TaskDaoDao = new TaskDao();
$TaskDaoDao->createTask($user_id,$status,$contents,$category_id, $deadiine);
header('Location: /ToDo/index.php');

