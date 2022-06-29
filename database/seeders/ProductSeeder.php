<?php

namespace Database\Seeders;

use App\Domain\Product\Models\Product;
use Database\Factories\ProductFactory;
use Database\Factories\ProductImageFactory;
use Database\Factories\StoreFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // ProductFactory::new()->count(20)->create();
        StoreFactory::new()->count(10)->create()->each(function ($store) {
            $store->products()->saveMany(ProductFactory::new()->count(random_int(1,15))->make());
        });
        Product::all()->each(function ($product) {
            $product->images()->saveMany(ProductImageFactory::new()->count(random_int(1, 5))->make());
        });
    }
}
