<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        foreach (range(1, 100) as $index) {
            DB::table('products')->insert([
                'code' => $faker->unique()->randomNumber,
                'name' => $faker->sentence(4),
                'stock' => $faker->randomNumber,
                'varian' => $faker->sentence(1),
                'description' => $faker->text,
                'image' => $faker->imageUrl(
                    $width = 640,
                    $height = 480
                ),
                'category_id' => rand(1, 5)
            ]);
        }
    }
}
