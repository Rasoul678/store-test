<?php

namespace App\Models;

interface OrderItemInterface
{
    public function getProduct();

    public function getOrder();
}
