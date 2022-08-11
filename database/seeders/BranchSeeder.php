<?php

namespace Database\Seeders;

use App\Models\Branch\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{

    public $branchList = [
        ['branch' => 'Trichy Branch', 'branch_code' => 'BRTRY01'],
        ['branch' => 'Madurai Branch', 'branch_code' => 'BRMDU01'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->branchList as $value) {

            Branch::create([
                "branch" => $value['branch'],
                "branch_code" => $value['branch_code'],
            ]);
        }
    }
}
