<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model implements OrderInterface
{
      use SoftDeletes;
      
      protected $table = 'orders';
      
      protected $fillable = ['total_price', 'shipped','delivered'];
      
      public function user()
      {
            return $this->belongsTo (User::class, 'user_id');
      }
      
      public function products()
      {
            return $this->belongsToMany (Product::class, 'order_product', 'product_id', 'order_id')->withPivot ('quantity', 'total_amount');
      }
}
