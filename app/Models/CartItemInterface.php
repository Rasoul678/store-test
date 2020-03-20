<?php

namespace App\Models;

interface CartItemInterface
{
    public function getProduct();

    public function getShoppingCart();
}
