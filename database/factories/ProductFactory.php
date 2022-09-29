<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $productsuffix=['pants','sweater','belts','hoods','mobile','laptops'];
        $name=$this->faker->company.' '. Arr::random($productsuffix) ;

        return [
            //
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->realText(220),
            'price' => $this->faker->numberBetween(100,10000),
        ];
    }
}
