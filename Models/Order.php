<?php
include_once "database.php";
include_once "Models/OrderProduct.php";
include_once "Models/Product.php";


class Order {
    private int $orderId;
    private int $userId;
    private string $orderDate;
    private string $orderComment;
    private bool $isPaid;
    public function __construct
    (
        $pOrderId= -1,
        $pUserId = -1,
        $pOrderDate = "",
        $pOrderComment = "",
        $pIsPaid = false
    )
    {
        $this->initializeProperties(
            $pOrderId,
            $pUserId,
            $pOrderDate,
            $pOrderComment,
            $pIsPaid
        );
    }

    private function initializeProperties($pOrderId, $pUserId, $pOrderDate, $pOrderComment, $pIsPaid): void
    {
        if ($pOrderId < 0) return;
        else if (
            $pOrderId > 0
            && $pUserId > 0
            && strlen($pOrderComment) > 0
        ) {
            $this->orderId = htmlentities($pOrderId,ENT_QUOTES);
            $this->userId = htmlentities($pUserId,ENT_QUOTES);
            $this->orderDate = htmlentities($pOrderDate,ENT_QUOTES);
            $this->orderComment = htmlentities($pOrderComment,ENT_QUOTES);
            $this->isPaid = htmlentities($pIsPaid,ENT_QUOTES);
        } else if ($pOrderId > 0) {
            $this->getOrderById($pOrderId);
        }
    }

    private function getOrderById($pOrderId): void
    {
        $mySqliConnection = openDatabaseConnection();
        $sql = "SELECT * FROM `order` WHERE order_id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pOrderId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            $this->orderId = htmlentities($pOrderId, ENT_QUOTES);
            $this->userId = htmlentities($result['user_id'], ENT_QUOTES);
            $this->orderDate = htmlentities($this->convertDate($result['order_date']), ENT_QUOTES);
            $this->orderComment = htmlentities($result['order_comment'], ENT_QUOTES);
            $this->isPaid = htmlentities($result['isPaid'], ENT_QUOTES);
        }
    }

    public static function createOrder($pUserId): array
    {
        $mySqliConnection = openDatabaseConnection();
        $sql = "INSERT INTO `order` (user_id, isPaid) VALUES (?, FALSE)";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pUserId);
        $isSuccessful = $stmt->execute();
        $orderId = $mySqliConnection->insert_id;
        $stmt->close();
        $mySqliConnection->close();
        return [
            'isSuccessful' => $isSuccessful,
            'orderId' => $orderId
        ];
    }
    public static function orderConfirm($pOrderId): void
    {
        $dBConnection = openDatabaseConnection();
        $sql = "UPDATE `order` SET order_date = date_format(current_timestamp(),'%Y-%m-%d %h:%i:%s %tt'), isPaid = TRUE WHERE order_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('i', $pOrderId);
        $stmt->execute();
        $stmt->close();
        $dBConnection->close();
    }

    public static function cartExists($pUserId): ?Order
    {
        $mySqliConnection = openDatabaseConnection();
        $sql = "SELECT * FROM `order` WHERE user_id = ? AND isPaid = FALSE";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $cart = new Order();
            $result = $result->fetch_assoc();
            $cart->orderId = $result['order_id'];
            $cart->userId = $result['user_id'];
            $cart->isPaid = $result['isPaid'];
            return $cart;
        }
        return null;
    }

    private function convertDate($date): string
    {
        $timestamp = strtotime($date);
        return date("F j, Y h:i:s a", $timestamp);
//        It would be better to use 12h cycle => h:i:s a
//        small h for 12hrs cycle and 'a' for am\pm
    }

    // return the order id DONE
    // from order id get all products id
    // from products id get their title and price and category id
    // from cat id get the cat name
    public static function displayCart($pUserId) : ?array
    {
        $orderObj = self::cartExists($pUserId);
        if ($orderObj !== null) {
            $orderId = $orderObj->getOrderId();
            $arrayProducts = OrderProduct::getProductByOrder($orderId);

            $list = [];
            if ($arrayProducts != null) {
                foreach ($arrayProducts as $productId) {
                    $prodId = $productId->getProductId();

                    $product = new Product($prodId);
                    $categoryName = $product->getCategoryNameByProductId($prodId);
                    $list[] = array("title" => "{$product->getTitle()}", "price" => "{$product->getPrice()}", "productId" => "{$product->getProductId()}", "category" => "{$categoryName}");
                }

                return $list;
            }
        }
        return null;
    }


    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getOrderDate(): int
    {
        return $this->orderDate;
    }

    public function setOrderDate(int $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    public function getOrderComment(): string
    {
        return $this->orderComment;
    }

    public function setOrderComment(string $orderComment): void
    {
        $this->orderComment = $orderComment;
    }

    public function isPaid(): bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(bool $isPaid): void
    {
        $this->isPaid = $isPaid;
    }



}