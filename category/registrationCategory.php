<?php
require_once(__DIR__ . '/../Dao/CategoriesDao.php');
session_start();
$user_id = $_SESSION['id'];
$name = filter_input(INPUT_POST, "name");
$CategoriesDao = new CategoriesDao();
$CategoriesDao->createCategories($name, $user_id);
header('Location: /ToDo/category/index.php');