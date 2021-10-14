<?php
require_once(__DIR__ . '/../Dao/CategoryDao.php');
require_once(__DIR__ . '/../Lib/Redirect.php');
session_start();
$user_id = $_SESSION['id'];
$name = filter_input(INPUT_POST, "name");
$CategoryDao = new CategoryDao();
$CategoryDao->createCategories($name, $user_id);
Redirect::handler('/ToDo/category/index.php');