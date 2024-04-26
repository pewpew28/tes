<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            ['image' => 'img/food1.png', 'description' => 'Delicious Food 1', 'price' => 10.99],
            ['image' => 'img/food2.png', 'description' => 'Yummy Food 2', 'price' => 12.99],
            ['image' => 'img/food3.png', 'description' => 'Tasty Food 3', 'price' => 8.99],
            ['image' => 'img/food4.png', 'description' => 'Scrumptious Food 4', 'price' => 15.99],
        ];

        // Memasukkan data makanan ke dalam database
        foreach ($foods as $food) {
            Food::create([
                'image' => $food['image'],
                'description' => $food['description'],
                'price' => $food['price'],
            ]);
        }
    }
}
