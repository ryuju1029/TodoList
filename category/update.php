<?php
require_once(__DIR__ . '/../Lib/Redirect.php');
require_once(__DIR__ . '/../Repository/CategoryRepository.php');
require_once(__DIR__ . '/../Repository/CategoryRepository.php');
$id = filter_input(INPUT_POST, "id");
$name = filter_input(INPUT_POST, "name");
$categoryId = new CategoryId($id);
$categoryName = new CategoryName($name);
$categoryRepository = new CategoryRepository();
$categoryRepository->update($categoryName, $categoryId);
Redirect::handler('/ToDo/category/index.php');
