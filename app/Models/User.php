<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model implements UserInterface
{
    use SoftDeletes, Notifiable;

    protected $table = 'users';

    protected $dates = [
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoles()
    {
        return $this->belongsToMany('Role::class', 'role_user');
    }

    public function getOrders()
    {
        return $this->hasMany(Order::class);
    }

    public function getAddresses()
    {
        return $this->hasMany('Address::class');
    }
}
