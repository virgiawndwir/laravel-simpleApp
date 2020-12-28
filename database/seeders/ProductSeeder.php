<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Product::insert([
            'name' => 'Barang 1',
            'product_category_id' => '1',
            'price' => '20000',
            'quantity' => 'good',
            'qty' => '20'
        ]);
    }
}
