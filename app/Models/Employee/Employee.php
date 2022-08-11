<?php

namespace App\Models\Employee;

use App\Models\Role\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Authenticatable
{
    use HasFactory;


    protected $with=['Role'];

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'branch_id',
        'role_id',
        'active_status',
    ];

    public function Role() : HasOne
    {
        return $this->hasOne(Role::class,'id','role_id');
    }
}
