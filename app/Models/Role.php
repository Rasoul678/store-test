<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model implements RoleInterface
{
    use SoftDeletes;

    protected $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getPermissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    public function getUsers()
    {
        return $this->belongsToMany(User::class);
    }
}
