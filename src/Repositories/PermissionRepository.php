<?php

namespace User\Crud\Repositories;

use User\Crud\Interfaces\PermissionRepositoryInterface;
use User\Crud\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function getPermissionById(int $permissionId)
    {
      return Permission::find($permissionId);
    } 
 
    public function createPermission(array $permissionDetails)
    {
      $permission = Permission::create($permissionDetails);
      return $permission;
    }
 
    public function updatePermission(int $permissionId, array $permissionDetails)
    {
      $permission = Permission::findOrFail($permissionId);
      $permission->update($permissionDetails);
      return $permission; 
    }
 
    public function deletePermissionById(int $permissionId)
    {
     $permission = Permission::find($permissionId);
     $permission->delete();
     return true;
    }
}