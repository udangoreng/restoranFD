<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name'=>'Grilled Caesar Salad',
            'category' => 'Appetizer',
            'price' => 175000,
            'calories' => 380,
            'description' => "The Grilled Caesar Salad features lightly charred romaine lettuce that brings a subtle smoky aroma, paired with a rich, creamy house-made Caesar dressing. Finished with crisp croutons, parmesan shavings, and tender grilled chicken, this appetizer offers a perfect balance of freshness and savory depth light yet indulgent. Approximately 320–380 kcal per serving (depending on the amount of dressing and added grilled chicken).",
            'img_path' => "img/appetizer1.jpg",
        ]);
    }
}
