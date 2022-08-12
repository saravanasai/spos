<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BranchSeeder::class);

        //admin credentials seeder
        User::create([
            "name"=>"Super Admin",
            "email"=>"admin@gmail.com",
            "password"=>Hash::make('12345'),
            "current_branch"=>1
        ]);


        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolesPermissionSeeder::class);
        $this->call(EmployeeSeeder::class);

    }
}
