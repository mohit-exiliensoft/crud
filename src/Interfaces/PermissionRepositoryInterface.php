<?php 

namespace User\Crud\Interfaces;

interface PermissionRepositoryInterface
{
    public function getPermissionById(int $permissionId);

    public function createPermission(array $permissionDetails);

    public function updatePermission(int $permissionId, array $permissionDetails);

    public function deletePermissionById(int $permissionId);

}