<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model implements CityInterface
{
    /**
     * Specify the name of the database table.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * Prevent the model from adding create and update timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city',
        'state',
        'country',
    ];

    /**
     * Get addresses as a many to one relationship.
     *
     * @return HasMany
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::class);
    }
}
