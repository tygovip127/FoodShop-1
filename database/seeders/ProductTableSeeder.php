<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use Faker\Factory as Faker;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::factory()->create();
        $product->pictures()->create([
            'picture' => '/storage/product/matcha.jpg'
        ]);
    }
}
