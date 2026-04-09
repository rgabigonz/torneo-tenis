<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'A', 'sort_order' => 1, 'active' => true],
            ['name' => 'B', 'sort_order' => 2, 'active' => true],
            ['name' => 'C', 'sort_order' => 3, 'active' => true],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}