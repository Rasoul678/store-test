<?php

namespace App\Models;

interface ProductInterface
{
    public function getOrderItems();

    public function getCategories();
}
