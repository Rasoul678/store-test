<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements ProductInterface
{
      use SoftDeletes;
      
      protected $table = 'products';
      
      protected $fillable = ['name', 'description', 'image', 'price', 'type'];
      
      
      public function orders()
      {
            return $this->belongsToMany ('Order::class');
      }
    
    
}
