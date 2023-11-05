<?php
include_once "database.php";

class User{
    private int $userId = -1;
    private string $firstName = "";
    private string $lastName = "";
    private string $email = "";
    private string $password = "";


    private string $description = "";
    private string $phoneNumber = "";
    private int $groupId = -1;

    function __construct(
        $pUserId = -1,
        $pFirstName = "",
        $pLastName = "",
        $pEmail = "",
        $pPassword = "",
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
            && strlen($pPassword) > 0
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
                $pPassword,
                $pDescription,
                $pPhoneNumber,
                $pGroupId
            );
        }
        else if($pUserId > 0) {
            // Initialize the instance variables using a SQL statement
            // If only the user id was sent
            $mySqliConnection = openDatabaseConnection();

            $getUserByIdQuery = "SELECT * FROM `USER` WHERE `USER_ID` = ?;";
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
                    $queriedUserAssocRow["password"],
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
        $pPassword,
        $pDescription,
        $pPhoneNumber,
        $pGroupId
    ) : void{
        $this->userId = $pUserId;
        $this->firstName = $pFirstName;
        $this->lastName = $pLastName;
        $this->email = $pEmail;
        $this->password = $pPassword;
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

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $pPassword): void
    {
        $this->password = $pPassword;
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
        // Newly registered user
        $insertQueryResults = self::insertUserIntoDatabase($pPostArray);

        $insertUserInUserGrpIsSuccessful = false;
        if($insertQueryResults["insertUserIsSuccessful"]) {
            // We insert the new user in the user group associative table (user_usergroup)
            // Because the user is related to a user group
            $insertUserInUserGrpIsSuccessful = self::insertUserInUserGrpAssocTable($insertQueryResults["newRegisteredUserId"]);
        }

        return $insertUserInUserGrpIsSuccessful;
    }


    private static function insertUserIntoDatabase($pPostArray) : array {
        // This function is used in register.php to insert the newly registered user
        // In the database


        // This ID is the ID for the buyer group
        // We use this to insert the group ID in the User table for the
        // New registered user row
        $buyerGroupId = 3;
        $mySqliConnection = openDatabaseConnection();
        // Insert the user into the user table
        // That is in the database

        $insertNewUserQuery = "INSERT INTO `User` (first_name, 
            last_name, 
            email, 
            password,
            description,
            phone_number,
            group_id) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $prepInsertNewUserQuery = $mySqliConnection->prepare(
            $insertNewUserQuery
        );

        $hashedPassword = md5($pPostArray["password"]);
        $prepInsertNewUserQuery->bind_param(
            "ssssssi",
            $pPostArray["firstName"],
            $pPostArray["lastName"],
            $pPostArray["email"],
            $hashedPassword,
            $pPostArray["description"],
            $pPostArray["phoneNumber"],
            $buyerGroupId
        );

        $insertUserIsSuccessful = $prepInsertNewUserQuery->execute();
        // Return the new registered user ID generated by auto_increment
        // Because we need it to insert the user into the associative table
        $newRegisteredUserId = $mySqliConnection->insert_id;
        $insertQueryResults = array(
            "insertUserIsSuccessful" => $insertUserIsSuccessful,
            "newRegisteredUserId" => $newRegisteredUserId
        );

        return $insertQueryResults;
    }


    private static function insertUserInUserGrpAssocTable($pUserId) : bool {
        /* Insert the user into the user_usergroup associative table
        Because the newly registered user is in the buyer user group by default
        */
        $buyerGroupId = 3;
        $mySqliConnection = openDatabaseConnection();

        $insertNewUserInUserGrpQuery = "INSERT INTO `User_UserGroup` (user_id,
        usergroup_id) VALUES (?, ?);";
        $prepInsertNewUserInUserGrpQuery = $mySqliConnection->prepare($insertNewUserInUserGrpQuery);
        $prepInsertNewUserInUserGrpQuery->bind_param(
            "ii",
            $pUserId,
            $buyerGroupId
        );

        // Return a bool if the insert query was successful or not
        // Because the registerUser returns a bool to determine whether it was successful or not
        $insertUserInUserGrpIsSuccessful = $prepInsertNewUserInUserGrpQuery->execute();

        return $insertUserInUserGrpIsSuccessful;
    }
}

?>