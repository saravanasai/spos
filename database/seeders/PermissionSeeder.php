<?php

namespace Database\Seeders;

use App\Models\Permission\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    public $permissionList = [
        ['permission'=>'employee-management'],
        ['permission'=>'reports-management'],
        ['permission'=>'product-managemnt'],
        ['permission'=>'pos'],
     ];
     /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
         foreach ($this->permissionList as $value) {

             Permission::create([
                 "permission" => $value['permission'],
             ]);
         }
     }
}
