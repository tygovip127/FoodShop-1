<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array =[1,2];
        $restock_value= $this->faker->randomNumber(5, 10000, 99000);
        $sell_value = $restock_value*1.3;
        return [
            'title' => $this->faker->text(50),
            'restock_value' => $restock_value,
            'sell_value' => $sell_value,
            'subtitle' => $this->faker->realText(100),
            'category_id'=> $this->faker->randomElement($array),
            'feature_image_path' => '/storage/product/matcha.jpg',
        ];
    }
}
