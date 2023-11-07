<?php
include_once "database.php";
    class Review {
        private int $reviewId;
        private int $productId;
        private int $userId;


        private string $review;
        private int $numStars;

        function __construct(
            $pReviewId = -1,
            $pProductId = -1,
            $pUserId = -1,
            $pReview = "",
            $pNumStars = -1
        ) {
            $this->initializeProperties(
                $pReviewId,
                $pProductId,
                $pUserId,
                $pReview,
                $pNumStars
            );
        }

        function initializeProperties(
            $pReviewId,
            $pProductId,
            $pUserId,
            $pReview,
            $pNumStars
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
                && $pNumStars > 0
            ) {
                $this->reviewId = $pReviewId;
                $this->productId = $pProductId;
                $this->userId = $pUserId;
                $this->review = $pReview;
                $this->numStars = $pNumStars;
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
                    $this->numStars = $queriedReviewAssocRow["numStars"];
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

        public function getNumStars(): int
        {
            return $this->numStars;
        }

        public function setNumStars(int $pNumStars): void
        {
            $this->numStars = $pNumStars;
        }
    }

?>