<?php
require_once(__DIR__ . '/Dao.php');
require_once(__DIR__ . '/../Dto/CategoryRaw.php');

final class CategoryDao extends Dao
{
  public function createCategories(string $name, int $user_id)
  {
    $sql = "INSERT INTO categories(name, user_id) VALUES (:name, :user_id)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
  }

  public function findAll(int $user_id): array
  {
    $sql = "SELECT * FROM categories WHERE user_id = :user_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if ($categories == false) return [];
    $categoriesRaws = [];
    foreach ($categories as $category) {
      $categoriesRaws[] = new CategoryRaws(
        $category['id'],
        $category['name'],
        $category['user_id'],
        $category['created_at'],
        $category['update_at']
      );
    }
    return $categoriesRaws;
  }

  public function findById(int $id): CategoryRaws
  {
    $sql = "SELECT * FROM categories WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($category === false) return null;

    return new CategoryRaws(
      $category['id'],
      $category['name'],
      $category['user_id'],
      $category['created_at'],
      $category['update_at']
    );
  }

  public function findByName(string $name): CategoryRaws
  {
    $sql = "SELECT * FROM categories WHERE name = :name";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($category === false) return null;

    return new CategoryRaws(
      $category['id'],
      $category['name'],
      $category['user_id'],
      $category['created_at'],
      $category['update_at']
    );
  }

  public function update($name,$id)
  {
    $sql = "UPDATE categories SET name = :name WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $params = array(':name' => $name, ':id' => $id);
    $stmt->execute($params);
  }

  public function delete(int $id)
  {
    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
  }

  

}
