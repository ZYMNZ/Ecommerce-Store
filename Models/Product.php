<?php
include_once "database.php";
class Product{
    private int $productId;
    private int $userId;
    private string $title;
    private string $description;
    private float $price;


    public function __construct
    (
        $pProductId= -1,
        $pUserId = -1,
        $pDescription = "",
        $pTitle = "",
        $pPrice = -1
    )
    {
        // we check all cases inside the function
        self::initializeProperties($pProductId,$pUserId,$pDescription,$pTitle,$pPrice);
    }


    public function getProductId() : int
    {
        return $this->productId;
    }

    public function setProductId(string $pProductId) : void
    {
        $this->productId = $pProductId;
    }


    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription($pDescription) : void
    {
        $this->description = $pDescription;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $pUserId): void
    {
        $this->userId = $pUserId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $pTitle): void
    {
        $this->title = $pTitle;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $pPrice): void
    {
        $this->price = $pPrice;
    }


    private function initializeProperties ($pProductId,$pUserId,$pDescription,$pTitle,$pPrice) : void
    {
        if ($pProductId < 0){
            // use the default initialization if nothing was sent in the param
            return;
        }
        else if (
            $pProductId > 0 &&
            $pUserId > 0 &&
            strlen($pDescription) > 0 &&
            strlen($pTitle) > 0 &&
            $pPrice > 0
        ){
            $this->productId = $pProductId;
            $this->userId = $pUserId;
            $this->description = $pDescription;
            $this->title = $pTitle;
            $this->price = $pPrice;
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

                $this->productId = $pProductId;
                $this->userId = $queryProductAssocRow['user_id'];
                $this->title = $queryProductAssocRow['title'];
                $this->description = $queryProductAssocRow['description'];
                $this->price = $queryProductAssocRow['price'];
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
        }
        array_push($list,$product);

        return $list;
    }

    public static function listProductsByCategory($categoryId): ?array
    {
        $products = [];
        $mySqliConnection = openDatabaseConnection();
        $SQL = "SELECT * FROM product p JOIN product_category pc ON p.product_id = pc.product_id  WHERE pc.category_id = ?";
        $stmt = $mySqliConnection->prepare($SQL);
        $stmt->bind_param('i', $categoryId);
        $stmt->execute();
        $results = $stmt->get_result();
        // Fetch user data (assuming you have a user class or similar)
        while ($row = $results->fetch_assoc()){
            $product = new Product();
            $product->productId = $row['product_id'];
            $product->userId = $row['user_id'];
            $product->title = $row['title'];
            $product->description = $row['description'];
            $product->price = $row['price'];
            $products[] = $product;
        }
        return $products;
    }

    public static function createProduct($pUserId, $pTitle, $pDescription, $pPrice): void {
        $mySqliConnection = openDatabaseConnection();
        $sql = "INSERT INTO product (user_id, title, description, price) VALUES (?, ?, ?, ?)";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('issd', $pUserId, $pTitle, $pDescription, $pPrice);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }

    public function updateProduct($post){
        $sqlConnection = openDatabaseConnection();
        $sqlUpdateQuery =
            "UPDATE `product` SET user_id='" . $post[''] . "',title='" . $post[''] . "', description='" . $post[''] . "', price='" . $post[''] . "' WHERE product_id='" . $_GET[''] . "';";
        $sqlConnection->query($sqlUpdateQuery);

        $sqlConnection->close();
    }

    public function deleteProduct(){
        $sqlConnection = openDatabaseConnection();
        $deleteQuery = "DELETE FROM `PRODUCT` WHERE product_id='" . $_GET[''] . "';";
        $sqlConnection->query($deleteQuery);
        $sqlConnection->close();
    }


}