<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model implements BrandInterface
{
    use SoftDeletes;

    protected $table = 'brands';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'logo',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function getProducts()
    {
        return $this->hasMany(Product::class);
    }
}
