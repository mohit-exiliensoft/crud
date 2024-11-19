<?php

namespace User\Crud\Repositories;

use User\Crud\Interfaces\RoleRepositoryInterface;
use User\Crud\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{

  public function getAllRoles()
    {
        return Role::get();
    }
    
   public function getRoleById($roleId)
   {
      return Role::find($roleId);
   } 

   public function createRole(array $roleDetails)
   {

    $role = Role::create(['guard_name' => 'web', 'name' => $roleDetails['name']]);

      if (!empty($roleDetails['permissions'])) {
          $role->permissions()->sync($roleDetails['permissions']);
     }

    return $role;
   }

   public function updateRole(int $roleId, array $roleDetails)
   {
     $role = Role::findOrFail($roleId);
     $role->save();

     // Sync permissions
    if (isset($roleDetails['permissions'])) {
      $role->permissions()->sync($roleDetails['permissions']);
    }

     return $role;
   }

   public function deleteRoleById(int $roleId)
   {
    $role = Role::find($roleId);
    $role->delete();
    return $role;
   }

}