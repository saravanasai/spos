<?php

namespace Database\Seeders;

use App\Models\RolesPermission\RolesPermission;
use Illuminate\Database\Seeder;

class RolesPermissionSeeder extends Seeder
{
    public $permissionToRolesList = [
        //permissions to manager role
        ['role_id'=>1,'permission_id'=>1],
        ['role_id'=>1,'permission_id'=>2],
        ['role_id'=>1,'permission_id'=>3],
        ['role_id'=>1,'permission_id'=>4],
        //permissions to cashier role
        ['role_id'=>2,'permission_id'=>2],
        ['role_id'=>2,'permission_id'=>3],
        //permissions to biller role
        ['role_id'=>3,'permission_id'=>4],



     ];
     /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
         foreach ($this->permissionToRolesList as $value) {

             RolesPermission::create([
                 "role_id" => $value['role_id'],
                 "permission_id" => $value['permission_id'],
             ]);
         }
     }
}
