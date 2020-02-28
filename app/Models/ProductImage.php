<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model implements ProductImageInterface
{
      protected $table = 'product_images';
      
      protected $fillable = ['product_id', 'name'];
      
      protected $casts = [
          'product_id'    =>  'integer'
      ];
      
      public function getProduct()
      {
            return $this->belongsTo(Product::class);
      }
}
