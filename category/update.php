<?php
require_once(__DIR__ . '/../Dao/CategoriesDao.php');
$id = filter_input(INPUT_POST, "id");
$name = filter_input(INPUT_POST, "name");
$CategoriesDao = new CategoriesDao();
$CategoriesDao->update($name,$id);
header('Location: /ToDo/category/index.php');