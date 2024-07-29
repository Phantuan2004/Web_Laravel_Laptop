<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('products')->insert([
                'name' => $faker->text(50),
                'image' => 'https://gamalaptop.vn/wp-content/uploads/2022/12/Acer-Nitro-5-i7-11800H-RTX-3050-01.jpg',
                'price' => $faker->randomFloat(2, 5, 100),
                'quantity' => $faker->numberBetween(1, 100),
                'mota' => $faker->text(255),
                'category_id' => rand(1, 6),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'views' => $faker->numberBetween(1, 1000)
            ]);
        }
    }
}
