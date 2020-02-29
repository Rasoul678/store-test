<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements CategoryInterface
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'featured',
        'menu',
        'image',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'parent_id' => 'integer',
        'featured' => 'boolean',
        'menu' => 'boolean'
    ];


    public function getChildren()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getParent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getProducts()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id')
            ->withTimestamps();
    }

}
