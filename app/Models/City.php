<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model implements CityInterface
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
        'country',
    ];

    public function getCountyName()
    {
        return $this->country;
    }

    public function getAddresses()
    {
        return $this->hasMany('Address::class');
    }
}
