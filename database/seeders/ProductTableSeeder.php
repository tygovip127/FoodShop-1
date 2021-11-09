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
        factory(Product::class, 100)->create();
    }
}
