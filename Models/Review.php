<?php
include_once "database.php";
    class Review {
        private int $reviewId;
        private int $productId;
        private int $userId;
        private string $review;

        function __construct(
            $pReviewId = -1,
            $pProductId = -1,
            $pUserId = -1,
            $pReview = ""
        ) {
            $this->initializeProperties(
                $pReviewId,
                $pProductId,
                $pUserId,
                $pReview
            );
        }

        function initializeProperties(
            $pReviewId,
            $pProductId,
            $pUserId,
            $pReview
        ) {
            if($pReviewId < 0) {
                // If the review id is -1
                // Then the other parameters are empty and we don't initialize
                return;
            }
            else if($pReviewId > 0
                && $pProductId > 0
                && $pUserId > 0
                && strlen($pReview) > 0
            ) {
                $this->reviewId = $pReviewId;
                $this->productId = $pProductId;
                $this->userId = $pUserId;
                $this->review = $pReview;
            }
            else if($pReviewId > 0) {
                $mySqliConnection = openDatabaseConnection();
                $getReviewByIdQuery = "SELECT * FROM `review` WHERE `review_id` = ?;";
                $prepGetReviewByIdQuery = $mySqliConnection->prepare($getReviewByIdQuery);
                $prepGetReviewByIdQuery->bind_param("i", $pReviewId);
                $prepGetReviewByIdQuery->execute();
                $getReviewByIdSqliResult = $prepGetReviewByIdQuery->get_result();

                if($getReviewByIdSqliResult->num_rows > 0) {
                    $queriedReviewAssocRow = $getReviewByIdSqliResult->fetch_assoc();

                    $this->reviewId = $pReviewId;
                    $this->productId = $queriedReviewAssocRow["product_id"];
                    $this->userId = $queriedReviewAssocRow["user_id"];
                    $this->review = $queriedReviewAssocRow["review"];
                }
            }
        }

        public function getReviewId(): int
        {
            return $this->reviewId;
        }

        public function setReviewId(int $pReviewId): void
        {
            $this->reviewId = $pReviewId;
        }

        public function getProductId(): int
        {
            return $this->productId;
        }

        public function setProductId(int $pProductId): void
        {
            $this->productId = $pProductId;
        }

        public function getUserId(): int
        {
            return $this->userId;
        }

        public function setUserId(int $pUserId): void
        {
            $this->userId = $pUserId;
        }

        public function getReview(): string
        {
            return $this->review;
        }

        public function setReview(string $pReview): void
        {
            $this->review = $pReview;
        }

        public static function insertReview(array $postArray) : array {
            $dbConnection = openDatabaseConnection();
            $sqlQuery = "INSERT INTO REVIEW (product_id, user_id, review) VALUES
                (?, ?, ?);";
            $sqlStatement = $dbConnection->prepare($sqlQuery);
            $sqlStatement->bind_param("iis", $_GET["productId"], $_SESSION["user_id"], $postArray["review"]);
            $isSuccessful = $sqlStatement->execute();
            $newReviewId = $dbConnection->insert_id;
            $sqlStatement->close();
            $dbConnection->close();

            return [
                "isSuccessful" => $isSuccessful,
                "newReviewId" => $newReviewId
            ];
        }

        public static function listReviewsByProductId(int $pProductId) : array {
            $dbConnection = openDatabaseConnection();
            $sqlQuery = "SELECT * FROM REVIEW WHERE product_id = ?;";

            $sqlStatement = $dbConnection->prepare($sqlQuery);
            $sqlStatement->bind_param("i", $pProductId);
            $sqlStatement->execute();
            $sqliResult = $sqlStatement->get_result();
            $reviews = [];
            if($sqliResult->num_rows > 0) {
                while($reviewRow = $sqliResult->fetch_assoc()) {
                    $review = new Review();
                    $review->reviewId = $reviewRow["review_id"];
                    $review->productId = $reviewRow["product_id"];
                    $review->userId = $reviewRow["user_id"];
                    $review->review = $reviewRow["review"];
                    $reviews[] = $review;
                }
            }
            return $reviews;
        }
    }

?>