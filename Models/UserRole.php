<?php
include_once "database.php";

class UserRole
{
    private int $userId;
    private int $roleId;

    public function __construct(int $pUserId = -1, int $pRoleId = -1)
    {
        $this->initializeProperties($pUserId, $pRoleId);
    }

    private function initializeProperties($pUserId, $pRoleId): void
    {
        if ($pUserId < 0) return; else if ($pUserId > 0 && $pRoleId > 0) {
            $this->userId = $pUserId;
            $this->roleId = $pRoleId;
        } else if ($pUserId > 0) {
            //TODO might not need this
            $this->getUserRoleById($pUserId);
        }
    }

    //TODO might not need this
    private function getUserRoleById($pUserId): void
    {
        $dBConnection = openDatabaseConnection();
        $sql = "SELECT * FROM user_role WHERE user_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('i', $pUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            $this->userId = $pUserId;
            $this->roleId = $result['role_id'];
        }
    }

    public static function getUserRoles($pUserId): ?array
    {
        $dBConnection = openDatabaseConnection();
        $sql = "SELECT * FROM user_role WHERE user_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param("i", $pUserId);
        $stmt->execute();
        $results = $stmt->get_result();
        $permissions = [];
        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $userRole = new UserRole();
                $userRole->userId = $pUserId;
                $userRole->roleId = $row['role_id'];
                $permissions[] = $userRole;
            }
            return $permissions;
        }
        return null;
    }

    public static function getUserByRoleId($pRoleId): ?array
    {
        $dBConnection = openDatabaseConnection();
        $sql = "SELECT * FROM user_role WHERE role_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param("i", $pRoleId);
        $stmt->execute();
        $results = $stmt->get_result();
        $userRoles = [];
        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $userRole = new UserRole();
                $userRole->userId = $row['user_id'];
                $userRole->roleId = $pRoleId;
                $userRoles[] = $userRole;
            }
            return $userRoles;
        }
        return null;
    }

    public static function createUserRole($pUserId, $pRoleId): bool
    {
        $dBConnection = openDatabaseConnection();
        $sql = "INSERT INTO user_role (user_id, role_id) VALUES (?, ?)";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('ii', $pUserId, $pRoleId);
        $isSuccessful = $stmt->execute();
        $stmt->close();
        $dBConnection->close();
        return $isSuccessful;
    }

    public static function updateUserRole($pUserId, $pRoleId): void
    {
        $dBConnection = openDatabaseConnection();
        $sql = "UPDATE user_role SET role_id = ? WHERE user_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('ii', $pRoleId, $pUserId);
        $stmt->execute();
        $stmt->close();
        $dBConnection->close();
    }

    public static function deleteUserRole($pUserId): void
    {
        $dBConnection = openDatabaseConnection();
        $sql = "DELETE FROM user_role WHERE user_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('i', $pUserId);
        $stmt->execute();
        $stmt->close();
        $dBConnection->close();
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

}