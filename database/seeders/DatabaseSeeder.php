<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Monarul Islam',
            'email' => 'monarul007@gmail.com',
        ]);
        User::factory(10)->create();

        Category::factory(49)->create();
        Product::factory(99)->create()->each(function ($product) {
            $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $product->categories()->attach($categories);
        });

        ProductReview::factory(100)->create();
    }
}
