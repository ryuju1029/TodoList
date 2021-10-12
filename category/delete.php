<?php
require_once(__DIR__ . '/../Dao/CategoriesDao.php');
$id = filter_input(INPUT_GET, "id");
$CategoriesDao = new CategoriesDao();
$CategoriesDao->delete($id);
header('Location: /ToDo/category/index.php');
