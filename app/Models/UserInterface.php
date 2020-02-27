<?php

namespace App\Models;

interface UserInterface
{
    public function getRoles();

    public function getOrders();

    public function getAddresses();
}
