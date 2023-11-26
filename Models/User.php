<?php
include_once "database.php";
include_once 'Models/Role.php';
include_once 'Models/UserRole.php';
class User {
    private int $userId = -1;
    private string $firstName = "";
    private string $lastName = "";
    private string $email = "";
    private string $password = "";
    private string $description = "";
    private string $phoneNumber = "";


    function __construct(
        $pUserId = -1,
        $pFirstName = "",
        $pLastName = "",
        $pEmail = "",
        $pPassword = "",
        $pDescription = "",
        $pPhoneNumber = ""

    ) {
        $this->initializeProperties(
            $pUserId,
            $pFirstName,
            $pLastName,
            $pEmail,
            $pPassword,
            $pDescription,
            $pPhoneNumber,
        );
    }


    private function initializeProperties(
        $pUserId,
        $pFirstName,
        $pLastName,
        $pEmail,
        $pPassword,
        $pDescription,
        $pPhoneNumber
    ) : void {
        if($pUserId < 0) return;
        else if($pUserId > 0
            && strlen($pFirstName) > 0
            && strlen($pLastName) > 0
            && strlen($pEmail) > 0
            && strlen($pPassword) > 0
            && strlen($pDescription) > 0
            && strlen($pPhoneNumber) > 0
        ) {
            // Initialize all the properties if all parameters were sent
            $this->userId = $pUserId;
            $this->firstName = $pFirstName;
            $this->lastName = $pLastName;
            $this->email = $pEmail;
            $this->password = $pPassword;
            $this->description = $pDescription;
            $this->phoneNumber = $pPhoneNumber;
        }
        else if($pUserId > 0) {
            $this->getUserById($pUserId);
        }
    }

    private function getUserById($pUserId): void
    {
        $dBConnection = openDatabaseConnection();
        $sql = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('i', $pUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            $this->userId = $pUserId;
            $this->firstName = $result["first_name"];
            $this->lastName = $result["last_name"];
            $this->email = $result["email"];
            $this->password = $result["password"];
            $this->description = $result["description"];
            $this->phoneNumber = $result["phone_number"];
        }
    }
    public static function getUserByEmailAndPassword($pEmail, $pPassword): ?User
    {
        $dBConnection = openDatabaseConnection();
        $SQL = "SELECT * FROM user WHERE email = ? AND password = ?";
        $stmt = $dBConnection->prepare($SQL);
        $stmt->bind_param('ss', $pEmail, $pPassword);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = new User();
            $result = $result->fetch_assoc();
            $user->userId = $result['user_id'];
            $user->firstName = $result['first_name'];
            $user->lastName = $result['last_name'];
            $user->email = $pEmail;
            $user->password = $pPassword;
            $user->description = $result['description'] || null;
            $user->phoneNumber = $result['phone_number'] || null;
            return $user;
        }
        return null;
    }

    public static function registerUser($pPostArray) : ?bool
    {
        $results = self::createUser($pPostArray);
        if($results["isSuccessful"]) {
            $role = Role::getRoleByName('buyer');
            return UserRole::createUserRole($results["newRegisteredUserId"], $role->getRoleId());
        }
        return null;
    }

    private static function createUser(array $postArray): array
    {
        $dBConnection = openDatabaseConnection();

        foreach ($postArray as $key => $value) {
            if ($value === '') {
                $postArray[$key] = null;
            }
        }

        $sql = "INSERT INTO user (first_name, last_name, email, password, description, phone_number) VALUES (?, ?, ?, md5(?), ?, ?)";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('ssssss',
            $postArray['firstName'],
            $postArray['lastName'],
            $postArray['email'],
            $postArray['password'],
            $postArray['description'],
            $postArray['phoneNumber']);
        $isSuccessful = $stmt->execute();
        $userId = $dBConnection->insert_id;
        $stmt->close();
        $dBConnection->close();
        return [
            'isSuccessful' => $isSuccessful,
            'newRegisteredUserId' => $userId
        ];
    }

    public static function updatePersonalInfo(array $postFields): bool
    {
        $dBConnection = openDatabaseConnection();
        $sql = "UPDATE user SET first_name = ?, last_name = ?, email = ?, password = md5(?), description = ?, phone_number = ? WHERE user_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('ssssssi', ...$postFields);
        $isSuccessful = $stmt->execute();
        $stmt->close();
        $dBConnection->close();
        return $isSuccessful;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

<<<<<<< HEAD
<<<<<<< HEAD


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


        $mySqliConnection = openDatabaseConnection();
        // Insert the user into the user table
        // That is in the database

        $insertNewUserQuery = "INSERT INTO `user` (first_name, 
            last_name, 
            email, 
            password,
            description,
            phone_number) VALUES (?, ?, ?, ?, ?, ?);";
        $prepInsertNewUserQuery = $mySqliConnection->prepare(
            $insertNewUserQuery
        );

        $hashedPassword = md5($pPostArray["password"]);
        $prepInsertNewUserQuery->bind_param(
            "ssssss",
            $pPostArray["firstName"],
            $pPostArray["lastName"],
            $pPostArray["email"],
            $hashedPassword,
            $pPostArray["description"],
            $pPostArray["phoneNumber"]
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

        $insertNewUserInUserGrpQuery = "INSERT INTO `user_role` (user_id,
        role_id) VALUES (?, ?);";
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

    public static function getUserByEmailAndPassword($pEmail, $pPassword): ?User
    {
        $mySqliConnection = openDatabaseConnection();
        $SQL = "SELECT * FROM user WHERE email = ? AND password = ?";
        $stmt = $mySqliConnection->prepare($SQL);
        $stmt->bind_param('ss', $pEmail, $pPassword);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            $user = new User();
            $user->userId = $result['user_id'];
            $user->firstName = $result['first_name'];
            $user->lastName = $result['last_name'];
            $user->email = $pEmail;
            $user->password = $pPassword;
            $user->description = $result['description'] ? $result['description'] : '';
            $user->phoneNumber = $result['phone_number'] ? $result['phone_number'] : '';
            return $user;
        }
        // Close the statement and the database connection when done
        $stmt->close();
        $mySqliConnection->close();
        return null;
    }
=======
>>>>>>> b324fd404e5ed060621975df8b34602564d001eb
=======
>>>>>>> refs/remotes/origin/main
}
