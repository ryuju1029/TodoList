<?php
require_once(__DIR__ . '/../Lib/Redirect.php');
require_once(__DIR__ . '/../Repository/CategoryRepository.php');
$id = filter_input(INPUT_GET, "id");
$categoryId = new CategoryId($id);
$categoryRepository = new CategoryRepository();
$category = $categoryRepository->delete($categoryId);
Redirect::handler('/ToDo/category/index.php');