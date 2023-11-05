<?php
include_once "database.php";

class User{
    public int $userId;
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $description;
    public string $phoneNumber;
    public int $groupId;

    function __construct(
        $pUserId = -1,
        $pFirstName = "",
        $pLastName = "",
        $pEmail = "",
        $pDescription = "",
        $pPhoneNumber = "",
        $pGroupId = -1
    ) {
        if($pUserId > 0
            && strlen($pFirstName) > 0
            && strlen($pLastName) > 0
            && strlen($pEmail) > 0
            && strlen($pDescription) > 0
            && strlen($pPhoneNumber) > 0
            && $pGroupId > 0
        ) {

        }
        else if($pUserId > 0) {
            // Initialize the instance variables using a SQL statement
            $mySqliConnection = openDatabaseConnection();

            $prepGetUserByIdQuery = $mySqliConnection->prepare("SELECT
                first_name, last_name, email, description, phone_number, group_id
                FROM `USER` WHERE `USER_ID` = ?");
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

}

?>