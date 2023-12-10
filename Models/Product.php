<?php
include_once "database.php";
include_once "Models/Category.php";

class Product{
    private int $productId;
    private int $userId;
    private string $title;
    private string $description;
    private float $price;
    private int $categoryId;


    public function __construct
    (
        $pProductId= -1,
        $pUserId = -1,
        $pDescription = "",
        $pTitle = "",
        $pPrice = -1,
        $pCategoryId = -1
    )
    {
        // we check all cases inside the function
        $this->initializeProperties($pProductId,$pUserId,$pDescription,$pTitle,$pPrice,$pCategoryId);
    }

    private function initializeProperties ($pProductId,$pUserId,$pDescription,$pTitle,$pPrice, $pCategoryId) : void
    {
        if ($pProductId < 0) return;
        else if (
            $pProductId > 0 &&
            $pUserId > 0 &&
            strlen($pDescription) > 0 &&
            strlen($pTitle) > 0 &&
            $pPrice > 0
            && $pCategoryId > 0
        ){
            $this->productId = $pProductId;
            $this->userId = $pUserId;
            $this->description = $pDescription;
            $this->title = $pTitle;
            $this->price = $pPrice;
            $this->categoryId = $pCategoryId;
        }
        else if ($pProductId > 0){
            // initialize only if the Product id was sent

            $mySqlConnection = openDatabaseConnection();

            $getProductByIdQuery = "SELECT * FROM product WHERE product_id = ?";
            $prepGetProductById = $mySqlConnection->prepare($getProductByIdQuery);
            $prepGetProductById->bind_param("i",$pProductId);
            $prepGetProductById->execute();
            $getProductResult = $prepGetProductById->get_result();

            if ($getProductResult->num_rows > 0){

                $queryProductAssocRow = $getProductResult->fetch_assoc();

                $this->productId = $queryProductAssocRow['product_id'];
                $this->userId = $queryProductAssocRow['user_id'];
                $this->title = $queryProductAssocRow['title'];
                $this->description = $queryProductAssocRow['description'];
                $this->price = $queryProductAssocRow['price'];
                $this->categoryId = $queryProductAssocRow['category_id'];
            }
        }

    }

    public function listProduct() : array{

        $list = array();
        $mySqlConnection = openDatabaseConnection();

        $sqlQueryGetProducts = "SELECT * FROM `PRODUCTS`";
        $results = $mySqlConnection->query($sqlQueryGetProducts);
        while ($row = $results->fetch_assoc()){
            $product = new Product();
            $product->productId = $row['product_id'];
            $product->userId = $row['user_id'];
            $product->title = $row['title'];
            $product->description = $row['description'];
            $product->price = $row['price'];
            $product->categoryId = $row["category_id"];
        }
        array_push($list,$product);

        return $list;
    }

    public static function listProductsByCategory($categoryId): ?array
    {
        $products = [];
        $mySqliConnection = openDatabaseConnection();
        $sql = "SELECT * FROM product WHERE category_id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $categoryId);
        $stmt->execute();
        $results = $stmt->get_result();
        // Fetch products data
        while ($row = $results->fetch_assoc()){
            $product = new Product();
            $product->productId = $row['product_id'];
            $product->userId = $row['user_id'];
            $product->title = $row['title'];
            $product->description = $row['description'];
            $product->price = $row['price'];
            $product->categoryId = $row["category_id"];
            $products[] = $product;
        }
        return $products;
    }

    public static function getProductsByUserId($pUserId): ?array
    {
        $products = [];
        $mySqliConnection = openDatabaseConnection();
        $sql = "SELECT * FROM product WHERE user_id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pUserId);
        $stmt->execute();
        $results = $stmt->get_result();
        if ($results->num_rows > 0){
            while ($row = $results->fetch_assoc()) {
                $product = new Product();
                $product->productId = $row['product_id'];
                $product->userId = $row['user_id'];
                $product->title = $row['title'];
                $product->description = $row['description'];
                $product->price = $row['price'];
                $product->categoryId = $row["category_id"];
                $products[] = $product;
            }
        }
        return $products;
    }
    public static function getLastProductCreatedByUser($pUserId): ?Product
    {
        $mySqliConnection = openDatabaseConnection();
        $sql = "SELECT * FROM product WHERE user_id = ? ORDER BY product_id DESC LIMIT 1";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0){
            $result = $result->fetch_assoc();
            $product = new Product();
            $product->productId = $result['product_id'];
            $product->userId = $pUserId;
            $product->title = $result['title'];
            $product->description = $result['description'];
            $product->price = $result['price'];
            $product->categoryId = $result["category_id"];
            return $product;
        }
        return null;
    }
    public static function createProduct($pUserId, $pTitle, $pDescription, $pPrice, $pCategoryId): void {
        $mySqliConnection = openDatabaseConnection();
        $sql = "INSERT INTO product (user_id, title, description, price, category_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('issdi', $pUserId, $pTitle, $pDescription, $pPrice, $pCategoryId);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }

    public static function updateProduct($pUserId, $pTitle, $pDescription, $pPrice, $pProductId, $pCategoryId) {
        $mySqliConnection = openDatabaseConnection();
        $sql = "UPDATE product SET user_id = ?, title = ?, description = ?, price = ?, category_id = ? WHERE product_id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('issdii', $pUserId, $pTitle, $pDescription, $pPrice, $pProductId, $pCategoryId);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }

    public static function deleteProduct($pProductId) {
        $mySqliConnection = openDatabaseConnection();
        $sql = "DELETE FROM product WHERE product_id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pProductId);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }

    //to be continued
    public static function getUserName($pProductId)
    {
        $conn = openDatabaseConnection();
        $sql = "Select * from product 
                JOIN user on user.user_id = product.user_id WHERE product_id = ?";
        $query = $conn->prepare($sql);
        $query->bind_param("i",$pProductId);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0){
            $fetchAssoc = $result->fetch_assoc();
            $user = new User();
            $user->initializeProperties(
                $fetchAssoc["user_id"],
                $fetchAssoc["first_name"],
                $fetchAssoc["last_name"],
                $fetchAssoc["email"],
                $fetchAssoc["password"],
                $fetchAssoc["description"],
                $fetchAssoc["phone_number"]
            );
            return
                "{$user->getFirstName()} {$user->getLastName()}"
            ;
        }
        return null;
    }

    //fetching category name by a product Id
    public function getCategoryNameByProductId($pProductId) : ?String
    {
        $conn = openDatabaseConnection();
        $sql = "SELECT * FROM product join category on product.category_id = category.category_id WHERE product_id = ?";
        $queryPrepare = $conn->prepare($sql);
        $queryPrepare->bind_param("i",$pProductId);
        $queryPrepare->execute();
        $result = $queryPrepare->get_result();
        if ($result->num_rows > 0){

            $fetchAssoc = $result->fetch_assoc();
            $category = new Category();
            $category->initializeProperties(
                $fetchAssoc['category_id'],
                $fetchAssoc['category']
            );
            return $category->getCategory();
        }
        return null;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }
}