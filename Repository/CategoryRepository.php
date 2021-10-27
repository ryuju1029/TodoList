<?php
require_once(__DIR__ . '/../Domain/Entity/Category.php');
require_once(__DIR__ . '/../Dao/CategoryDao.php');

final class CategoryRepository
{
  /**
   * @var CategoryDao
   */
  private $cateogryDao;

  public function __construct()
  {
    // TODO: DI(依存性注入)ができていないので、ちょっと良くない
    $this->categoryDao = new CategoryDao();
  }

  public function findById(CategoryId $id): ?Category
  {
    $categoryRaw = $this->cateogryDao->findById($id->value());

    if (is_null($categoryRaw)) return null;

    $categoryId = new CategoryId($categoryRaw->id());
    $userId = new UserId($categoryRaw->userId());
    return new Category(
      $categoryId,
      $userId,
      $categoryRaw->name()
    );
  }
}
