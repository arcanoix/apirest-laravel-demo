<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        Product::create([
            'name'   => 'Mouse',
            'detail' => 'disposito hardware',
            'price'  => 20.33
        ]);

        Product::create([
            'name'   => 'Monitor',
            'detail' => 'monitor hardware',
            'price'  => 200.50
        ]);
    }
}
