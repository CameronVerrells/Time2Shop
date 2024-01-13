<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Vegetables', 'icon' => 'fas fa-carrot', 'color' => 'green'],
            ['name' => 'Fruits', 'icon' => 'fas fa-apple-alt', 'color' => 'red'],
            ['name' => 'Meat', 'icon' => 'fas fa-drumstick-bite', 'color' => 'brown'],
            ['name' => 'Fish', 'icon' => 'fas fa-fish', 'color' => 'blue'],
            ['name' => 'Dairy', 'icon' => 'fas fa-cheese', 'color' => 'yellow'],
            ['name' => 'Bakery', 'icon' => 'fas fa-bread-slice', 'color' => 'wheat'],
            ['name' => 'Frozen', 'icon' => 'fas fa-ice-cream', 'color' => 'lightblue'],
            ['name' => 'Canned', 'icon' => 'fas fa-campground', 'color' => 'gray'],
            ['name' => 'Beverages', 'icon' => 'fas fa-coffee', 'color' => 'black'],
            ['name' => 'Snacks', 'icon' => 'fas fa-cookie', 'color' => 'orange'],
            ['name' => 'Sweets', 'icon' => 'fas fa-candy-cane', 'color' => 'pink'],
            ['name' => 'Other', 'icon' => 'fas fa-ellipsis-h', 'color' => 'purple'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'icon' => $category['icon'],
                'color' => $category['color'],
                'shopping_list_id' => null,
            ]);
        }
    }
}