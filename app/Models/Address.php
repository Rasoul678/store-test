<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model implements AddressInterface
{
    protected $table = 'addresses';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'description',
        'street',
        'distinct',
        'floor',
        'postal_code',
        'number',
        'created_at',
        'updated_at',
    ];

    public function getUser()
    {
        return $this->belongsTo('User::class', 'user_id', 'id');
    }

    public function getCity()
    {
        return $this->belongsTo('City::class', 'city_id', 'id');
    }
}
