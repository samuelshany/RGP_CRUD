<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::all()->each(function ($category) {
            \App\Models\Product::factory(10)->create([
                'category_id' => $category->id,
            ]);
        });
    }
}
