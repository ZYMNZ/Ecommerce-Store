<?php
include_once 'database.php';

class Role
{
    private int $roleId = -1;
    private string $roleName = "";

    function __construct(
        $pRoleId = -1,
        $pRoleName = ""
    ) {
        self::initializeProperties(
            $pRoleId,
            $pRoleName
        );
    }

    private function initializeProperties(
        $pRoleId,
        $pRoleName
    ): void
    {
        if ($pRoleId < 0) return;
        else if (
            $pRoleId > 0
            && strlen($pRoleName) > 0
        ) {
            $this->roleId = $pRoleId;
            $this->roleName = $pRoleName;
        } else if ($pRoleId > 0) {
            $this->getRoleById($pRoleId);
        }
    }

    private function getRoleById($pRoleId): void
    {
        $dBConnection = openDatabaseConnection();
        $sql = "SELECT * FROM role WHERE role_id = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('i', $pRoleId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            $this->roleId = $pRoleId;
            $this->roleName = $result['role_name'];
        }
    }
    public static function getRoleByName($pRoleName): ?Role
    {
        $dBConnection = openDatabaseConnection();
        $sql = "SELECT * FROM role WHERE role_name = ?";
        $stmt = $dBConnection->prepare($sql);
        $stmt->bind_param('s', $pRoleName);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $role = new Role();
            $result = $result->fetch_assoc();
            $role->roleId = $result['role_id'];
            $role->roleName = $pRoleName;
            return $role;
        }
        return null;
    }

    public static function convertRoleIdsToRoleNames(array $pRoleIds): ?array
    {
//        var_dump("before hello");
        if (!$pRoleIds) return null;
//        var_dump($pRoleIds);
        $roleNames = [];
        foreach ($pRoleIds as $pRoleId) {

            $role = new Role($pRoleId->getRoleId());
            $roleNames[] = $role->getRoleName();
        }
        return $roleNames;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

    public function getRoleName(): string
    {
        return $this->roleName;
    }

    public function setRoleName(string $roleName): void
    {
        $this->roleName = $roleName;
    }
}