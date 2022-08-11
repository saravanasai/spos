<?php

namespace App\Models\RolesPermission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesPermission extends Model
{
    use HasFactory;

    protected $table='roles_permissions';

    protected $fillable=[
        'role_id',
        'permission_id'
    ];
}
