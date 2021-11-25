<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../Repository/CategoryRepository.php');
$id = filter_input(INPUT_GET, "id");
$name = filter_input(INPUT_GET, "name");
$categoryId = new CategoryId($id);
$categoryRepository = new CategoryRepository();
$category = $categoryRepository->findById($categoryId);
?>
<link rel="stylesheet" href="/ToDo/style.css">
<div class="homeDody">
  <h1 style="text-align:center">カテゴリー編集</h1>

  <form action="/ToDo/category/update.php" method="post">
    <input type="hidden" name="id" value="<?php if (!empty($category->id())) echo (htmlspecialchars($category->id()->value(), ENT_QUOTES, 'UTF-8')); ?>">
    <table align="center">
      <tr>
        <td><input type="text" name="name" value="<?php if (!empty($category->name())) echo (htmlspecialchars($category->name()->value(), ENT_QUOTES, 'UTF-8')); ?>"></td>
      </tr>
      <tr>
        <td><input type="submit" value="更新"></td>
      </tr>
    </table>
  </form>
</div>