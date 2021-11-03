<?php

namespace Database\Factories;

use App\Models\Goods;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Goods::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array =[4,5,6,7];
        $restock_value= $this->faker->randomFloat(6, 10000, 200000);
        $sell_value = $restock_value*1.3;
        return [
            'title' => $this->faker->text(50),
            'restock_value' => $restock_value,
            'sell_value' => $sell_value,
            'subtitle' => $this->faker->realText(100),
            'view' =>0,
            'category_id'=> $this->faker->randomElement($array),
        ];
    }
}
