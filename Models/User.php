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


    public function initializeProperties(
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
            && strlen($pDescription) >= 0
            && strlen($pPhoneNumber) >= 0
        ) {
            // Initialize all the properties if all parameters were sent
            $this->userId = htmlentities($pUserId,ENT_QUOTES);
            $this->firstName = htmlentities($pFirstName,ENT_QUOTES);
            $this->lastName =htmlentities( $pLastName,ENT_QUOTES);
            $this->email = htmlentities($pEmail,ENT_QUOTES);
            $this->password = htmlentities($pPassword,ENT_QUOTES);
            $this->description =htmlentities( $pDescription,ENT_QUOTES);
            $this->phoneNumber = htmlentities($pPhoneNumber,ENT_QUOTES);
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
            $this->userId = htmlentities($pUserId,ENT_QUOTES);
            $this->firstName = htmlentities($result["first_name"],ENT_QUOTES);
            $this->lastName = htmlentities($result["last_name"],ENT_QUOTES);
            $this->email = htmlentities($result["email"],ENT_QUOTES);
            $this->password =htmlentities( $result["password"],ENT_QUOTES);
            $this->description = htmlentities($result["description"],ENT_QUOTES) ?? "";
            $this->phoneNumber = htmlentities($result["phone_number"],ENT_QUOTES) ?? "";
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

    public static function checkForExistingEmail($pEmail): bool
    {
        $dBConnection = openDatabaseConnection();
        $SQL = "SELECT * FROM user WHERE email = ?";
        $stmt = $dBConnection->prepare($SQL);
        $stmt->bind_param('s', $pEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
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

    public static function updatePersonalInfo(?string $pFirstName, ?string $pLastName, ?string $pEmail, ?string $pPassword, ?string $pDescription, ?string $pPhoneNumber, ?string $pUserId): bool
    {
        $dBConnection = openDatabaseConnection();
        $sql = "UPDATE user SET first_name = ?, last_name = ?, email = ?, password = ?, description = ?, phone_number = ? WHERE user_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('ssssssi',
            $pFirstName,
            $pLastName,
            $pEmail,
            $pPassword,
            $pDescription,
            $pPhoneNumber,
            $pUserId
        );
        $isSuccessful = $stmt->execute();
        $stmt->close();
        $dBConnection->close();
        return $isSuccessful;
    }

    public static function deleteUser ($pUserId) : bool
    {
        $conn = openDatabaseConnection();
        $sqlQuery = "DELETE FROM user WHERE user_id = ?";
        $prepareStmt = $conn->prepare($sqlQuery);
        $prepareStmt->bind_param("i",$pUserId);
        $isDeleted = $prepareStmt->execute();
        if ($isDeleted){
            return true;
        }
        return false;
    }




}
