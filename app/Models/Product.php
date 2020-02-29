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
          'brand_id',
          'name',
          'description',
          'image',
          'price',
          'type',
          'created_at',
          'updated_at',
          'deleted_at'
      ];
      
      
      public function getOrders()
      {
            return $this->belongsToMany (Order::class);
      }
      
      public function getCategories()
      {
            return $this->belongsToMany(Category::class);
      }
      
      public function getBrand()
      {
            return $this->belongsTo(Brand::class);
      }
      
      public function getImages()
      {
            return $this->hasMany(ProductImage::class);
      }
    
    
}
