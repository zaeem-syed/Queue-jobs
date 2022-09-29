<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\Channel::factory(20)->create();
         User::factory(3)->create();
         Category::factory(12)->create();
         Product::factory(50)->create();

         $categories=Category::all();
         Product::all()->each(function($product) use ($categories){
            $product->category()->attach(
                $categories->random(2)->pluck('id')->toArray()
            );
         });
    }
}
