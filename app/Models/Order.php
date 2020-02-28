<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model implements OrderInterface
{
      use SoftDeletes;
      
      protected $table = 'orders';
      
      protected $fillable = ['order_number', 'total_price', 'is_shipped','is_delivered', 'order_status'];
      
      public function getUser()
      {
            return $this->belongsTo (User::class, 'user_id');
      }
      
      public function getProducts()
      {
            return $this->belongsToMany (Product::class, 'order_product', 'product_id', 'order_id')->withPivot ('quantity', 'total_amount');
      }
}
