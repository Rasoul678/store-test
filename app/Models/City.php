<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model implements CityInterface
{
    protected $table = 'cities';

    public $timestamps = false;

    protected $fillable = [
        'city',
        'country',
    ];

    public function getAddresses()
    {
        return $this->hasMany(Address::class);
    }
}
