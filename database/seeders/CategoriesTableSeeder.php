<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Vegetables', 'Fruits', 'Meat', 'Fish', 'Dairy', 'Bakery', 'Frozen', 'Canned', 'Beverages', 'Snacks', 'Sweets', 'Other'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'shopping_list_id' => null,
            ]);
        }
    }
}