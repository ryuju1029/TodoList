<?php
require_once(__DIR__ . '/../Dao/CategoryDao.php');
require_once(__DIR__ . '/../Lib/Redirect.php');
$id = filter_input(INPUT_POST, "id");
$name = filter_input(INPUT_POST, "name");
$CategoryDao = new CategoryDao();
$CategoryDao->update($name,$id);
Redirect::handler('/ToDo/category/index.php');