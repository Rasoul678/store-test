<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements ProductInterface
{
    use SoftDeletes;

    protected $table = 'products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function getCategories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

}
