<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\Chart\Title;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=20; $i++)
        {
            $product =  Product::create([
                'title' => 'Product ' . $i,
                'category_id' => ($i * 7 + 5 + 3 * 11) % 2,
                'restock_value' => '5000',
                'sell_value' => '10000',
                'subtitle' => 'Very good number ' . ($i * 13) % 5,
                'feature_image_path' => '/storage/product/matcha.jpg'
            ]);
    
            $product->pictures()->create([
                'picture' => '/storage/product/matcha.jpg'
            ]);
        }
    }
}
