<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model implements OrderInterface
{
      use SoftDeletes;
      
      protected $table = 'orders';
      
      protected $dates = [
          'created_at',
          'updated_at',
          'deleted_at',
      ];
      
      protected $fillable = [
          'order_number',
          'user_id',
          'total_price',
          'is_shipped',
          'is_delivered',
          'order_status',
          'created_at',
          'updated_at',
          'deleted_at'
          ];
      
      public function getUser()
      {
            return $this->belongsTo (User::class, 'user_id');
      }
      
      public function getProducts()
      {
            return $this->belongsToMany (Product::class, 'order_product', 'order_id', 'product_id')
                                    ->withPivot ('quantity', 'total_amount')->withTimestamps();
      }
}
