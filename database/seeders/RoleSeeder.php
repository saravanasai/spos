<?php

namespace Database\Seeders;

use App\Models\Role\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
     public $roleList = [
       'Manager',
       'Cashier',
       'Biller',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roleList as $value) {

            Role::create([
                "role" => $value,
            ]);
        }
    }
}
