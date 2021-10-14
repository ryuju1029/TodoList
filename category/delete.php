<?php
require_once(__DIR__ . '/../Dao/CategoryDao.php');
require_once(__DIR__ . '/../Lib/Redirect.php');
$id = filter_input(INPUT_GET, "id");
$CategoryDao = new CategoryDao();
$CategoryDao->delete($id);
Redirect::handler('/ToDo/category/index.php');