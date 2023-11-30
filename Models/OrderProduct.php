<?php
include_once "database.php";
class OrderProduct
{
    private int $orderId;
    private int $productId;
    public function __construct
    (
        $pOrderId = -1,
        $pProductId = -1
    )
    {
        $this->initializeProperties(
            $pOrderId,
            $pProductId
        );
    }
    private function initializeProperties($pOrderId, $pProductId): void
    {
        if ($pOrderId < 0) return;

        else if (
            $pOrderId > 0
            && $pProductId > 0
        ) {
            $this->orderId = $pOrderId;
            $this->productId = $pProductId;
        }

        else if ($pOrderId > 0) {
            $this->getOrderByProduct($pProductId);
        }
    }
    private function getOrderByProduct($pProductId): ?array
    {
        $mySqliConnection = openDatabaseConnection();
        $sql = "SELECT * FROM order_product WHERE product_Id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pProductId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $orders = [];
            while ($result = $result->fetch_assoc()){
                $orderProduct = new OrderProduct();
                $orderProduct->orderId = $result['order_id'];
                $orderProduct->productId = $result['product_Id'];
                $orders[] = $orderProduct;
            }
            return $orders;
        }
        return null;
    }
    private function getProductByOrder($pProductId): ?array
    {
        $mySqliConnection = openDatabaseConnection();
        $sql = "SELECT * FROM order_product WHERE order_Id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pProductId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $products = [];
            while ($result = $result->fetch_assoc()) {
                $orderProduct = new OrderProduct();
                $orderProduct->orderId = $result['order_id'];
                $orderProduct->productId = $result['product_Id'];
                $products[] = $orderProduct;
            }
            return $products;
        }
        return null;
    }



    public static function createOrderProduct($pOrderId, $pProductId): void
    {
        $conn = openDatabaseConnection();
        $sqlQuery = "INSERT INTO order_product (order_id,product_id) VALUES (?,?)";
        $prepareStmt = $conn->prepare($sqlQuery);
        $prepareStmt->bind_param("ii" , $pOrderId, $pProductId);
        $prepareStmt->execute();
        $prepareStmt->close();
        $conn->close();
    }

    public static function updateOrderProduct($pOrderId, $pProductId)
    {
        $conn = openDatabaseConnection();
        $sqlQuery = "UPDATE order_product SET order_id = ? WHERE product_id = ?";
        $prepareStmt = $conn->prepare($sqlQuery);
        $prepareStmt->bind_param("ii" , $pOrderId, $pProductId);
        $prepareStmt->execute();
        $prepareStmt->close();
        $conn->close();
    }

    public static function deleteOrderProduct($pOrderId)
    {
        $conn = openDatabaseConnection();
        $sqlQuery = "DELETE FROM order_product where order_id = ?";
        $prepareStmt = $conn->prepare($sqlQuery);
        $prepareStmt->bind_param("i" , $pOrderId);
        $prepareStmt->execute();
        $prepareStmt->close();
        $conn->close();
    }
}