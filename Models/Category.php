<?php
include_once "database.php";
class Category {
    private int $categoryId;
    private string $category;

    public function __construct(int $pCategoryId = -1, string $pCategory = '') {
        self::initializeProperties($pCategoryId, $pCategory);
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
    private function initializeProperties ($pCategoryId, $pCategory) : void
    {
        if ($pCategoryId < 0){
            // use the default initialization if nothing was sent in the param
            return;
        }
        else if (
            $pCategoryId > 0 &&
            strlen($pCategory) > 0
        ){
            $this->categoryId = $pCategoryId;
            $this->category = $pCategory;
        }
        else if ($pCategoryId > 0){
            // initialize only if the Product id was sent

            $mySqlConnection = openDatabaseConnection();

            $getProductByIdQuery = "SELECT * FROM product WHERE category_id = ?";
            $prepGetProductById = $mySqlConnection->prepare($getProductByIdQuery);
            $prepGetProductById->bind_param("i",$pCategoryId);
            $prepGetProductById->execute();
            $getProductResult = $prepGetProductById->get_result();

            if ($getProductResult->num_rows > 0){

                $queryProductAssocRow = $getProductResult->fetch_assoc();

                $this->categoryId = $pCategoryId;
                $this->category = $queryProductAssocRow['category'];
            }
        }

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

    public static function getByCategoryName($pCategory): ?Category
    {
        $mySqliConnection = openDatabaseConnection();
        $sql = "SELECT * FROM category WHERE category = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('s', $pCategory);
        $stmt->execute();
        $result = $stmt->get_result();
        // Fetch user data (assuming you have a user class or similar)
        if ($row = $result->fetch_assoc()) {
            $category = new Category();
            $category->categoryId = $row['category_id'];
            $category->category = $row['category'];
            return $category;
        } else {
            return null; // No user found with the given email and password
        }
        // Close the statement and the database connection when done
        $stmt->close();
        $mySqliConnection->close();
        return null;
    }


}