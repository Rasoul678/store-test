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
        'created_at',
        'updated_at' .
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function roles()
    {
        return $this->belongsToMany('Role::class', 'role_id');
    }
    
    public function orders()
    {
          return $this->hasMany ('Order::class');
    }
}
