<?php

namespace User\Crud\Interfaces;

interface AdminUserRepositoryInterface
{
    public function getUserById(int $userId);

    public function createUser(array $userDetails);

    public function updateUser(int $userId, array $userDetails);

    public function deleteUserById(int $userId);
}
