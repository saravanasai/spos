<?php

namespace Database\Seeders;

use App\Models\Products\Products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public $productList = [

        [
            'product_name' => 'Soap - 1',
            'product_code' => 'SP4545',
            'product_quantity' => 15,
            'product_price' => 42,
            'product_of_branch' => 1,
        ],
        [
            'product_name' => 'Rice Bag 10kg',
            'product_code' => 'DC4241',
            'product_quantity' => 50,
            'product_price' => 786,
            'product_of_branch' => 1,
        ],
        [
            'product_name' => 'Oil - 1l',
            'product_code' => 'DC3225',
            'product_quantity' => 10,
            'product_price' => 138,
            'product_of_branch' => 2,
        ],
        [
            'product_name' => 'Rice Bag 25kg',
            'product_code' => 'DC7845',
            'product_quantity' => 23,
            'product_price' => 1453,
            'product_of_branch' => 2,
        ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->productList as $value) {

            Products::create([
                "product_name" => $value['product_name'],
                "product_code" => $value['product_code'],
                "product_quantity" => $value['product_quantity'],
                "product_price" => $value['product_price'],
                "product_of_branch" => $value['product_of_branch'],
            ]);
        }
    }
}
