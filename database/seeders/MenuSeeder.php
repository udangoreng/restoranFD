<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // Data menu berdasarkan kategori yang ada di menu.blade.php
        $menus = [
            [
                'name' => 'Grilled Pear & Cheese',
                'category' => 'Appetizer', // Kategori 1
                'price' => 135000,
                'description' => 'Sweet grilled pear paired with savory cheese, walnuts, and honey drizzle.',
                'calories' => 320,
                'img_path' => 'img/appetizer1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lobster Tortellini',
                'category' => 'Main Dish', // Kategori 2
                'price' => 289000,
                'description' => 'Handcrafted tortellini filled with sweet lobster in rich butter cream sauce.',
                'calories' => 580,
                'img_path' => 'img/maindish1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Caramel Pannacotta',
                'category' => 'Dessert', // Kategori 3
                'price' => 105000,
                'description' => 'Silky smooth pannacotta topped with homemade salted caramel sauce.',
                'calories' => 450,
                'img_path' => 'img/dessert1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lychee Rose Mocktail',
                'category' => 'Beverage', // Kategori 4 (Sesuai drink-section)
                'price' => 73000,
                'description' => 'Refreshing blend of lychee, rose syrup, and sparkling soda.',
                'calories' => 120,
                'img_path' => 'img/gambar3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Garlic Butter Baguette',
                'category' => 'Additional', // Kategori 5 (Sesuai additional-section)
                'price' => 45000,
                'description' => 'Crunchy baguette slices brushed with premium garlic butter and herbs.',
                'calories' => 210,
                'img_path' => 'img/additional1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('menus')->insert($menus);
    }
}