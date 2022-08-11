<?php

namespace Database\Seeders;

use App\Models\Employee\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{

    public $employeeList = [

        [
            'name' => 'Test Manager',
            'email' => 'manager1@spos.com',
            'phone' => '9025807876',
            'password' => '12345',
            'branch_id' => 1,
            'role_id' => 1,
        ],

        [
            'name' => 'Test Manager',
            'email' => 'manager2@spos.com',
            'phone' => '9025807872',
            'password' => '12345',
            'branch_id' => 2,
            'role_id' => 1,
        ],

        [
            'name' => 'Test Cashier',
            'email' => 'cahsier1@spos.com',
            'phone' => '9025807877',
            'password' => '12345',
            'branch_id' => 1,
            'role_id' => 2,
        ],

        [
            'name' => 'Test Cashier2',
            'email' => 'cahsier2@spos.com',
            'phone' => '9025807879',
            'password' => '12345',
            'branch_id' => 2,
            'role_id' => 2,
        ],

        [
            'name' => 'Test biller',
            'email' => 'biller@spos.com',
            'phone' => '7708454539',
            'password' => '12345',
            'branch_id' => 1,
            'role_id' => 3,
        ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->employeeList as $value) {

            Employee::create([
                "name" => $value['name'],
                "email" => $value['email'],
                "phone" => $value['phone'],
                "password" => Hash::make($value['password']),
                "branch_id" => $value['branch_id'],
                "role_id" => $value['role_id'],
            ]);
        }
    }
}
