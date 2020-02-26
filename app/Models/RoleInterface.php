<?php

namespace App\Models;

interface RoleInterface
{
    public function permissions();
    public function users();
}
