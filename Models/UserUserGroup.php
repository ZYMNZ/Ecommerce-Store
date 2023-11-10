<?php
include_once "database.php";
class UserUserGroup {
    private int $userId;
    private int $userGroupId;
    public function __construct(int $userId = -1, int $userGroupId = -1)
    {
        self::initializeProperties($userId, $userGroupId);
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getUserGroupId(): int
    {
        return $this->userGroupId;
    }

    public function setUserGroupId(int $userGroupId): void
    {
        $this->userGroupId = $userGroupId;
    }
    private function initializeProperties ($pUserId, $pUserGroupId) : void {
        if ($pUserId < 0){
            // use the default initialization if nothing was sent in the param
            return;
        } else if (
            $pUserId > 0 &&
            $pUserGroupId > 0
        ){
            $this->userId = $pUserId;
            $this->userGroupId = $pUserGroupId;
        } else if ($pUserId > 0){
            // initialize only if the Product id was sent
            $mySqlConnection = openDatabaseConnection();
            $sql = "SELECT * FROM user_usergroup WHERE user_id = ?";
            $stmt = $mySqlConnection->prepare($sql);
            $stmt->bind_param("i",$pUserId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0){
                $result = $result->fetch_assoc();
                $this->userId = $pUserId;
                $this->userGroupId = $result['usergroup_id'];
            }
        }
    }
    public static function permissions($pUserId): array
    {
        $mySqlConnection = openDatabaseConnection();
        $sql = "SELECT * FROM user_usergroup WHERE user_id = ?";
        $stmt = $mySqlConnection->prepare($sql);
        $stmt->bind_param("i",$pUserId);
        $stmt->execute();
        $results = $stmt->get_result();
        $permissions = [];
        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()){
                $userUserGroup = new UserUserGroup();
                $userUserGroup->userId = $pUserId;
                $userUserGroup->userGroupId = $row['usergroup_id'];
                $permissions[] = $userUserGroup;
            }
        }
        return $permissions;
    }

    public static function createUserUserGroup($pUserId, $pUserGroupId): void {
        $mySqliConnection = openDatabaseConnection();
        $sql = "INSERT INTO user_usergroup (user_id, usergroup_id) VALUES (?, ?)";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('ii', $pUserId, $pUserGroupId);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }
    public static function updateUserUserGroup($pUserId, $pUserGroupId) {
        $mySqliConnection = openDatabaseConnection();
        $sql = "UPDATE user_usergroup SET usergroup_id = ? WHERE user_id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('ii', $pUserId, $pUserGroupId);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }
    public static function deleteUserUserGroup($pUserId) {
        $mySqliConnection = openDatabaseConnection();
        $sql = "DELETE FROM user_usergroup WHERE user_id = ?";
        $stmt = $mySqliConnection->prepare($sql);
        $stmt->bind_param('i', $pUserId);
        $stmt->execute();
        $stmt->close();
        $mySqliConnection->close();
    }
}