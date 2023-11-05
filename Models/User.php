<?php
include_once "database.php";

class User{
    private int $userId = -1;
    private string $firstName = "";
    private string $lastName = "";
    private string $email = "";

    private string $description = "";
    private string $phoneNumber = "";
    private int $groupId = -1;

    function __construct(
        $pUserId = -1,
        $pFirstName = "",
        $pLastName = "",
        $pEmail = "",
        $pDescription = "",
        $pPhoneNumber = "",
        $pGroupId = -1
    ) {
        if($pUserId < 0) {
            // Use default initialized variables if nothing was sent
            // Through parameters
            return;
        }

        if($pUserId > 0
            && strlen($pFirstName) > 0
            && strlen($pLastName) > 0
            && strlen($pEmail) > 0
            && strlen($pDescription) > 0
            && strlen($pPhoneNumber) > 0
            && $pGroupId > 0
        ) {
            // Initialize all the properties if all parameters were sent
            $this->initializeProperties(
                $pUserId,
                $pFirstName,
                $pLastName,
                $pEmail,
                $pDescription,
                $pPhoneNumber,
                $pGroupId
            );
        }
        else if($pUserId > 0) {
            // Initialize the instance variables using a SQL statement
            // If only the user id was sent
            $mySqliConnection = openDatabaseConnection();

            $getUserByIdQuery = "SELECT
                first_name, last_name, email, description, phone_number, group_id
                FROM `USER` WHERE `USER_ID` = ?";
            $prepGetUserByIdQuery = $mySqliConnection->prepare($getUserByIdQuery);
            $prepGetUserByIdQuery->bind_param("i", $pUserId);
            $prepGetUserByIdQuery->execute();
            $getUserMySqliResult = $prepGetUserByIdQuery->get_result();

            if($getUserMySqliResult->num_rows > 0) {
                // Get the my sqli result associated with the executed
                // Prepared statement to fetch an associative row for
                // The first user found to initialize a user object
                // With user id specified

                $queriedUserAssocRow = $getUserMySqliResult->fetch_assoc();

                $this->initializeProperties(
                    $pUserId,
                    $queriedUserAssocRow["first_name"],
                    $queriedUserAssocRow["last_name"],
                    $queriedUserAssocRow["email"],
                    $queriedUserAssocRow["description"],
                    $queriedUserAssocRow["phone_number"],
                    $queriedUserAssocRow["group_id"]
                );
            }
        }
    }


    function initializeProperties(
        $pUserId,
        $pFirstName,
        $pLastName,
        $pEmail,
        $pDescription,
        $pPhoneNumber,
        $pGroupId
    ) {
        $this->userId = $pUserId;
        $this->firstName = $pFirstName;
        $this->lastName = $pLastName;
        $this->email = $pEmail;
        $this->description = $pDescription;
        $this->phoneNumber = $pPhoneNumber;
        $this->groupId = $pGroupId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $pFirstName): void
    {
        $this->firstName = $pFirstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $pLastName): void
    {
        $this->lastName = $pLastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $pEmail): void
    {
        $this->email = $pEmail;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $pDescription): void
    {
        $this->description = $pDescription;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $pPhoneNumber): void
    {
        $this->phoneNumber = $pPhoneNumber;
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }

    public function setGroupId(int $pGroupId): void
    {
        $this->groupId = $pGroupId;
    }

    public static function registerUser($pPostArray) : bool {
        $mySqliConnection = openDatabaseConnection();
        // TODO: finish register user
        /*
        $insertNewUserQuery = "INSERT INTO `User` (first_name, 
            last_name, 
            email, 
            description,
            phone_number,
            group_id) VALUES (?, ?, ?, ?, ?, ?)";
        $prepInsertNewUserQuery = $mySqliConnection->prepare(
            $insertNewUserQuery
        );
        $prepInsertNewUserQuery->bind_param();
        */
        return 0;
    }
}

?>