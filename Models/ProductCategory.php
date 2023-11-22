<?php
include_once "database.php";
class ProductCategory {
    private int $productId = -1;
    private int $categoryId = -1;

    public function __construct(int $pProductId = -1, int $pCategoryId = -1) {
        self::initializeProperties($pProductId, $pCategoryId);
    }
    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }
    private function initializeProperties(int $pProductId, int $pCategoryId) : void
    {

        if ($pProductId < 0) {
            // use the default initialization if nothing was sent in the param
            return;
        } else if (
            $pProductId > 0 &&
            $pCategoryId > 0
        ){
            $this->productId = $pProductId;
            $this->categoryId = $pCategoryId;
        } else if ($pProductId > 0){

            // initialize only if the Product id was sent
            $mySqlConnection = openDatabaseConnection();
            $sql = "SELECT * FROM product_category WHERE product_id = ?";
            $stmt = $mySqlConnection->prepare($sql);
            $stmt->bind_param("i",$pProductId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0){
                $result = $result->fetch_assoc();
                $this->productId = $pProductId;
                $this->categoryId = $result['category_id'];
            }
        }
    }
    public static function createProductCategory($pProductId, $pCategoryId): void {
        $mySqliConnection = openDatabaseConnection();
        $sql = "INSERT INTO product_category (product_id, category_id) VALUES (?, ?)";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('ii', $pProductId, $pCategoryId);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }

    public static function updateProductCategory($pProductId, $pCategoryId) {
        $mySqliConnection = openDatabaseConnection();
        $sql = "UPDATE product_category SET category_id = ? WHERE product_id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('ii', $pCategoryId, $pProductId);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }
    public static function deleteProductCategory($pProductId) {
        $mySqliConnection = openDatabaseConnection();
        $sql = "DELETE FROM product_category WHERE product_id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pProductId);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }
}