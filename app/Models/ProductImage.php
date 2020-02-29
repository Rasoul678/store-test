<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model implements ProductImageInterface
{
    use SoftDeletes;
    protected $table = 'product_images';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'product_id',
        'name',
        'image',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'product_id' => 'integer'
    ];

    public function getProduct()
    {
        return $this->belongsTo(Product::class);
    }
}
