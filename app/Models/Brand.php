<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model implements BrandInterface
{
      protected $table = 'brands';
      
      protected $fillable = ['name', 'logo'];
      
      
      public function getProducts()
      {
            return $this->hasMany(Product::class);
      }
}
