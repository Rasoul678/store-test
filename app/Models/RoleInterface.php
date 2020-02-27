<?php

namespace App\Models;

interface RoleInterface
{
    public function getPermissions();

    public function getUsers();
}
