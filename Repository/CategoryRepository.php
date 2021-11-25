<?php
require_once(__DIR__ . '/../Domain/Entity/Category.php');
require_once(__DIR__ . '/../Domain/Entity/User.php');
require_once(__DIR__ . '/../Dao/CategoryDao.php');

final class CategoryRepository
{
  /**
   * @var CategoryDao
   */
  private $categoryDao;

  public function __construct()
  {
    // TODO: DI(依存性注入)ができていないので、ちょっと良くない
    $this->categoryDao = new CategoryDao();
  }

  public function createCategories(CategoryName $name, UserId $userId)
  {
    $this->categoryDao->createCategories($name->value(), $userId->value());
  }

  public function findById(CategoryId $id): ?Category
  {
    $categoryRaw = $this->categoryDao->findById($id->value());

    if (is_null($categoryRaw)) return null;

    $categoryId = new CategoryId($categoryRaw->id());
    $userId = new UserId($categoryRaw->userId());
    $categoryName = new CategoryName($categoryRaw->name());
    return new Category(
      $categoryId,
      $userId,
      $categoryName
    );
  }

  public function findAll(UserId $userId)
  {
    $categoryRaws = $this->categoryDao->findAll($userId->value());
    if ($categoryRaws == null) return [];
    foreach ($categoryRaws as $category) {
      $categoryId = new CategoryId($category->id());
      $categoryName = new CategoryName($category->name());
      $userId = new UserId($category->userId());
      $categoriesRaws[] = new Category(
        $categoryId,
        $userId,
        $categoryName
      );
    }

    return $categoryRaws;
  }

  public function findByName(string $name): ?Category
  {
    $categoryRaw = $this->categoryDao->findByName($name);

    if (is_null($categoryRaw)) return null;

    $categoryId = new CategoryId($categoryRaw->id());
    $userId = new UserId($categoryRaw->userId());
    $categoryName = new CategoryName($categoryRaw->name());
    return new Category(
      $categoryId,
      $userId,
      $categoryName
    );
  }

  public function update(CategoryName $name, CategoryId $id)
  {
    $this->categoryDao->update($name->value(), $id->value());
  }

  public function delete(CategoryId $id)
  {
    $this->categoryDao->delete($id->value());
  }
}
