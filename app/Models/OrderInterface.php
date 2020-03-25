<?php

namespace App\Models;

interface OrderInterface
{
    public function getUser();

    public function getOrderItem();
}
