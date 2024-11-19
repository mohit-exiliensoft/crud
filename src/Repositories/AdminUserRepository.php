<?php

namespace User\Crud\Repositories;

use User\Crud\Interfaces\AdminUserRepositoryInterface;
use App\Models\User;

class AdminUserRepository implements AdminUserRepositoryInterface
{
    public function getUserById($userId)
    {
        return User::find($userId);
    }

    public function createUser(array $userDetails)
    {
        $user = User::create($userDetails);
        return $user;
    }

    public function updateUser(int $userId, array $userDetails)
    {
        $user = User::findOrFail($userId);
        $user->update($userDetails);
        return $user;
    }

    public function deleteUserById($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return true;
    }
}