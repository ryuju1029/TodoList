<?php
require_once(__DIR__ . '/Dao.php');
require_once(__DIR__ . '/../Dto/CategoriesRaw.php');

final class CategoriesDao extends Dao
{
  public function createCategories(string $name,int $user_id)
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


    if($categories == false) return [];
    $categoriesRaws = [];
    foreach($categories as $category){
      $categoriesRaws[] = new CategoriesRaws(
        $category['id'],
        $category['name'],
        $category['user_id'],
        $category['created_at'],
        $category['update_at']
      );
    }
    return $categoriesRaws;
  }  


}