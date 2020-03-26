<?php

namespace App\Models;

interface UserInterface
{
    /**
     * Get full name of user.
     *
     * @return string
     */
    public function getFullNameAttribute();
}
