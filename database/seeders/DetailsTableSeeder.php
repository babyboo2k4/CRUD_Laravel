<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 20) as $index) {
            DB::table('details_crud')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'description' => $faker->paragraph,
                'cover_image_url' => $faker->imageUrl(200, 300, 'people'),
                'release_date' => $faker->date,
                'status' => $faker->randomElement(['ongoing', 'completed', 'hiatus']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
