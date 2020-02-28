<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model implements CategoryInterface
{
      protected $table = 'categories';
      
      protected $fillable = ['name', 'slug', 'description', 'parent_id', 'featured', 'menu', 'image'];
      
      protected $casts = [
          'parent_id' =>  'integer',
          'featured'  =>  'boolean',
          'menu'      =>  'boolean'
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
            return $this->belongsToMany(Product::class, 'category_product', 'product_id', 'category_id');
      }
      
}
