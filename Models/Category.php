<?php
include_once "database.php";
class Category {
    private int $categoryId;
    private string $category;

    public function __construct(int $pCategoryId = -1, string $pCategory = '') {
        $this->initializeProperties($pCategoryId, $pCategory);
    }

    public function initializeProperties ($pCategoryId, $pCategory) : void
    {
        if ($pCategoryId < 0) return;
        else if (
            $pCategoryId > 0 &&
            strlen($pCategory) > 0
        ){
            $this->categoryId = $pCategoryId;
            $this->category = $pCategory;
        }
        else if ($pCategoryId > 0){
            $this->getById($pCategoryId);
        }

    }

    private function getById($pCategoryId) {
        $mySqlConnection = openDatabaseConnection();
        $sql = "SELECT * FROM product WHERE category_id = ?";
        $stmt = $mySqlConnection->prepare($sql);
        $stmt->bind_param("i",$pCategoryId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->categoryId = $row['category_id'];
            $this->category = $row['category'];
        }
    }

    public static function getByCategoryName($pCategory): ?Category
    {
        $mySqlConnection = openDatabaseConnection();
        $sql = "SELECT * FROM category WHERE category = ?";
        $stmt = $mySqlConnection->prepare($sql);
        $stmt->bind_param('s', $pCategory);
        $stmt->execute();
        $result = $stmt->get_result();
        // Fetch category data
        if ($row = $result->fetch_assoc()) {
            $category = new Category();
            $category->categoryId = $row['category_id'];
            $category->category = $row['category'];
            return $category;
        } else {
            return null;
        }
        // Close the statement and the database connection when done
        $stmt->close();
        $mySqliConnection->close();
        return null;
    }

    public static function listCategories() : array {
        $categories = [];
        $mySqlConnection = openDatabaseConnection();
        $sql = "SELECT * FROM category";
        $results = $mySqlConnection->query($sql);
        while ($row = $results->fetch_assoc()){
            $category = new Category();
            $category->categoryId = $row['category_id'];
            $category->category = $row['category'];
            $categories[] = $category;
        }
        return $categories;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

}