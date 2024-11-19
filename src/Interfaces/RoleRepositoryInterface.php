<?php 

namespace User\Crud\Interfaces;

interface RoleRepositoryInterface
{
    public function getAllRoles();
    public function getRoleById($roleId);
    public function createRole(array $roleDetails);
    public function updateRole(int $roleId, array $roleDetails);
    public function deleteRoleById(int $roleId);
}